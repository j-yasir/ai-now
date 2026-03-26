@extends('layouts.app')

@section('title', isset($category) ? $category . ' — AI Now' : 'AI Now — Real-Time Artificial Intelligence News')

@php
// ── Category helpers ──────────────────────────────────────
function catColor(string $c): string { return match($c) {
    'AI Models' => '#a78bfa', 'Research' => '#34d399',
    'Products'  => '#fb923c', 'Tools'    => '#f472b6',
    default     => '#22d3ee',
};}
function catGlow(string $c): string { return match($c) {
    'AI Models' => 'rgba(167,139,250,.28)', 'Research' => 'rgba(52,211,153,.28)',
    'Products'  => 'rgba(251,146,60,.28)',  'Tools'    => 'rgba(244,114,182,.28)',
    default     => 'rgba(34,211,238,.28)',
};}
function catBadge(string $c): string { return match($c) {
    'AI Models' => 'b-aimodels', 'Research' => 'b-research',
    'Products'  => 'b-products', 'Tools'    => 'b-tools',
    default     => 'b-ainews',
};}
function catGlowClass(string $c): string { return match($c) {
    'AI Models' => 'glow-violet', 'Research' => 'glow-emerald',
    'Products'  => 'glow-orange', 'Tools'    => 'glow-pink',
    default     => 'glow-cyan',
};}
function readTime(?string $body): int {
    return max(1, (int)round(str_word_count($body ?? '') / 200));
}
function isNew(\Carbon\Carbon $date): bool {
    return $date->diffInHours(now()) <= 48;
}
@endphp

@section('content')

