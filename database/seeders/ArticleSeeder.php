<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [

            // ─── AI NEWS (5) ───────────────────────────────────────────────────
            [
                'title'        => 'AI Diagnoses Rare Diseases 40% Faster Than Specialist Physicians in Clinical Trial',
                'category'     => 'AI News',
                'image_url'    => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=900&auto=format&fit=crop',
                'excerpt'      => 'A landmark clinical trial at Johns Hopkins shows AI models diagnosing rare genetic diseases significantly faster than specialist physicians, with equal accuracy — potentially transforming rare disease medicine.',
                'body'         => "A groundbreaking clinical trial conducted at Johns Hopkins Medicine has demonstrated that an AI diagnostic system can identify rare genetic diseases up to 40% faster than board-certified specialist physicians, while maintaining comparable accuracy.\n\nThe study, published in Nature Medicine, involved 1,200 patients with suspected rare diseases across 12 hospital systems. The AI system, trained on genomic data, clinical notes, and imaging, correctly identified the diagnosis in 89% of cases compared to 91% for a panel of specialist physicians.\n\nThe key advantage was speed: the AI system produced a ranked differential diagnosis in under 4 hours on average, compared to 6.7 hours for the physician panel — a difference that can be critical for conditions requiring urgent treatment.\n\nDr. Sarah Chen, the study's lead author, noted that 'for rare diseases where specialists are scarce, AI could democratize access to expert-level diagnosis globally.' The FDA is currently reviewing the technology for potential emergency use authorization.",
                'source_name'  => 'Nature Medicine',
                'source_url'   => 'https://www.nature.com/nm',
                'author'       => 'Dr. Sarah Chen',
                'published_at' => now()->subDays(1),
            ],
            [
                'title'        => 'EU AI Act Enters Force: What Every Developer Needs to Know',
                'category'     => 'AI News',
                'image_url'    => 'https://images.unsplash.com/photo-1589578527966-fdac0f44566c?w=900&auto=format&fit=crop',
                'excerpt'      => 'The European Union\'s landmark AI Act is now in full effect, with strict requirements for high-risk AI systems, mandatory transparency for general-purpose AI, and fines up to €35M for violations.',
                'body'         => "The European Union's Artificial Intelligence Act has entered into force, establishing the world's first comprehensive legal framework for artificial intelligence. The regulation introduces a risk-based approach, with requirements varying by the potential harm an AI system could cause.\n\n'High-risk' AI systems — including those used in hiring, credit scoring, critical infrastructure, and medical devices — must now undergo conformity assessments, maintain detailed technical documentation, and implement human oversight mechanisms.\n\nGenerative AI models like GPT and Gemini fall under 'general-purpose AI' rules, requiring providers to publish training data summaries, implement copyright safeguards, and conduct adversarial testing.\n\nFines for violations range from €7.5M for minor infringements to €35M (or 7% of global turnover) for the most serious breaches. Tech companies have 12 months to achieve compliance for most provisions, with many major providers already publishing AI Act compliance roadmaps.",
                'source_name'  => 'EU Official Journal',
                'source_url'   => 'https://eur-lex.europa.eu',
                'author'       => 'European Commission',
                'published_at' => now()->subDays(3),
            ],
            [
                'title'        => 'Sam Altman Announces AGI Timeline Shift: "We\'re Closer Than We Thought"',
                'category'     => 'AI News',
                'image_url'    => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=900&auto=format&fit=crop',
                'excerpt'      => 'OpenAI CEO Sam Altman says artificial general intelligence could arrive sooner than his previous estimates, citing unexpected capability jumps in the latest generation of models.',
                'body'         => "OpenAI CEO Sam Altman has revised his timeline for the arrival of artificial general intelligence (AGI), telling attendees at the World Economic Forum in Davos that recent capability breakthroughs have shifted his thinking considerably.\n\n'A year ago I would have said AGI was still a decade away. Today, I'm genuinely uncertain — and that uncertainty leans earlier than I expected,' Altman told an audience of global leaders and technology executives.\n\nAltman pointed specifically to improvements in long-horizon reasoning, autonomous tool use, and multi-step scientific problem solving as evidence that the field is advancing faster than benchmark scores suggest.\n\nHowever, Altman was careful to distinguish between AGI and superintelligence, noting that the former — systems capable of performing most economically valuable cognitive tasks at human level — could arrive without the transformative societal shifts that superintelligence might bring. OpenAI's safety team has reportedly doubled its headcount in response to the accelerated timeline.",
                'source_name'  => 'Financial Times',
                'source_url'   => 'https://www.ft.com',
                'author'       => 'Tim Bradshaw',
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'AI-Generated Art Wins Grand Prize at Major International Competition',
                'category'     => 'AI News',
                'image_url'    => 'https://images.unsplash.com/photo-1547891654-e66ed7ebb968?w=900&auto=format&fit=crop',
                'excerpt'      => 'A piece entirely created using AI image generation tools has won the top prize at the prestigious Venice Digital Art Biennial, reigniting fierce debate about creativity, authorship, and the future of art.',
                'body'         => "An artwork created using a combination of Midjourney v7 and Stable Diffusion 3.5 has won the Grand Prix at the Venice Digital Art Biennial — one of the most prestigious awards in the digital art world — sparking immediate and intense controversy across the art community.\n\nThe winning piece, titled 'Synthetic Memories,' was submitted by artist collective DataBrush. The work depicts surreal, photorealistic scenes blending human memory with machine-generated visual noise, exploring themes of AI's impact on personal identity.\n\nThe jury's decision was not unanimous. Three of the seven judges initially refused to vote for an AI-generated entry, with one resigning in protest. The jury chair defended the decision, stating that 'artistic merit must be evaluated on the final work's impact, not exclusively the tool used to create it.'\n\nThe controversy has prompted the Biennial to announce new disclosure requirements for AI-assisted artwork submissions starting next year, a move that several artists' associations have described as 'a step in the right direction.'",
                'source_name'  => 'The Guardian',
                'source_url'   => 'https://www.theguardian.com',
                'author'       => 'Priya Nair',
                'published_at' => now()->subDays(7),
            ],
            [
                'title'        => 'Pentagon Deploys AI System for Real-Time Battlefield Intelligence Analysis',
                'category'     => 'AI News',
                'image_url'    => 'https://images.unsplash.com/photo-1550751827-4bd374173b1f?w=900&auto=format&fit=crop',
                'excerpt'      => 'The US Department of Defense has confirmed deployment of an AI-powered intelligence analysis system capable of processing satellite imagery, signals intelligence, and open-source data simultaneously.',
                'body'         => "The United States Department of Defense has officially confirmed the operational deployment of Project Nexus, an AI-powered battlefield intelligence analysis system that integrates satellite imagery, signals intelligence (SIGINT), and open-source data in real time.\n\nProject Nexus, developed jointly by Palantir Technologies and a classified defense contractor, can analyze and synthesize intelligence from thousands of simultaneous data streams, producing actionable reports in seconds rather than the hours traditionally required by human analysts.\n\nThe system is currently deployed in support of US Indo-Pacific Command operations and has reportedly reduced intelligence-to-decision latency by 73% in field tests. Defense Secretary officials described the deployment as 'a generational shift in how the US military understands the battlespace.'\n\nCivil liberties organizations have raised concerns about the system's potential for autonomous decision-making and the risk of hallucinated intelligence leading to real-world military actions. The DoD stated that all lethal decisions remain under human authority, with AI serving in an advisory capacity only.",
                'source_name'  => 'Defense One',
                'source_url'   => 'https://www.defenseone.com',
                'author'       => 'Marcus Webb',
                'published_at' => now()->subDays(9),
            ],

            // ─── AI MODELS (4) ────────────────────────────────────────────────
            [
                'title'        => 'GPT-5 Officially Launched: OpenAI\'s Most Powerful Model Yet',
                'category'     => 'AI Models',
                'image_url'    => 'https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=900&auto=format&fit=crop',
                'excerpt'      => 'OpenAI has unveiled GPT-5, boasting unprecedented reasoning capabilities, multimodal understanding, and a 2M token context window that redefines what\'s possible with large language models.',
                'body'         => "OpenAI has officially launched GPT-5, its most advanced AI model to date. The new model demonstrates remarkable improvements in reasoning, coding, mathematics, and creative writing compared to its predecessor.\n\nGPT-5 introduces a 2-million token context window, enabling it to process entire codebases, lengthy legal documents, and full-length novels in a single prompt. The model features significantly improved multimodal capabilities, seamlessly handling text, images, audio, and video.\n\nIn early benchmarks, GPT-5 scores above 90% on the MMLU benchmark and achieves human-level performance on the bar exam, medical licensing exams, and advanced mathematics competitions.\n\nOpenAI CEO Sam Altman described GPT-5 as 'a genuine step toward artificial general intelligence.' GPT-5 is available through the ChatGPT interface and the OpenAI API, with enterprise pricing announced separately.",
                'source_name'  => 'OpenAI Blog',
                'source_url'   => 'https://openai.com/blog',
                'author'       => 'OpenAI Team',
                'published_at' => now()->subDays(2),
            ],
            [
                'title'        => 'Google DeepMind\'s Gemini Ultra 2.0 Surpasses Human Experts on Scientific Reasoning',
                'category'     => 'AI Models',
                'image_url'    => 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?w=900&auto=format&fit=crop',
                'excerpt'      => 'Google DeepMind has released Gemini Ultra 2.0, demonstrating expert-level scientific reasoning across chemistry, biology, and physics — opening doors to AI-assisted research at scale.',
                'body'         => "Google DeepMind has announced Gemini Ultra 2.0, the latest iteration of its flagship AI model, showing dramatic improvements in scientific reasoning — surpassing human expert performance in organic chemistry, molecular biology, and theoretical physics.\n\nThe model achieves a 92.3% score on GPQA Diamond — a benchmark designed to test graduate-level scientific knowledge — compared to 65% for human PhD students in the respective fields.\n\nGemini Ultra 2.0 introduces 'deep research mode,' allowing the model to autonomously search the web, read papers, run code, and synthesize findings into comprehensive reports. Early testers at universities report using the model to accelerate literature reviews by up to 10x.\n\nGoogle has integrated Gemini Ultra 2.0 into Google Workspace, Vertex AI, and the Gemini Advanced subscription tier.",
                'source_name'  => 'Google DeepMind',
                'source_url'   => 'https://deepmind.google',
                'author'       => 'DeepMind Research Team',
                'published_at' => now()->subDays(4),
            ],
            [
                'title'        => 'Anthropic\'s Claude 4 Sets New Safety Benchmark While Matching GPT-5 Performance',
                'category'     => 'AI Models',
                'image_url'    => 'https://images.unsplash.com/photo-1639762681057-408e52192e55?w=900&auto=format&fit=crop',
                'excerpt'      => 'Anthropic has released Claude 4, demonstrating that safety and capability need not be in tension — the model matches GPT-5 on most benchmarks while achieving unprecedented scores on AI safety evaluations.',
                'body'         => "Anthropic has officially released Claude 4, the latest iteration of its flagship AI assistant, and the results have stunned the industry: the model matches GPT-5 on the majority of standard benchmarks while setting new records on every major AI safety evaluation.\n\nClaude 4 achieves a 91.7% score on MMLU (comparable to GPT-5's 90.4%) while scoring 97.2% on Anthropic's Constitutional AI compliance tests — a full 8 points higher than any previous model from any lab.\n\nMost significantly, Claude 4 demonstrates near-zero rates of harmful instruction following even under sophisticated adversarial jailbreaking attempts that defeated previous generations of frontier models. Anthropic researchers attribute this to a novel training approach called 'Constitutional Distillation,' which embeds safety constraints at a fundamental level rather than as a post-training overlay.\n\nThe model is available through Claude.ai and the Anthropic API, with pricing competitive with GPT-5.",
                'source_name'  => 'Anthropic',
                'source_url'   => 'https://www.anthropic.com',
                'author'       => 'Anthropic Research Team',
                'published_at' => now()->subDays(6),
            ],
            [
                'title'        => 'Mistral AI Releases \'Le Large\' — Europe\'s Most Capable Open Model',
                'category'     => 'AI Models',
                'image_url'    => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=900&auto=format&fit=crop',
                'excerpt'      => 'French AI startup Mistral AI has released Le Large, a 180B parameter open-weight model that outperforms Llama 4 and positions Europe as a serious player in the frontier AI race.',
                'body'         => "French AI startup Mistral AI has released 'Le Large,' a 180-billion parameter open-weight model that outperforms Meta's Llama 4 on most benchmarks and marks a significant milestone for European AI development.\n\nLe Large achieves 89.1% on MMLU, 72% on HumanEval coding benchmarks, and demonstrates particularly strong multilingual capabilities, excelling in French, German, Spanish, Italian, and Arabic alongside English.\n\nMistral CEO Arthur Mensch described the release as 'proof that a small European team can compete at the frontier of AI.' The company trained Le Large in partnership with the European High Performance Computing Joint Undertaking (EuroHPC), using a cluster of 4,096 NVIDIA H100 GPUs over eight weeks.\n\nThe weights are released under the Apache 2.0 license, making Le Large fully free for commercial use. The model is immediately available on Hugging Face and Mistral's API.",
                'source_name'  => 'Mistral AI Blog',
                'source_url'   => 'https://mistral.ai/news',
                'author'       => 'Mistral AI Team',
                'published_at' => now()->subDays(8),
            ],

            // ─── RESEARCH (4) ─────────────────────────────────────────────────
            [
                'title'        => 'Meta Releases Llama 4: Open Source AI That Rivals Closed Models',
                'category'     => 'Research',
                'image_url'    => 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=900&auto=format&fit=crop',
                'excerpt'      => 'Meta AI has open-sourced Llama 4, a family of models including a 405B parameter variant that benchmarks neck-and-neck with GPT-4 — a massive win for the open-source AI community.',
                'body'         => "Meta AI has released Llama 4 under a permissive open-source license, marking a significant milestone for the open AI ecosystem. The model family includes variants ranging from 8B to 405B parameters, with the largest model demonstrating performance competitive with leading closed-source models.\n\nLlama 4 405B achieves 87.2% on MMLU, surpassing previous open-source records and approaching GPT-4-class performance. The model supports a 128K context window and shows strong performance on coding tasks, mathematical reasoning, and instruction following.\n\nMeta's decision to release the weights freely has been celebrated by researchers and AI safety advocates who argue that open models allow for greater transparency. The model is available on Hugging Face and can be deployed via AWS, Azure, and Google Cloud.",
                'source_name'  => 'Meta AI Research',
                'source_url'   => 'https://ai.meta.com',
                'author'       => 'Meta AI Team',
                'published_at' => now()->subDays(3),
            ],
            [
                'title'        => 'DeepMind AlphaFold 3 Predicts All Known Protein Structures at Atomic Accuracy',
                'category'     => 'Research',
                'image_url'    => 'https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=900&auto=format&fit=crop',
                'excerpt'      => 'Google DeepMind\'s AlphaFold 3 has mapped all 200 million known protein structures with near-atomic accuracy, a scientific achievement that researchers describe as equivalent to mapping every star in the observable universe.',
                'body'         => "Google DeepMind has announced AlphaFold 3, an expanded version of its landmark protein structure prediction system that has now mapped all 200 million known protein structures with near-atomic accuracy — a scientific feat researchers are describing as one of the most significant computational achievements in biology.\n\nAlphaFold 3 extends beyond proteins to predict the structures of DNA, RNA, and small molecules, as well as how they interact with each other. This dramatically expands its usefulness for drug discovery, as most drugs work by binding to specific molecular sites.\n\nIn a paper published in Nature, DeepMind researchers demonstrate that AlphaFold 3 can predict protein-drug binding sites with 78% accuracy, compared to 43% for the previous version. Pharmaceutical companies including Novartis, Pfizer, and AstraZeneca have already announced research partnerships based on the technology.\n\nThe full database of predicted structures is freely available to researchers worldwide through the EMBL-EBI.",
                'source_name'  => 'Nature',
                'source_url'   => 'https://www.nature.com',
                'author'       => 'DeepMind AlphaFold Team',
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'Stanford Study: AI Can Predict Alzheimer\'s Disease 10 Years Before Symptoms Appear',
                'category'     => 'Research',
                'image_url'    => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=900&auto=format&fit=crop',
                'excerpt'      => 'Researchers at Stanford Medicine have developed an AI model that detects Alzheimer\'s-related brain changes a decade before clinical symptoms emerge, using standard MRI scans available at any hospital.',
                'body'         => "Researchers at Stanford Medicine have published results of a landmark study showing that an AI model can detect the earliest signs of Alzheimer's disease up to 10 years before a patient would receive a clinical diagnosis — using only standard MRI brain scans.\n\nThe model, trained on 14,000 longitudinal MRI datasets from the ADNI (Alzheimer's Disease Neuroimaging Initiative), identifies subtle patterns of cortical thinning and hippocampal volume changes that are invisible to the human eye at the early stage but predictive of future cognitive decline.\n\nIn the validation study of 2,300 patients, the AI achieved 84% sensitivity and 91% specificity for predicting conversion to Alzheimer's within a 10-year window — dramatically better than any currently approved screening test.\n\n'The holy grail in Alzheimer's research has always been early intervention,' said lead researcher Dr. James Park. 'If we can identify at-risk patients a decade earlier, we have a much larger therapeutic window.' The team is now working with the FDA on a clearance pathway for clinical deployment.",
                'source_name'  => 'Stanford Medicine News',
                'source_url'   => 'https://med.stanford.edu',
                'author'       => 'Dr. James Park',
                'published_at' => now()->subDays(10),
            ],
            [
                'title'        => 'Landmark Paper: AI Scaling Laws Break Down Beyond 1 Trillion Parameters',
                'category'     => 'Research',
                'image_url'    => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=900&auto=format&fit=crop',
                'excerpt'      => 'A controversial new paper from a team at MIT challenges the foundational assumption that larger AI models always perform better, finding that capability gains plateau and reverse above 1 trillion parameters.',
                'body'         => "A highly anticipated paper from MIT's Computer Science and Artificial Intelligence Laboratory (CSAIL) challenges one of the most foundational beliefs in modern AI research: that model performance consistently improves with scale.\n\nThe paper, titled 'Beyond the Scaling Frontier,' presents empirical evidence from 47 models ranging from 100 billion to 10 trillion parameters, showing that capability gains on complex reasoning tasks plateau around 800 billion parameters and actually begin to decline above 1 trillion — a phenomenon the researchers call 'capacity interference.'\n\nThe researchers hypothesize that as models grow beyond a certain size, the weights required to store factual knowledge begin to interfere with the circuits responsible for abstract reasoning — a kind of neural 'crowding out' effect.\n\nThe findings are already controversial, with several AI labs disputing the methodology. OpenAI and Google both issued statements saying their internal research does not replicate the described plateau. If confirmed, the results would have significant implications for the industry's current strategy of building ever-larger foundation models.",
                'source_name'  => 'arXiv',
                'source_url'   => 'https://arxiv.org',
                'author'       => 'MIT CSAIL Team',
                'published_at' => now()->subDays(12),
            ],

            // ─── PRODUCTS (4) ─────────────────────────────────────────────────
            [
                'title'        => 'Apple Intelligence Expands to 50 New Countries with Real-Time Translation',
                'category'     => 'Products',
                'image_url'    => 'https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=900&auto=format&fit=crop',
                'excerpt'      => 'Apple has rolled out its AI platform to 50 additional countries, adding real-time on-device translation in 40 languages and a new Siri that can take actions across third-party apps.',
                'body'         => "Apple has launched the second major expansion of Apple Intelligence, bringing its on-device AI platform to 50 new countries and dramatically expanding language support across its ecosystem.\n\nThe update introduces real-time on-device translation in 40 languages, allowing users to receive live captions during calls, meetings, and media playback — all processed locally without sending audio to Apple's servers. The feature is available on iPhone 16, iPhone 15 Pro, and all M-series Macs.\n\nMost significantly, the update ships an entirely rebuilt Siri that can now take multi-step actions across third-party applications. In demonstrations, Siri was shown booking a restaurant, paying via Apple Pay, and adding the reservation to Calendar — all from a single voice command, without any app switching.\n\nApple CEO Tim Cook described Apple Intelligence as 'the most personal AI ever built,' emphasizing the company's privacy-first approach. Apple's App Intents API, which enables cross-app Siri actions, is now available to all developers via Xcode 16.2.",
                'source_name'  => 'Apple Newsroom',
                'source_url'   => 'https://www.apple.com/newsroom',
                'author'       => 'Apple PR Team',
                'published_at' => now()->subDays(4),
            ],
            [
                'title'        => 'Microsoft Copilot Gets Real-Time Web Access, Long-Term Memory, and Proactive Alerts',
                'category'     => 'Products',
                'image_url'    => 'https://images.unsplash.com/photo-1633419461186-7d40a38105ec?w=900&auto=format&fit=crop',
                'excerpt'      => 'Microsoft\'s AI assistant now remembers your preferences across sessions, monitors the web for relevant news, and proactively alerts you to changes in documents, emails, and market data.',
                'body'         => "Microsoft has shipped a major update to Copilot, its AI assistant integrated across the Microsoft 365 suite, introducing three headline features: long-term persistent memory, real-time web monitoring, and proactive alerts.\n\nLong-term memory allows Copilot to remember user preferences, working style, and context from previous sessions. In a demonstration, the company showed Copilot automatically adapting a new presentation to match a user's preferred slide style from a deck created six months prior.\n\nReal-time web access enables Copilot to continuously monitor the web for topics specified by the user — competitor news, market movements, research developments — and surface relevant updates directly in Teams, Outlook, or the Copilot chat interface.\n\nProactive alerts complete the picture, allowing Copilot to notify users when a monitored document changes, a deadline is approaching, or an email requires urgent action — without the user needing to ask. The features are rolling out to all Microsoft 365 Business and Enterprise subscribers over the next 60 days.",
                'source_name'  => 'Microsoft Blog',
                'source_url'   => 'https://blogs.microsoft.com',
                'author'       => 'Microsoft AI Team',
                'published_at' => now()->subDays(6),
            ],
            [
                'title'        => 'Adobe Firefly 3.0 Generates Broadcast-Quality Video from Text Descriptions',
                'category'     => 'Products',
                'image_url'    => 'https://images.unsplash.com/photo-1536240478700-b869ad10f098?w=900&auto=format&fit=crop',
                'excerpt'      => 'Adobe has launched Firefly 3.0, capable of generating up to 4K, 60fps video from a text prompt, with precise control over camera movement, lighting, and character consistency across scenes.',
                'body'         => "Adobe has unveiled Firefly 3.0, a dramatic leap forward in its generative AI video platform that can produce broadcast-quality 4K footage at 60 frames per second from a text description alone.\n\nThe new model introduces a suite of professional-grade controls that set it apart from competing systems: precise camera movement directives (dolly, pan, crane, tracking shots), lighting environment specification, subject consistency locks that maintain the appearance of characters across multiple generated clips, and style transfer from reference images.\n\nIn a live demonstration at Adobe MAX, creative director Dani Torres generated a 90-second short film — complete with outdoor and indoor scenes, two consistent human characters, and a custom score — in under four minutes using only text prompts and a single reference photo.\n\nAdobe emphasized that Firefly 3.0 is trained exclusively on licensed content and Adobe Stock assets, with full commercial IP indemnification — addressing the legal concerns that have hampered adoption of competing AI video tools. The model is available in Premiere Pro, After Effects, and the Firefly web app.",
                'source_name'  => 'Adobe Blog',
                'source_url'   => 'https://blog.adobe.com',
                'author'       => 'Adobe AI Team',
                'published_at' => now()->subDays(8),
            ],
            [
                'title'        => 'Notion AI 2.0 Launches as a Full Autonomous Research and Writing Assistant',
                'category'     => 'Products',
                'image_url'    => 'https://images.unsplash.com/photo-1517842645767-c639042777db?w=900&auto=format&fit=crop',
                'excerpt'      => 'Notion has completely rebuilt its AI product, transforming it from a writing helper into a full autonomous research assistant that can gather web sources, synthesize data, and draft complete documents.',
                'body'         => "Notion has launched Notion AI 2.0, a comprehensive rebuild of its AI capabilities that transforms the product from a writing assistant into a fully autonomous research and content creation platform.\n\nThe headline feature is Notion Research Mode: give the AI a topic and it will autonomously search the web, read and analyze up to 50 sources, extract key data points, resolve contradictions between sources, and synthesize everything into a structured document — complete with inline citations. The process takes 3–8 minutes depending on topic complexity.\n\nNotion AI 2.0 also introduces a multi-document understanding feature that can cross-reference information across all documents in a user's workspace, answering questions like 'What was the consensus from all our Q3 customer interviews?' by reading dozens of notes simultaneously.\n\nA new 'Notion Actions' system lets the AI take direct actions within the workspace: creating databases, linking related pages, tagging and organizing content, and sending email summaries to teammates. The company reports that early access users reduced their weekly note-organization time by an average of 4.2 hours.",
                'source_name'  => 'Notion Blog',
                'source_url'   => 'https://www.notion.so/blog',
                'author'       => 'Notion Product Team',
                'published_at' => now()->subDays(11),
            ],

            // ─── TOOLS (3) ────────────────────────────────────────────────────
            [
                'title'        => 'GitHub Copilot Workspace: AI Writes, Tests, and Reviews Code End-to-End',
                'category'     => 'Tools',
                'image_url'    => 'https://images.unsplash.com/photo-1618477388954-7852f32655ec?w=900&auto=format&fit=crop',
                'excerpt'      => 'GitHub has launched Copilot Workspace, an agentic coding environment that takes a task description and autonomously writes code, creates tests, runs CI, and submits pull requests.',
                'body'         => "GitHub has launched Copilot Workspace, a fully agentic development environment that represents a fundamental shift in how software is written. The product allows developers to describe a task in plain English and have the AI autonomously plan, implement, test, and submit code.\n\nCopilot Workspace begins by analyzing the repository context, understanding existing code patterns and conventions, then generating a step-by-step implementation plan. The developer can review and edit the plan before the AI writes the actual code.\n\nOnce code is generated, Copilot Workspace automatically creates unit tests, runs them in a sandboxed environment, iterates on failures, and — when tests pass — opens a pull request with a detailed description of changes.\n\nIn early access testing, teams reported completing tasks 55% faster on average. For well-defined tasks like adding API endpoints or bug fixes from issue descriptions, some teams reported 80%+ time savings. The product is available in public beta for GitHub Team and Enterprise customers.",
                'source_name'  => 'GitHub Blog',
                'source_url'   => 'https://github.blog',
                'author'       => 'GitHub Engineering',
                'published_at' => now()->subDays(2),
            ],
            [
                'title'        => 'Cursor IDE Surpasses 1 Million Users: The AI Code Editor Revolution Is Here',
                'category'     => 'Tools',
                'image_url'    => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=900&auto=format&fit=crop',
                'excerpt'      => 'Cursor, the AI-first code editor built on VS Code, has passed 1 million active users — with developers reporting productivity gains of 40–60% compared to traditional editors. We look at what makes it so compelling.',
                'body'         => "Cursor, the AI-native code editor developed by Anysphere, has reached 1 million monthly active users — a milestone that underscores the rapid shift in developer workflows toward AI-first tooling.\n\nCursor differs from traditional AI coding assistants by treating the AI as a first-class collaborator rather than an autocomplete engine. Its flagship feature, 'Composer Mode,' allows developers to describe changes in natural language and have the AI edit multiple files simultaneously, understanding the full context of the codebase rather than just the currently open file.\n\nUsers consistently report productivity gains of 40–60% on routine development tasks, with some senior engineers describing Cursor as 'the single most impactful tool change I've made in 20 years of coding.' The editor is particularly praised for its ability to refactor large codebases and debug complex multi-file issues.\n\nCursor is built on the VS Code codebase and supports all VS Code extensions, making the transition from VS Code frictionless. The company recently raised $60M in Series B funding at a $400M valuation. Pricing starts at $20/month for the Pro tier.",
                'source_name'  => 'The Pragmatic Engineer',
                'source_url'   => 'https://newsletter.pragmaticengineer.com',
                'author'       => 'Gergely Orosz',
                'published_at' => now()->subDays(7),
            ],
            [
                'title'        => 'Perplexity AI Launches "Deep Search" — The AI Research Assistant That Cites Everything',
                'category'     => 'Tools',
                'image_url'    => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=900&auto=format&fit=crop',
                'excerpt'      => 'Perplexity AI has released Deep Search, a mode that takes 3–5 minutes to answer complex research questions by reading hundreds of sources, cross-referencing claims, and producing a fully cited report.',
                'body'         => "Perplexity AI has released Deep Search, a new research mode that fundamentally changes the scope and depth of what an AI search engine can produce. Unlike standard AI responses that draw on a handful of sources, Deep Search reads 200–400 web pages, academic papers, and data sources before formulating a response.\n\nThe process takes 3–5 minutes rather than the near-instant responses users are accustomed to, but the results are dramatically more comprehensive. Deep Search produces structured reports with inline citations for every factual claim, a methodology section explaining how the AI evaluated conflicting sources, and a confidence score for key conclusions.\n\nIn independent testing by academic librarians at Columbia University, Deep Search produced research summaries rated as 'publication-ready with minor edits' in 63% of cases — compared to 11% for standard Perplexity and 8% for Google's AI Overview.\n\nDeep Search is available to Perplexity Pro subscribers ($20/month) and is limited to 5 searches per day during the beta period. The company has announced plans to release an API for enterprise customers who want to integrate Deep Search into their own research workflows.",
                'source_name'  => 'TechCrunch',
                'source_url'   => 'https://techcrunch.com',
                'author'       => 'Devin Coldewey',
                'published_at' => now()->subDays(13),
            ],

        ];

        foreach ($articles as $data) {
            Article::create(array_merge($data, [
                'slug'         => Article::generateUniqueSlug($data['title']),
                'is_published' => true,
            ]));
        }

        $this->command->info('20 sample articles seeded successfully.');
    }
}
