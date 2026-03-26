@extends('layouts.app')

@section('title', $article->title . ' — AI Now')

@php
function catColor(string $cat): string {
    return match($cat) {
        'AI Models' => '#8b5cf6',
        'Research'  => '#10b981',
        'Products'  => '#f97316',
        'Tools'     => '#ec4899',
        default     => '#06b6d4',
    };
}
function catGlow(string $cat): string {
    return match($cat) {
        'AI Models' => 'rgba(139,92,246,0.35)',
        'Research'  => 'rgba(16,185,129,0.35)',
        'Products'  => 'rgba(249,115,22,0.35)',
        'Tools'     => 'rgba(236,72,153,0.35)',
        default     => 'rgba(6,182,212,0.35)',
    };
}
function catBadge(string $cat): string {
    return match($cat) {
        'AI Models' => 'badge-ai-models',
        'Research'  => 'badge-research',
        'Products'  => 'badge-products',
        'Tools'     => 'badge-tools',
        default     => 'badge-ai-news',
    };
}
function readTime(?string $body): int {
    return max(1, (int)round(str_word_count($body ?? '') / 200));
}
function authorInitials(string $name): string {
    $parts = explode(' ', trim($name));
    if (count($parts) >= 2) {
        return strtoupper(mb_substr($parts[0], 0, 1) . mb_substr($parts[count($parts)-1], 0, 1));
    }
    return strtoupper(mb_substr($name, 0, 2));
}
$color    = catColor($article->category);
$glow     = catGlow($article->category);
$badge    = catBadge($article->category);
$readMins = readTime($article->body);
$pageUrl  = url()->current();
$shareTitle = urlencode($article->title);
$shareUrl   = urlencode($pageUrl);
@endphp

@section('content')