{{-- ════════════════════════════ HERO (homepage only) ════════════════════════════ --}}
@unless(isset($category))
<section class="relative overflow-hidden" style="min-height:480px;background:#020914;">

    <!-- Floating orbs -->
    <div class="absolute w-[500px] h-[500px] rounded-full pointer-events-none animate-float-a"
         style="top:-120px;left:-100px;background:radial-gradient(circle,rgba(129,140,248,.18),transparent 68%);filter:blur(60px);"></div>
    <div class="absolute w-[400px] h-[400px] rounded-full pointer-events-none animate-float-b"
         style="bottom:-80px;right:-60px;background:radial-gradient(circle,rgba(34,211,238,.14),transparent 68%);filter:blur(60px);"></div>
    <div class="absolute w-[280px] h-[280px] rounded-full pointer-events-none animate-float-a"
         style="top:30%;right:15%;background:radial-gradient(circle,rgba(244,114,182,.08),transparent 68%);filter:blur(50px);"></div>

    <!-- Grid pattern -->
    <div class="absolute inset-0 pointer-events-none"
         style="background-image:linear-gradient(rgba(129,140,248,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(129,140,248,.04) 1px,transparent 1px);background-size:64px 64px;"></div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center" style="min-height:480px;">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 w-full py-16">

            <!-- Left: copy -->
            <div class="flex flex-col justify-center">
                <!-- Live pill -->
                <div class="flex items-center gap-3 mb-5">
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-full"
                         style="background:rgba(52,211,153,.08);border:1px solid rgba(52,211,153,.22);">
                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="text-emerald-400 text-[11px] font-black font-grotesk tracking-[.15em]">LIVE FEED</span>
                    </div>
                    <span class="text-slate-600 text-xs font-inter">20 stories · 5 categories</span>
                </div>

                <!-- Headline -->
                <h1 class="font-grotesk font-bold leading-[1.08] mb-5" style="font-size:clamp(2.4rem,5.5vw,4.2rem);">
                    <span class="text-white">The Future of</span><br>
                    <span class="grad-text">Artificial Intelligence</span><br>
                    <span class="text-slate-400" style="font-size:0.52em;font-weight:500;letter-spacing:.01em;">— reported in real time</span>
                </h1>

                <p class="text-slate-400 text-[1.05rem] leading-relaxed mb-7 font-inter max-w-lg">
                    Breakthroughs, model releases, regulation, research, and the tools building tomorrow. All in one feed.
                </p>

                <!-- CTAs -->
                <div class="flex flex-wrap gap-3 mb-10">
                    <a href="#stories" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-grotesk font-semibold text-sm text-white"
                       style="background:linear-gradient(135deg,#818cf8,#22d3ee);box-shadow:0 0 22px rgba(129,140,248,.4);"
                       onmouseover="this.style.boxShadow='0 0 36px rgba(129,140,248,.6)'"
                       onmouseout="this.style.boxShadow='0 0 22px rgba(129,140,248,.4)'">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Top Stories
                    </a>
                    <a href="{{ route('category','Research') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-grotesk font-semibold text-sm text-slate-300 transition-all"
                       style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,.1);"
                       onmouseover="this.style.borderColor='rgba(52,211,153,.45)';this.style.color='#34d399'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,.1)';this.style.color=''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Research
                    </a>
                    <a href="{{ route('category','Tools') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-grotesk font-semibold text-sm text-slate-300 transition-all"
                       style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,.1);"
                       onmouseover="this.style.borderColor='rgba(244,114,182,.45)';this.style.color='#f472b6'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,.1)';this.style.color=''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Tools
                    </a>
                </div>

                <!-- Stats row -->
                <div class="flex flex-wrap gap-6 pt-4" style="border-top:1px solid rgba(255,255,255,.06);">
                    @foreach([['20+','Articles'],['5','Categories'],['6h','Refresh'],['50+','Sources']] as [$num,$lbl])
                    <div>
                        <div class="font-grotesk font-bold text-xl text-white">{{ $num }}</div>
                        <div class="text-xs text-slate-600 font-inter">{{ $lbl }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: stacked article preview cards -->
            <div class="hidden lg:flex items-center justify-center relative">
                @php $previewArticles = $articles->take(3); @endphp
                <div class="relative w-full" style="height:360px;">
                    @foreach($previewArticles as $i => $prev)
                    @php
                        $rotations = ['-rotate-3', 'rotate-1', 'rotate-3'];
                        $tops      = ['top-4', 'top-10', 'top-16'];
                        $zIndexes  = [10, 20, 30];
                        $rot = $rotations[$i] ?? 'rotate-0';
                        $top = $tops[$i] ?? 'top-0';
                        $z   = $zIndexes[$i] ?? 10;
                    @endphp
                    <div class="absolute inset-x-8 {{ $top }} glass-card rounded-2xl overflow-hidden transition-all duration-300 hover:scale-105 hover:rotate-0"
                         style="z-index:{{ $z }};transform:rotate({{ [-3,1,3][$i] ?? 0 }}deg);">
                        <div class="flex h-24">
                            @if($prev->image_url)
                            <div class="w-28 shrink-0 overflow-hidden">
                                <img src="{{ $prev->image_url }}" class="w-full h-full object-cover" loading="lazy">
                            </div>
                            @endif
                            <div class="flex-1 p-3 flex flex-col justify-between">
                                <div>
                                    <span class="text-[10px] font-grotesk font-bold uppercase px-1.5 py-0.5 rounded {{ catBadge($prev->category) }}">{{ $prev->category }}</span>
                                    <p class="text-xs font-grotesk font-semibold text-white mt-1 line-clamp-2 leading-snug">{{ $prev->title }}</p>
                                </div>
                                <div class="text-[10px] text-slate-600 font-inter">{{ $prev->published_at?->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom fade -->
    <div class="absolute bottom-0 inset-x-0 h-20 pointer-events-none"
         style="background:linear-gradient(to bottom,transparent,#020914);"></div>
</section>
@endunless

{{-- ════════════════ CATEGORY PAGE HEADER ════════════════ --}}
@if(isset($category))
@php $cc = catColor($category); $cg = catGlow($category); @endphp
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-2">
    <div class="flex items-center gap-2 text-xs text-slate-600 font-inter mb-3">
        <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors">Home</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span style="color:{{ $cc }}">{{ $category }}</span>
    </div>
    <h1 class="font-grotesk font-bold text-3xl md:text-4xl text-white mb-1"
        style="text-shadow:0 0 32px {{ $cg }}">{{ $category }}</h1>
    <p class="text-slate-500 text-sm font-inter">{{ $articles->total() }} articles in this category</p>
</div>
@endif

{{-- ════════════════════ TRENDING TOPICS STRIP ════════════════════ --}}
@unless(isset($category))
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-2">
    <div class="flex items-center gap-3 overflow-x-auto pb-1 scrollbar-hide" style="scrollbar-width:none;">
        <div class="flex items-center gap-1.5 shrink-0 px-3 py-1.5 rounded-full"
             style="background:rgba(251,191,36,.1);border:1px solid rgba(251,191,36,.25);">
            <span class="text-amber-400 text-xs font-black font-grotesk tracking-wider">🔥 Trending</span>
        </div>
        @php
        $trendTags = [
            ['GPT-5',       route('category','AI Models')],
            ['Gemini Ultra',route('category','AI Models')],
            ['Open Source', route('category','Research')],
            ['AI Safety',   route('category','AI News')],
            ['LLMs',        route('category','Research')],
            ['Copilot',     route('category','Tools')],
            ['EU Regulation',route('category','AI News')],
            ['Healthcare AI',route('category','AI News')],
            ['Cursor IDE',  route('category','Tools')],
            ['AlphaFold',   route('category','Research')],
        ];
        @endphp
        @foreach($trendTags as [$tag,$href])
        <a href="{{ $href }}" class="shrink-0 px-3 py-1.5 rounded-full text-xs font-inter text-slate-400 hover:text-white transition-all"
           style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);"
           onmouseover="this.style.background='rgba(129,140,248,.12)';this.style.borderColor='rgba(129,140,248,.35)';this.style.color='#a78bfa';"
           onmouseout="this.style.background='rgba(255,255,255,.04)';this.style.borderColor='rgba(255,255,255,.08)';this.style.color='';">
            {{ $tag }}
        </a>
        @endforeach
    </div>
</div>
@endunless

{{-- ════════════════════════════ MAIN CONTENT ════════════════════════════ --}}
<div id="stories" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    @if($articles->isEmpty())
    <div class="flex flex-col items-center justify-center py-32 text-center">
        <div class="w-20 h-20 rounded-2xl mb-5 flex items-center justify-center text-4xl"
             style="background:rgba(129,140,248,.1);border:1px solid rgba(129,140,248,.2);">🤖</div>
        <h2 class="font-grotesk font-bold text-xl text-white mb-2">No articles yet</h2>
        <p class="text-slate-500 font-inter text-sm max-w-xs">Run <code class="text-violet-400 bg-violet-500/10 px-1.5 py-0.5 rounded">php artisan news:fetch</code> or seed the database.</p>
    </div>

    @else
    @php
        $featured  = $articles->first();
        $second    = $articles->get(1);
        $third     = $articles->get(2);
        $fourth    = $articles->get(3);
        $gridItems = $articles->slice(4);
    @endphp

    {{-- ══════════════ SECTION LABEL ══════════════ --}}
    <div class="flex items-center gap-3 mb-6">
        <div class="h-px flex-1" style="background:linear-gradient(90deg,rgba(129,140,248,.5),transparent);"></div>
        <span class="text-[11px] font-grotesk font-black uppercase tracking-[.18em] text-slate-400 px-2">Top Stories</span>
        <div class="h-px flex-1" style="background:linear-gradient(90deg,transparent,rgba(129,140,248,.5));"></div>
    </div>

    {{-- ══════════════ 2-UP FEATURED SPLIT ══════════════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-[3fr_2fr] gap-5 mb-8">

        <!-- BIG featured card -->
        @if($featured)
        @php $fc = catColor($featured->category); $fg = catGlow($featured->category); @endphp
        <a href="{{ route('article.show', $featured->slug) }}"
           class="group relative flex flex-col overflow-hidden rounded-2xl c-card {{ catGlowClass($featured->category) }}"
           style="min-height:340px;background:rgba(255,255,255,.025);border:1px solid rgba(255,255,255,.07);">

            @if($featured->image_url)
            <div class="relative overflow-hidden" style="height:220px;">
                <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0" style="background:linear-gradient(to top,rgba(2,9,20,.9) 0%,rgba(2,9,20,.2) 60%,transparent 100%);"></div>
                @if(isNew($featured->published_at ?? now()))
                <span class="absolute top-3 right-3 px-2 py-0.5 rounded-full text-[10px] font-grotesk font-black text-white uppercase tracking-wider"
                      style="background:linear-gradient(135deg,#818cf8,#22d3ee);">NEW</span>
                @endif
            </div>
            @endif

            <div class="flex-1 flex flex-col p-5">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-0.5 rounded-full text-[11px] font-grotesk font-bold uppercase tracking-wider {{ catBadge($featured->category) }}">{{ $featured->category }}</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-grotesk font-bold text-amber-400 uppercase tracking-wider"
                          style="background:rgba(251,191,36,.1);border:1px solid rgba(251,191,36,.22);">★ Featured</span>
                </div>
                <h2 class="font-grotesk font-bold text-lg text-white leading-snug mb-2 group-hover:text-slate-100 transition-colors line-clamp-3">
                    {{ $featured->title }}
                </h2>
                @if($featured->excerpt)
                <p class="text-slate-400 text-xs font-inter leading-relaxed mb-3 line-clamp-2 flex-1">{{ $featured->excerpt }}</p>
                @endif
                <div class="flex items-center justify-between mt-auto pt-3" style="border-top:1px solid rgba(255,255,255,.06);">
                    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-inter">
                        @if($featured->source_name)<span>{{ $featured->source_name }}</span><span class="text-slate-700">·</span>@endif
                        @if($featured->published_at)<span>{{ $featured->published_at->diffForHumans() }}</span><span class="text-slate-700">·</span>@endif
                        <span>{{ readTime($featured->body) }} min read</span>
                    </div>
                    <span class="text-[11px] font-grotesk font-semibold flex items-center gap-1 group-hover:gap-2 transition-all" style="color:{{ $fc }}">
                        Read <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </span>
                </div>
            </div>
        </a>
        @endif

        <!-- Stack of 3 smaller featured cards -->
        <div class="flex flex-col gap-3">
            @foreach([$second, $third, $fourth] as $sf)
            @if($sf)
            @php $sc = catColor($sf->category); @endphp
            <a href="{{ route('article.show', $sf->slug) }}"
               class="group flex gap-3 p-3 rounded-xl c-card {{ catGlowClass($sf->category) }} flex-1"
               style="background:rgba(255,255,255,.025);border:1px solid rgba(255,255,255,.07);">
                @if($sf->image_url)
                <div class="w-20 h-20 rounded-lg overflow-hidden shrink-0">
                    <img src="{{ $sf->image_url }}" alt="{{ $sf->title }}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                @else
                <div class="w-20 h-20 rounded-lg shrink-0 flex items-center justify-center"
                     style="background:{{ $sc }}18;border:1px solid {{ $sc }}25;">
                    <div class="w-6 h-6 rounded-md" style="background:{{ $sc }}40;"></div>
                </div>
                @endif
                <div class="flex flex-col justify-between flex-1 min-w-0">
                    <div>
                        <span class="text-[10px] font-grotesk font-bold uppercase px-1.5 py-0.5 rounded {{ catBadge($sf->category) }}">{{ $sf->category }}</span>
                        <h3 class="text-sm font-grotesk font-semibold text-slate-100 leading-snug mt-1 line-clamp-2 group-hover:text-white transition-colors">{{ $sf->title }}</h3>
                    </div>
                    <div class="flex items-center gap-1.5 text-[10px] text-slate-600 font-inter">
                        @if($sf->published_at)<span>{{ $sf->published_at->diffForHumans() }}</span>@endif
                        <span>·</span>
                        <span>{{ readTime($sf->body) }} min</span>
                        @if(isNew($sf->published_at ?? now()))
                        <span class="text-emerald-500 font-bold">NEW</span>
                        @endif
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </div>

    {{-- ══════════════ CATEGORY SHOWCASE ══════════════ --}}
    @unless(isset($category))
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="h-px flex-1" style="background:linear-gradient(90deg,rgba(34,211,238,.4),transparent);"></div>
            <span class="text-[11px] font-grotesk font-black uppercase tracking-[.18em] text-cyan-500 px-2">Explore by Category</span>
            <div class="h-px flex-1" style="background:linear-gradient(90deg,transparent,rgba(34,211,238,.4));"></div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
            @php
            $catIcons = [
                'AI News'   => ['#22d3ee','M13 10V3L4 14h7v7l9-11h-7z'],
                'AI Models' => ['#a78bfa','M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                'Research'  => ['#34d399','M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
                'Products'  => ['#fb923c','M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                'Tools'     => ['#f472b6','M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z'],
            ];
            @endphp
            @foreach($catIcons as $catName => [$clr, $iconPath])
            @php $count = $articles->filter(fn($a) => $a->category === $catName)->count(); @endphp
            <a href="{{ route('category', $catName) }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl c-card {{ catGlowClass($catName) }} text-center"
               style="background:rgba(255,255,255,.025);border:1px solid rgba(255,255,255,.07);">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110"
                     style="background:{{ $clr }}18;border:1px solid {{ $clr }}30;">
                    <svg class="w-5 h-5" style="color:{{ $clr }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $iconPath }}"/>
                    </svg>
                </div>
                <div>
                    <div class="font-grotesk font-semibold text-sm text-white">{{ $catName }}</div>
                    @if($count)
                    <div class="text-[11px] font-inter text-slate-500">{{ $count }} article{{ $count !== 1 ? 's' : '' }}</div>
                    @endif
                </div>
                <span class="text-[10px] font-grotesk font-semibold opacity-0 group-hover:opacity-100 transition-all" style="color:{{ $clr }}">Explore →</span>
            </a>
            @endforeach
        </div>
    </div>
    @endunless

    {{-- ══════════════ LATEST INTELLIGENCE GRID ══════════════ --}}
    @if($gridItems->isNotEmpty())
    <div class="flex items-center gap-3 mb-5">
        <div class="h-px flex-1" style="background:linear-gradient(90deg,rgba(244,114,182,.4),transparent);"></div>
        <span class="text-[11px] font-grotesk font-black uppercase tracking-[.18em] text-pink-400 px-2">Latest Intelligence</span>
        <div class="h-px flex-1" style="background:linear-gradient(90deg,transparent,rgba(244,114,182,.4));"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-10">
        @foreach($gridItems as $art)
        @php
            $ac = catColor($art->category);
            $ag = catGlow($art->category);
            $ab = catBadge($art->category);
            $acls = catGlowClass($art->category);
            $rt = readTime($art->body);
            $artNew = isNew($art->published_at ?? now());
        @endphp
        <a href="{{ route('article.show', $art->slug) }}"
           class="group flex flex-col rounded-xl overflow-hidden c-card {{ $acls }}"
           style="background:rgba(255,255,255,.025);border:1px solid rgba(255,255,255,.07);">

            <!-- Image -->
            <div class="relative overflow-hidden" style="height:185px;background:linear-gradient(135deg,{{ $ac }}18,{{ $ac }}05);">
                @if($art->image_url)
                <img src="{{ $art->image_url }}" alt="{{ $art->title }}"
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0" style="background:linear-gradient(to top,rgba(2,9,20,.85) 0%,transparent 60%);"></div>
                @else
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                         style="background:{{ $ac }}20;border:1px solid {{ $ac }}30;">
                        <svg class="w-6 h-6" style="color:{{ $ac }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                @endif

                <!-- Top badges overlay -->
                <div class="absolute top-2.5 left-2.5 right-2.5 flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded-md text-[10px] font-grotesk font-bold uppercase tracking-wide {{ $ab }}">{{ $art->category }}</span>
                    @if($artNew)
                    <span class="px-2 py-0.5 rounded-full text-[9px] font-grotesk font-black text-white uppercase"
                          style="background:linear-gradient(135deg,#818cf8,#22d3ee);">NEW</span>
                    @endif
                </div>
            </div>

            <!-- Body -->
            <div class="flex flex-col flex-1 p-4">
                <h3 class="font-grotesk font-semibold text-slate-100 leading-snug mb-2 line-clamp-2 group-hover:text-white transition-colors"
                    style="font-size:.9rem;">{{ $art->title }}</h3>
                @if($art->excerpt)
                <p class="text-slate-500 text-xs font-inter leading-relaxed line-clamp-2 mb-3 flex-1">{{ $art->excerpt }}</p>
                @endif

                <!-- Footer -->
                <div class="flex items-center justify-between mt-auto pt-3"
                     style="border-top:1px solid rgba(255,255,255,.05);">
                    <div class="flex items-center gap-1.5 text-[11px] text-slate-600 font-inter">
                        @if($art->source_name)
                        <span class="truncate max-w-[90px]">{{ $art->source_name }}</span>
                        <span class="text-slate-800">·</span>
                        @endif
                        @if($art->published_at)
                        <span class="shrink-0">{{ $art->published_at->diffForHumans() }}</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-1.5 text-[11px] font-inter shrink-0">
                        <svg class="w-3 h-3 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-slate-500">{{ $rt }} min</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    @endif

    {{-- ══════════════ NEWSLETTER CTA ══════════════ --}}
    @unless(isset($category))
    <div class="relative overflow-hidden rounded-2xl mb-10 p-8 md:p-10 text-center"
         style="background:linear-gradient(135deg,rgba(129,140,248,.08),rgba(34,211,238,.05));border:1px solid rgba(129,140,248,.2);">
        <!-- bg orb -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 pointer-events-none"
             style="background:radial-gradient(circle,rgba(129,140,248,.12),transparent 70%);filter:blur(40px);"></div>

        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full mb-4"
                 style="background:rgba(129,140,248,.1);border:1px solid rgba(129,140,248,.25);">
                <svg class="w-3.5 h-3.5 text-violet-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
                <span class="text-violet-400 text-xs font-grotesk font-bold uppercase tracking-wider">The AI Now Digest</span>
            </div>

            <h2 class="font-grotesk font-bold text-2xl md:text-3xl text-white mb-2">
                Never Miss a Breakthrough
            </h2>
            <p class="text-slate-400 font-inter text-sm mb-6 max-w-md mx-auto">
                Get the most important AI stories of the day in one curated email. Join 24,000+ researchers, engineers, and executives.
            </p>

            <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto" onsubmit="return false;">
                <input type="email" placeholder="your@email.com"
                       class="flex-1 px-4 py-2.5 rounded-xl text-sm font-inter text-slate-200 placeholder-slate-600 focus:outline-none"
                       style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);"
                       onfocus="this.style.borderColor='rgba(129,140,248,.5)'"
                       onblur="this.style.borderColor='rgba(255,255,255,.1)'">
                <button type="submit"
                        class="px-6 py-2.5 rounded-xl font-grotesk font-bold text-sm text-white shrink-0 transition-all"
                        style="background:linear-gradient(135deg,#818cf8,#22d3ee);box-shadow:0 0 20px rgba(129,140,248,.4);"
                        onmouseover="this.style.boxShadow='0 0 30px rgba(129,140,248,.6)'"
                        onmouseout="this.style.boxShadow='0 0 20px rgba(129,140,248,.4)'">
                    Subscribe Free →
                </button>
            </form>

            <p class="text-slate-600 text-xs font-inter mt-3">
                No spam, ever. Unsubscribe with one click. Read by teams at Google, OpenAI, Microsoft &amp; more.
            </p>
        </div>
    </div>
    @endunless

    {{-- ══════════════ PAGINATION ══════════════ --}}
    @if($articles->hasPages())
    <div class="flex justify-center mt-2">{{ $articles->links() }}</div>
    @endif

    @endif {{-- end !isEmpty --}}
</div>
@endsection
