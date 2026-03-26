<?php

namespace App\Console\Commands;

use App\Models\Article;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class FetchNews extends Command
{
    protected $signature = 'news:fetch';
    protected $description = 'Fetch latest AI news from NewsAPI.org and store in database';

    public function handle(): int
    {
        $apiKey = config('services.newsapi.key');

        if (empty($apiKey)) {
            $this->warn('NEWS_API_KEY is not set in .env. Skipping fetch.');
            return self::SUCCESS;
        }

        $this->info('Fetching AI news from NewsAPI...');

        try {
            $client   = new Client(['timeout' => 15]);
            $response = $client->get('https://newsapi.org/v2/everything', [
                'query' => [
                    'q'        => 'artificial intelligence',
                    'language' => 'en',
                    'sortBy'   => 'publishedAt',
                    'pageSize' => 20,
                    'apiKey'   => $apiKey,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (($data['status'] ?? '') !== 'ok') {
                $this->error('NewsAPI returned an error: ' . ($data['message'] ?? 'Unknown error'));
                return self::FAILURE;
            }

            $articles = $data['articles'] ?? [];
            $saved    = 0;

            foreach ($articles as $item) {
                $title = trim($item['title'] ?? '');

                if (empty($title) || $title === '[Removed]') {
                    continue;
                }

                if (Article::where('title', $title)->exists()) {
                    continue;
                }

                $body = $item['content'] ?? $item['description'] ?? '';

                // NewsAPI truncates content with "[+N chars]" — strip that
                $body = preg_replace('/\[\+\d+ chars\]$/', '', $body);

                Article::create([
                    'title'        => $title,
                    'slug'         => Article::generateUniqueSlug($title),
                    'excerpt'      => $item['description'] ?? null,
                    'body'         => trim($body) ?: ($item['description'] ?? null),
                    'image_url'    => $item['urlToImage'] ?? null,
                    'source_url'   => $item['url'] ?? null,
                    'source_name'  => $item['source']['name'] ?? null,
                    'author'       => $item['author'] ?? null,
                    'category'     => 'AI News',
                    'is_published' => true,
                    'published_at' => isset($item['publishedAt'])
                        ? \Carbon\Carbon::parse($item['publishedAt'])
                        : now(),
                ]);

                $saved++;
            }

            $this->info("Done. Saved {$saved} new article(s).");
            return self::SUCCESS;

        } catch (GuzzleException $e) {
            $this->error('HTTP error while fetching news: ' . $e->getMessage());
            return self::FAILURE;
        } catch (\Throwable $e) {
            $this->error('Unexpected error: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