{{-- ══════════════════════════════════════════════════════════ --}}
{{-- CINEMATIC HERO                                             --}}
{{-- ══════════════════════════════════════════════════════════ --}}
<div class="relative overflow-hidden" style="height: 460px; background: {{ $article->image_url ? '#030712' : "linear-gradient(135deg, {$color}20, rgba(3,7,18,0.98))" }};">

    @if($article->image_url)
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
             class="absolute inset-0 w-full h-full object-cover"
             style="filter: brightness(0.32) saturate(1.2);">
    @else
        <div class="absolute inset-0">
            <div class="orb w-80 h-80 top-[-40px] left-[-40px]" style="background: radial-gradient(circle, {{ $color }}, transparent 70%); opacity: 0.25;"></div>
            <div class="orb w-64 h-64 bottom-[-20px] right-[10%]" style="background: radial-gradient(circle, #8b5cf6, transparent 70%); opacity: 0.15;"></div>
        </div>
        <div class="absolute inset-0" style="background-image: linear-gradient({{ $color }}08 1px, transparent 1px), linear-gradient(90deg, {{ $color }}08 1px, transparent 1px); background-size: 50px 50px;"></div>
    @endif

    <!-- Gradient overlays -->
    <div class="absolute inset-0" style="background: linear-gradient(to top, #030712 0%, rgba(3,7,18,0.72) 55%, rgba(3,7,18,0.28) 100%);"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to right, rgba(3,7,18,0.55), transparent 55%);"></div>

    <!-- Hero Content -->
    <div class="absolute inset-0 flex items-end">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-10 w-full">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-xs text-slate-500 font-inter mb-4">
                <a href="{{ route('home') }}" class="hover:text-slate-300 transition-colors">Home</a>
                <svg class="w-3 h-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('category', $article->category) }}" class="hover:text-slate-300 transition-colors" style="color: {{ $color }}">{{ $article->category }}</a>
            </div>

            <!-- Category + meta badges -->
            <div class="flex flex-wrap items-center gap-2.5 mb-4">
                <a href="{{ route('category', $article->category) }}">
                    <span class="px-2.5 py-1 rounded-full text-xs font-grotesk font-bold uppercase tracking-wider {{ $badge }}">
                        {{ $article->category }}
                    </span>
                </a>

                <!-- Reading time badge -->
                <span class="flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-inter font-medium"
                      style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12); color: #94a3b8;">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $readMins }} min read
                </span>

                @if($article->published_at)
                <span class="flex items-center gap-1.5 text-xs text-slate-400 font-inter">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ $article->published_at->format('M d, Y') }}
                </span>
                @endif

                @if($article->source_name)
                <span class="flex items-center gap-1.5 text-xs text-slate-400 font-inter">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    {{ $article->source_name }}
                </span>
                @endif
            </div>

            <!-- Title -->
            <h1 class="font-grotesk font-bold text-white leading-tight"
                style="font-size: clamp(1.6rem, 3.8vw, 2.75rem); text-shadow: 0 2px 24px rgba(0,0,0,0.6); max-width: 820px;">
                {{ $article->title }}
            </h1>

            @if($article->author)
            <p class="text-slate-500 text-sm font-inter mt-3">
                by <span class="text-slate-300">{{ $article->author }}</span>
            </p>
            @endif
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════ --}}
{{-- MOBILE SHARE BAR                                           --}}
{{-- ══════════════════════════════════════════════════════════ --}}
<div class="lg:hidden max-w-6xl mx-auto px-4 sm:px-6 pt-6">
    <div class="flex items-center gap-2 p-3 rounded-xl" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
        <span class="text-xs font-grotesk font-bold uppercase tracking-widest text-slate-500 mr-1">Share</span>
        <!-- Twitter/X -->
        <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $shareUrl }}"
           target="_blank" rel="noopener noreferrer"
           class="flex items-center justify-center w-9 h-9 rounded-lg transition-all hover:scale-110"
           style="background: rgba(29,161,242,0.12); border: 1px solid rgba(29,161,242,0.25);"
           title="Share on X">
            <svg class="w-4 h-4" style="color: #1DA1F2;" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.259 5.63 5.905-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
            </svg>
        </a>
        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
           target="_blank" rel="noopener noreferrer"
           class="flex items-center justify-center w-9 h-9 rounded-lg transition-all hover:scale-110"
           style="background: rgba(10,102,194,0.12); border: 1px solid rgba(10,102,194,0.25);"
           title="Share on LinkedIn">
            <svg class="w-4 h-4" style="color: #0A66C2;" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
        </a>
        <!-- Copy Link -->
        <button onclick="copyLink(this, '{{ $pageUrl }}')"
                class="flex items-center justify-center w-9 h-9 rounded-lg transition-all hover:scale-110"
                style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);"
                title="Copy link">
            <svg id="copy-icon-mobile" class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
            </svg>
        </button>
        <!-- Email -->
        <a href="mailto:?subject={{ $shareTitle }}&body={{ $shareUrl }}"
           class="flex items-center justify-center w-9 h-9 rounded-lg transition-all hover:scale-110"
           style="background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12);"
           title="Share via Email">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </a>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════ --}}
{{-- ARTICLE BODY + SIDEBAR                                     --}}
{{-- ══════════════════════════════════════════════════════════ --}}
<div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- DESKTOP STICKY SHARE BAR (left edge) --}}
    <div class="hidden lg:flex flex-col items-center gap-3 fixed left-6 xl:left-10 top-1/2 -translate-y-1/2 z-40" id="desktop-share-bar">
        <span class="text-[10px] font-grotesk font-bold uppercase tracking-widest text-slate-600 rotate-180" style="writing-mode: vertical-rl;">Share</span>

        <!-- Twitter/X -->
        <a href="https://twitter.com/intent/tweet?text={{ $shareTitle }}&url={{ $shareUrl }}"
           target="_blank" rel="noopener noreferrer"
           class="flex items-center justify-center w-10 h-10 rounded-xl transition-all duration-200 hover:scale-110 hover:-translate-y-0.5"
           style="background: rgba(29,161,242,0.1); border: 1px solid rgba(29,161,242,0.2);"
           onmouseover="this.style.boxShadow='0 0 16px rgba(29,161,242,0.4)'; this.style.background='rgba(29,161,242,0.2)';"
           onmouseout="this.style.boxShadow='none'; this.style.background='rgba(29,161,242,0.1)';"
           title="Share on X">
            <svg class="w-4 h-4" style="color: #1DA1F2;" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.259 5.63 5.905-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
            </svg>
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
           target="_blank" rel="noopener noreferrer"
           class="flex items-center justify-center w-10 h-10 rounded-xl transition-all duration-200 hover:scale-110 hover:-translate-y-0.5"
           style="background: rgba(10,102,194,0.1); border: 1px solid rgba(10,102,194,0.2);"
           onmouseover="this.style.boxShadow='0 0 16px rgba(10,102,194,0.4)'; this.style.background='rgba(10,102,194,0.2)';"
           onmouseout="this.style.boxShadow='none'; this.style.background='rgba(10,102,194,0.1)';"
           title="Share on LinkedIn">
            <svg class="w-4 h-4" style="color: #0A66C2;" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
        </a>

        <!-- Copy Link -->
        <button onclick="copyLink(this, '{{ $pageUrl }}')"
                class="flex items-center justify-center w-10 h-10 rounded-xl transition-all duration-200 hover:scale-110 hover:-translate-y-0.5"
                style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);"
                onmouseover="this.style.boxShadow='0 0 16px rgba(255,255,255,0.15)'; this.style.background='rgba(255,255,255,0.12)';"
                onmouseout="this.style.boxShadow='none'; this.style.background='rgba(255,255,255,0.06)';"
                title="Copy link">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
            </svg>
        </button>

        <!-- Email -->
        <a href="mailto:?subject={{ $shareTitle }}&body={{ $shareUrl }}"
           class="flex items-center justify-center w-10 h-10 rounded-xl transition-all duration-200 hover:scale-110 hover:-translate-y-0.5"
           style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);"
           onmouseover="this.style.boxShadow='0 0 16px rgba(255,255,255,0.15)'; this.style.background='rgba(255,255,255,0.12)';"
           onmouseout="this.style.boxShadow='none'; this.style.background='rgba(255,255,255,0.06)';"
           title="Email this article">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </a>

        <div class="w-px h-8 mt-1" style="background: linear-gradient(to bottom, rgba(255,255,255,0.1), transparent);"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-[1fr_300px] gap-10">

        <!-- ─── MAIN ARTICLE ─── -->
        <article>
            <!-- Excerpt / lead paragraph -->
            @if($article->excerpt)
            <div class="relative mb-8 p-6 rounded-xl overflow-hidden"
                 style="background: {{ $color }}0a; border: 1px solid {{ $color }}25; border-left: 3px solid {{ $color }};">
                <div class="absolute top-0 right-0 w-32 h-32 rounded-full opacity-10"
                     style="background: radial-gradient(circle, {{ $color }}, transparent 70%); transform: translate(30%, -30%);"></div>
                <p class="relative text-slate-200 text-base md:text-lg leading-relaxed font-inter font-medium">
                    {{ $article->excerpt }}
                </p>
            </div>
            @endif

            <hr class="neon-hr mb-8">

            <!-- Body content -->
            @if($article->body)
            <div class="font-inter text-slate-300 leading-[1.9] space-y-5" style="font-size: 1.05rem;">
                {!! nl2br(e($article->body)) !!}
            </div>
            @endif

            <!-- Source button -->
            @if($article->source_url)
            <div class="mt-10 pt-8" style="border-top: 1px solid rgba(255,255,255,0.06);">
                <p class="text-slate-500 text-sm font-inter mb-4">Read the full story at the original source:</p>
                <a href="{{ $article->source_url }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-3 px-6 py-3 rounded-xl font-grotesk font-semibold text-sm text-white transition-all group"
                   style="background: linear-gradient(135deg, {{ $color }}22, {{ $color }}15); border: 1px solid {{ $color }}40;"
                   onmouseover="this.style.boxShadow='0 0 25px {{ $glow }}'; this.style.borderColor='{{ $color }}80';"
                   onmouseout="this.style.boxShadow='none'; this.style.borderColor='{{ $color }}40';">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" style="background: {{ $color }}25;">
                        <svg class="w-4 h-4" style="color: {{ $color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </div>
                    <div>
                        <div style="color: {{ $color }}">Read Original Article</div>
                        @if($article->source_name)
                        <div class="text-xs text-slate-500 font-inter font-normal mt-0.5">on {{ $article->source_name }}</div>
                        @endif
                    </div>
                    <svg class="w-4 h-4 ml-auto text-slate-600 group-hover:translate-x-1 group-hover:text-slate-400 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            @endif

            <!-- ─── AUTHOR CARD ─── -->
            @if($article->author)
            @php $initials = authorInitials($article->author); @endphp
            <div class="mt-10 p-6 rounded-2xl"
                 style="background: linear-gradient(135deg, {{ $color }}08, rgba(255,255,255,0.02)); border: 1px solid {{ $color }}20;">
                <div class="flex items-start gap-5">
                    <!-- Avatar -->
                    <div class="shrink-0 w-14 h-14 rounded-2xl flex items-center justify-center font-grotesk font-bold text-lg select-none"
                         style="background: linear-gradient(135deg, {{ $color }}30, {{ $color }}18); border: 1.5px solid {{ $color }}40; color: {{ $color }}; text-shadow: 0 0 12px {{ $color }}80;">
                        {{ $initials }}
                    </div>
                    <!-- Info -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <h4 class="font-grotesk font-bold text-white text-base">{{ $article->author }}</h4>
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-grotesk font-bold uppercase tracking-wider {{ $badge }}">
                                {{ $article->category }}
                            </span>
                        </div>
                        <p class="text-slate-400 text-sm font-inter">Senior AI Correspondent</p>
                        <p class="text-slate-600 text-xs font-inter mt-0.5">Covering {{ $article->category }} &amp; emerging technologies</p>
                        <div class="flex items-center gap-3 mt-3">
                            <span class="flex items-center gap-1.5 text-xs text-slate-500 font-inter">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $readMins }} min read
                            </span>
                            @if($article->published_at)
                            <span class="text-slate-700">·</span>
                            <span class="text-xs text-slate-500 font-inter">{{ $article->published_at->format('M d, Y') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Back link -->
            <div class="mt-8">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-300 transition-colors font-inter group">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to all articles
                </a>
            </div>
        </article>

        <!-- ─── SIDEBAR ─── -->
        <aside class="space-y-5">

            <!-- Article meta card -->
            <div class="rounded-xl p-5 sticky top-24 space-y-5">
                <div style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.07);" class="rounded-xl p-5">
                    <h4 class="font-grotesk font-semibold text-xs uppercase tracking-widest text-slate-500 mb-4">Article Info</h4>
                    <div class="space-y-3">
                        @if($article->category)
                        <div>
                            <div class="text-xs text-slate-600 font-inter mb-1">Category</div>
                            <a href="{{ route('category', $article->category) }}">
                                <span class="px-2 py-0.5 rounded-md text-xs font-grotesk font-bold uppercase tracking-wide {{ $badge }}">
                                    {{ $article->category }}
                                </span>
                            </a>
                        </div>
                        @endif

                        <div>
                            <div class="text-xs text-slate-600 font-inter mb-1">Reading Time</div>
                            <div class="flex items-center gap-1.5 text-sm text-slate-300 font-inter">
                                <svg class="w-3.5 h-3.5" style="color: {{ $color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $readMins }} min read
                            </div>
                        </div>

                        @if($article->source_name)
                        <div>
                            <div class="text-xs text-slate-600 font-inter mb-1">Source</div>
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded flex items-center justify-center shrink-0"
                                     style="background: {{ $color }}20; border: 1px solid {{ $color }}30;">
                                    <div class="w-2 h-2 rounded-sm" style="background: {{ $color }};"></div>
                                </div>
                                <span class="text-sm text-slate-300 font-inter">{{ $article->source_name }}</span>
                            </div>
                        </div>
                        @endif

                        @if($article->published_at)
                        <div>
                            <div class="text-xs text-slate-600 font-inter mb-1">Published</div>
                            <span class="text-sm text-slate-300 font-inter">{{ $article->published_at->format('M d, Y') }}</span>
                            <div class="text-xs text-slate-600 font-inter mt-0.5">{{ $article->published_at->diffForHumans() }}</div>
                        </div>
                        @endif
                    </div>

                    @if($article->source_url)
                    <a href="{{ $article->source_url }}" target="_blank" rel="noopener noreferrer"
                       class="mt-5 w-full flex items-center justify-center gap-2 py-2 rounded-lg text-xs font-grotesk font-semibold transition-all"
                       style="background: {{ $color }}15; border: 1px solid {{ $color }}30; color: {{ $color }};"
                       onmouseover="this.style.background='{{ $color }}25';" onmouseout="this.style.background='{{ $color }}15';">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        View Original
                    </a>
                    @endif
                </div>

                <!-- Also Trending -->
                @if($related->isNotEmpty())
                <div class="rounded-xl p-5" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.07);">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-1.5 h-1.5 rounded-full animate-pulse" style="background: #f97316;"></div>
                        <h4 class="font-grotesk font-semibold text-xs uppercase tracking-widest text-slate-500">Also Trending</h4>
                    </div>
                    <div class="space-y-3">
                        @foreach($related->take(3) as $trend)
                        @php $tColor = catColor($trend->category); @endphp
                        <a href="{{ route('article.show', $trend->slug) }}"
                           class="flex items-start gap-3 group p-2 rounded-lg transition-all"
                           style="border: 1px solid transparent;"
                           onmouseover="this.style.background='rgba(255,255,255,0.04)'; this.style.borderColor='rgba(255,255,255,0.08)';"
                           onmouseout="this.style.background='transparent'; this.style.borderColor='transparent';">
                            <div class="w-1.5 h-1.5 rounded-full mt-1.5 shrink-0" style="background: {{ $tColor }};"></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-inter text-slate-400 group-hover:text-slate-200 transition-colors leading-snug line-clamp-2">
                                    {{ $trend->title }}
                                </p>
                                <div class="flex items-center gap-1.5 mt-1">
                                    <span class="text-[10px] font-grotesk font-bold uppercase tracking-wide" style="color: {{ $tColor }}">{{ $trend->category }}</span>
                                    @if($trend->published_at)
                                    <span class="text-[10px] text-slate-700">·</span>
                                    <span class="text-[10px] text-slate-600 font-inter">{{ $trend->published_at->diffForHumans() }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Explore Topics -->
                <div class="rounded-xl p-5" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.07);">
                    <h4 class="font-grotesk font-semibold text-xs uppercase tracking-widest text-slate-500 mb-3">Explore Topics</h4>
                    <div class="flex flex-col gap-1.5">
                        @foreach(['AI News' => '#06b6d4', 'AI Models' => '#8b5cf6', 'Research' => '#10b981', 'Products' => '#f97316', 'Tools' => '#ec4899'] as $cat => $catClr)
                        <a href="{{ route('category', $cat) }}"
                           class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-inter text-slate-400 transition-all {{ $cat === $article->category ? 'font-semibold' : '' }}"
                           style="border: 1px solid {{ $cat === $article->category ? $catClr.'40' : 'transparent' }}; {{ $cat === $article->category ? "background: {$catClr}12; color: {$catClr};" : '' }}"
                           onmouseover="this.style.background='{{ $catClr }}10'; this.style.borderColor='{{ $catClr }}25'; this.style.color='{{ $catClr }}';"
                           onmouseout="this.style.background='{{ $cat === $article->category ? $catClr.'12' : 'transparent' }}'; this.style.borderColor='{{ $cat === $article->category ? $catClr.'40' : 'transparent' }}'; this.style.color='{{ $cat === $article->category ? $catClr : '' }}';">
                            <div class="w-2 h-2 rounded-full shrink-0" style="background: {{ $catClr }};"></div>
                            {{ $cat }}
                            @if($cat === $article->category)
                            <svg class="w-3 h-3 ml-auto opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            @endif
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════ --}}
{{-- RELATED ARTICLES                                           --}}
{{-- ══════════════════════════════════════════════════════════ --}}
@if($related->isNotEmpty())
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="flex items-center gap-3 mb-6">
        <div class="h-px flex-1" style="background: linear-gradient(90deg, rgba(139,92,246,0.4), transparent);"></div>
        <span class="text-xs font-grotesk font-bold uppercase tracking-widest text-violet-400 px-2">Continue Reading</span>
        <div class="h-px flex-1" style="background: linear-gradient(90deg, transparent, rgba(139,92,246,0.4));"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        @foreach($related as $rel)
        @php
            $rColor = catColor($rel->category);
            $rBadge = catBadge($rel->category);
            $rMins  = readTime($rel->body);
        @endphp
        <a href="{{ route('article.show', $rel->slug) }}"
           class="group flex flex-col rounded-xl overflow-hidden card-neo transition-all duration-300"
           onmouseover="this.style.borderColor='{{ $rColor }}50'; this.style.boxShadow='0 0 24px {{ catGlow($rel->category) }}';"
           onmouseout="this.style.borderColor='rgba(255,255,255,0.07)'; this.style.boxShadow='none';">

            <div class="relative overflow-hidden" style="height: 155px; background: linear-gradient(135deg, {{ $rColor }}15, transparent);">
                @if($rel->image_url)
                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}"
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                     loading="lazy">
                <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(3,7,18,0.7), transparent 60%);"></div>
                @else
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                         style="background: {{ $rColor }}20; border: 1px solid {{ $rColor }}30;">
                        <div class="w-4 h-4 rounded-sm" style="background: {{ $rColor }}60;"></div>
                    </div>
                </div>
                @endif
                <div class="absolute top-2.5 left-2.5">
                    <span class="px-2 py-0.5 rounded-md text-xs font-grotesk font-bold uppercase tracking-wide {{ $rBadge }}">
                        {{ $rel->category }}
                    </span>
                </div>
            </div>

            <div class="flex flex-col flex-1 p-4">
                <h3 class="font-grotesk font-semibold text-slate-200 text-sm leading-snug line-clamp-2 group-hover:text-white transition-colors mb-2">
                    {{ $rel->title }}
                </h3>
                <div class="flex items-center justify-between mt-auto pt-2" style="border-top: 1px solid rgba(255,255,255,0.05);">
                    @if($rel->published_at)
                    <span class="text-xs text-slate-600 font-inter">{{ $rel->published_at->diffForHumans() }}</span>
                    @endif
                    <span class="flex items-center gap-1 text-xs text-slate-600 font-inter">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $rMins }}m
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

@push('scripts')
<script>
function copyLink(btn, url) {
    navigator.clipboard.writeText(url).then(() => {
        const svg = btn.querySelector('svg');
        if (svg) {
            svg.style.color = '#10b981';
            svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>';
            setTimeout(() => {
                svg.style.color = '';
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>';
            }, 2000);
        }
    }).catch(() => {
        // Fallback for older browsers
        const ta = document.createElement('textarea');
        ta.value = url;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        document.body.removeChild(ta);
    });
}
</script>
@endpush

@endsection
