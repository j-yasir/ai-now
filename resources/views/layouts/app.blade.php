<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AI Now — Real-Time Artificial Intelligence News')</title>
    <meta name="description" content="AI Now delivers real-time coverage of artificial intelligence breakthroughs, model releases, research, and tools shaping tomorrow.">
    <meta property="og:title" content="@yield('title', 'AI Now')">
    <meta property="og:description" content="Real-time coverage of AI breakthroughs, model releases, and the future of technology.">
    <meta property="og:type" content="website">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    grotesk: ['"Space Grotesk"', 'sans-serif'],
                    inter:   ['"Inter"', 'sans-serif'],
                },
                colors: {
                    base:    '#020914',
                    surface: '#0a1628',
                    glass:   'rgba(255,255,255,0.03)',
                    border:  'rgba(255,255,255,0.07)',
                },
                animation: {
                    'float-a':    'floatA 9s ease-in-out infinite',
                    'float-b':    'floatB 7s ease-in-out infinite reverse',
                    'shimmer':    'shimmer 5s linear infinite',
                    'ticker':     'ticker 40s linear infinite',
                    'pulse-dot':  'pulseDot 2s ease-in-out infinite',
                    'bar-fill':   'barFill 0.3s ease forwards',
                },
                keyframes: {
                    floatA:   { '0%,100%': { transform: 'translateY(0px) scale(1)' },   '50%': { transform: 'translateY(-24px) scale(1.04)' } },
                    floatB:   { '0%,100%': { transform: 'translateY(0px) scale(1.02)' },'50%': { transform: 'translateY(-18px) scale(1)' } },
                    shimmer:  { '0%,100%': { backgroundPosition: '0% 50%' },            '50%': { backgroundPosition: '100% 50%' } },
                    ticker:   { '0%': { transform: 'translateX(0)' }, '100%': { transform: 'translateX(-50%)' } },
                    pulseDot: { '0%,100%': { opacity:'0.5', transform:'scale(0.9)' },   '50%': { opacity:'1', transform:'scale(1.1)' } },
                },
            }
        }
    }
    </script>

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        html  { background: #020914; scroll-behavior: smooth; }
        body  { font-family: 'Inter', sans-serif; background: #020914; color: #cbd5e1; min-height: 100vh; overflow-x: hidden; }
        h1,h2,h3,h4,h5,h6 { font-family: 'Space Grotesk', sans-serif; }

        /* ── Dot-grid pattern ── */
        .dot-bg {
            background-image: radial-gradient(rgba(99,102,241,0.1) 1px, transparent 1px);
            background-size: 28px 28px;
        }
        /* ── Glass cards ── */
        .glass-card {
            background: rgba(255,255,255,0.025);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,0.07);
        }
        .glass-nav {
            background: rgba(2,9,20,0.88);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }
        /* ── Gradient text ── */
        .grad-text {
            background: linear-gradient(100deg,#22d3ee,#818cf8,#f472b6,#22d3ee);
            background-size: 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 5s linear infinite;
        }
        /* ── Category glow cards ── */
        .c-card { transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease; }
        .c-card:hover { transform: translateY(-5px); }
        .c-card.glow-cyan:hover   { border-color: rgba(34,211,238,.45)!important;  box-shadow: 0 0 28px rgba(34,211,238,.18), 0 10px 40px rgba(0,0,0,.55); }
        .c-card.glow-violet:hover { border-color: rgba(129,140,248,.45)!important; box-shadow: 0 0 28px rgba(129,140,248,.18),0 10px 40px rgba(0,0,0,.55); }
        .c-card.glow-emerald:hover{ border-color: rgba(52,211,153,.45)!important;  box-shadow: 0 0 28px rgba(52,211,153,.18), 0 10px 40px rgba(0,0,0,.55); }
        .c-card.glow-orange:hover { border-color: rgba(251,146,60,.45)!important;  box-shadow: 0 0 28px rgba(251,146,60,.18), 0 10px 40px rgba(0,0,0,.55); }
        .c-card.glow-pink:hover   { border-color: rgba(244,114,182,.45)!important; box-shadow: 0 0 28px rgba(244,114,182,.18),0 10px 40px rgba(0,0,0,.55); }
        /* ── Category badges ── */
        .b-ainews    { color:#22d3ee; background:rgba(34,211,238,.1);  border:1px solid rgba(34,211,238,.22); }
        .b-aimodels  { color:#a78bfa; background:rgba(167,139,250,.1); border:1px solid rgba(167,139,250,.22);}
        .b-research  { color:#34d399; background:rgba(52,211,153,.1);  border:1px solid rgba(52,211,153,.22); }
        .b-products  { color:#fb923c; background:rgba(251,146,60,.1);  border:1px solid rgba(251,146,60,.22); }
        .b-tools     { color:#f472b6; background:rgba(244,114,182,.1); border:1px solid rgba(244,114,182,.22); }
        /* ── Ticker ── */
        .ticker-track { display:inline-flex; white-space:nowrap; animation: ticker 40s linear infinite; }
        .ticker-track:hover { animation-play-state: paused; }
        /* ── Neon divider ── */
        .neon-line { height:1px; background:linear-gradient(90deg,transparent,#818cf8 30%,#22d3ee 60%,#f472b6,transparent); border:none; }
        /* ── Reading progress bar ── */
        #read-progress { position:fixed; top:0; left:0; height:2px; z-index:9999; background:linear-gradient(90deg,#22d3ee,#818cf8,#f472b6); width:0%; transition:width .1s linear; }
        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width:5px; height:5px; }
        ::-webkit-scrollbar-track { background:#0a1628; }
        ::-webkit-scrollbar-thumb { background:rgba(129,140,248,.45); border-radius:3px; }
        ::-webkit-scrollbar-thumb:hover { background:rgba(129,140,248,.75); }
        /* ── Custom pagination ── */
        nav[aria-label] span, nav[aria-label] a {
            display:inline-flex!important; align-items:center!important; justify-content:center!important;
            min-width:2rem!important; height:2rem!important; border-radius:6px!important;
            font-size:.78rem!important; font-family:'Space Grotesk',sans-serif!important; margin:0 2px!important;
        }
        nav[aria-label] a { background:rgba(255,255,255,.05)!important; border:1px solid rgba(255,255,255,.09)!important; color:#94a3b8!important; text-decoration:none!important; transition:all .2s!important; }
        nav[aria-label] a:hover { background:rgba(129,140,248,.18)!important; border-color:rgba(129,140,248,.45)!important; color:#a78bfa!important; }
        nav[aria-label] span[aria-current] { background:linear-gradient(135deg,#818cf8,#22d3ee)!important; color:#fff!important; border:none!important; font-weight:600!important; }
        nav[aria-label] span.cursor-default { background:transparent!important; color:#334155!important; font-size:1.1rem!important; }
    </style>
</head>
<body class="dot-bg">

<!-- Reading progress bar (show page only) -->
<div id="read-progress"></div>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- HEADER                                                       --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<header class="sticky top-0 z-50">

    <!-- Main Navbar -->
    <nav class="glass-nav" style="border-bottom:1px solid rgba(129,140,248,0.18);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center h-16 gap-4">

                <!-- ── Logo ── -->
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0 group">
                    <!-- SVG Icon: hexagon + lightning bolt -->
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                        <defs>
                            <linearGradient id="hexGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#22d3ee"/>
                                <stop offset="50%" stop-color="#818cf8"/>
                                <stop offset="100%" stop-color="#f472b6"/>
                            </linearGradient>
                            <linearGradient id="boltGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#fff" stop-opacity="0.95"/>
                                <stop offset="100%" stop-color="#e0e7ff" stop-opacity="0.8"/>
                            </linearGradient>
                        </defs>
                        <!-- Hexagon shape -->
                        <polygon points="18,2 32,10 32,26 18,34 4,26 4,10" stroke="url(#hexGrad)" stroke-width="1.5" fill="rgba(129,140,248,0.1)"/>
                        <!-- Inner glow ring -->
                        <polygon points="18,6 29,12 29,24 18,30 7,24 7,12" stroke="url(#hexGrad)" stroke-width="0.5" fill="rgba(34,211,238,0.05)" opacity="0.5"/>
                        <!-- Lightning bolt -->
                        <path d="M20 9 L13 19 H18 L16 27 L23 17 H18 Z" fill="url(#boltGrad)"/>
                    </svg>
                    <div class="flex flex-col leading-none">
                        <span class="font-grotesk font-bold text-lg tracking-tight">
                            <span class="grad-text">AI</span><span class="text-white"> Now</span>
                        </span>
                        <span class="text-[9px] text-slate-500 font-inter uppercase tracking-widest -mt-0.5">Intelligence Feed</span>
                    </div>
                </a>

                <!-- ── Nav links (desktop) ── -->
                <div class="hidden lg:flex items-center gap-0.5 flex-1">
                    <a href="{{ route('home') }}" class="px-3 py-1.5 rounded-md text-[13px] font-medium font-inter text-slate-400 hover:text-white hover:bg-white/5 transition-all">Home</a>
                    <a href="{{ route('category', 'AI News') }}" class="px-3 py-1.5 rounded-md text-[13px] font-medium font-inter text-slate-400 hover:text-cyan-400 hover:bg-cyan-500/8 transition-all">AI News</a>
                    <a href="{{ route('category', 'AI Models') }}" class="px-3 py-1.5 rounded-md text-[13px] font-medium font-inter text-slate-400 hover:text-violet-400 hover:bg-violet-500/8 transition-all">AI Models</a>
                    <a href="{{ route('category', 'Research') }}" class="px-3 py-1.5 rounded-md text-[13px] font-medium font-inter text-slate-400 hover:text-emerald-400 hover:bg-emerald-500/8 transition-all">Research</a>
                    <a href="{{ route('category', 'Products') }}" class="px-3 py-1.5 rounded-md text-[13px] font-medium font-inter text-slate-400 hover:text-orange-400 hover:bg-orange-500/8 transition-all">Products</a>
                    <a href="{{ route('category', 'Tools') }}" class="px-3 py-1.5 rounded-md text-[13px] font-medium font-inter text-slate-400 hover:text-pink-400 hover:bg-pink-500/8 transition-all">Tools</a>
                </div>

                <!-- ── Right controls ── -->
                <div class="flex items-center gap-2 ml-auto lg:ml-0">
                    <!-- Search -->
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Search AI news..."
                            class="py-1.5 pl-8 pr-3 text-[13px] rounded-lg font-inter text-slate-300 placeholder-slate-600 focus:outline-none transition-all w-48"
                            style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);"
                            onfocus="this.style.borderColor='rgba(129,140,248,0.5)';this.style.boxShadow='0 0 0 3px rgba(129,140,248,0.1)';this.style.width='200px';"
                            onblur="this.style.borderColor='rgba(255,255,255,0.08)';this.style.boxShadow='none';this.style.width='192px';">
                        <svg class="absolute left-2.5 top-2 w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <!-- Live badge -->
                    <div class="hidden sm:flex items-center gap-1.5 px-2.5 py-1 rounded-full shrink-0"
                         style="background:rgba(52,211,153,0.08);border:1px solid rgba(52,211,153,0.22);">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                        <span class="text-emerald-400 text-[11px] font-bold font-grotesk tracking-widest">LIVE</span>
                    </div>

                    <!-- Subscribe CTA -->
                    <a href="#newsletter" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-[12px] font-grotesk font-semibold text-white transition-all shrink-0"
                       style="background:linear-gradient(135deg,#818cf8,#22d3ee);box-shadow:0 0 16px rgba(129,140,248,0.35);"
                       onmouseover="this.style.boxShadow='0 0 24px rgba(129,140,248,0.55)'"
                       onmouseout="this.style.boxShadow='0 0 16px rgba(129,140,248,0.35)'">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                        Subscribe
                    </a>

                    <!-- Mobile hamburger -->
                    <button id="mob-btn" class="lg:hidden p-1.5 rounded-md text-slate-400 hover:text-white hover:bg-white/5 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mob-menu" class="hidden lg:hidden" style="border-top:1px solid rgba(255,255,255,0.06);background:rgba(2,9,20,0.97);">
            <div class="max-w-7xl mx-auto px-4 py-3 grid grid-cols-2 gap-1">
                @foreach(['Home'=>route('home'),'AI News'=>route('category','AI News'),'AI Models'=>route('category','AI Models'),'Research'=>route('category','Research'),'Products'=>route('category','Products'),'Tools'=>route('category','Tools')] as $label=>$href)
                <a href="{{ $href }}" class="px-3 py-2 rounded-md text-sm text-slate-400 hover:text-white hover:bg-white/5 transition-all font-inter">{{ $label }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <!-- Breaking news ticker -->
    <div class="flex items-center overflow-hidden shrink-0" style="background:linear-gradient(90deg,rgba(185,28,28,0.95),rgba(153,27,27,0.88));height:26px;">
        <div class="flex items-center gap-2 px-3 shrink-0" style="background:rgba(0,0,0,0.3);height:100%;">
            <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
            <span class="text-white text-[10px] font-black font-grotesk tracking-[0.15em] uppercase">Breaking</span>
        </div>
        <div class="overflow-hidden flex-1 relative">
            <div class="ticker-track text-[11px] text-red-100 font-inter">
                @php
                $headlines = [
                    "OpenAI GPT-5 launches with 2M token context window",
                    "Google DeepMind Gemini Ultra 2.0 surpasses human expert reasoning",
                    "Meta open-sources Llama 4 — 405B parameters, free commercial use",
                    "EU AI Act now in full force — 12-month compliance window",
                    "Sam Altman: AGI timeline shifted earlier than expected",
                    "Cursor IDE passes 1M users — AI-native coding goes mainstream",
                    "Stanford AI detects Alzheimer's 10 years before symptoms appear",
                    "Apple Intelligence expands to 50 countries with real-time translation",
                    "Adobe Firefly 3.0 generates broadcast-quality 4K video from text",
                    "GitHub Copilot Workspace: AI writes, tests, and reviews code end-to-end",
                ];
                $ticker = implode(' &nbsp;&nbsp;|&nbsp;&nbsp; ', $headlines);
                @endphp
                {!! $ticker !!} &nbsp;&nbsp;|&nbsp;&nbsp; {!! $ticker !!}
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main>@yield('content')</main>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{-- FOOTER                                                       --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<footer class="mt-20 relative overflow-hidden" style="background:#04091a;border-top:1px solid rgba(129,140,248,0.12);">

    <!-- Background accent -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[200px] pointer-events-none"
         style="background:radial-gradient(ellipse at center,rgba(129,140,248,0.06),transparent 70%);"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-8 relative z-10">

        <!-- 4-col grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            <!-- Col 1: Brand + mini newsletter -->
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 mb-4">
                    <svg width="34" height="34" viewBox="0 0 36 36" fill="none">
                        <defs>
                            <linearGradient id="fHexGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#22d3ee"/><stop offset="50%" stop-color="#818cf8"/><stop offset="100%" stop-color="#f472b6"/>
                            </linearGradient>
                        </defs>
                        <polygon points="18,2 32,10 32,26 18,34 4,26 4,10" stroke="url(#fHexGrad)" stroke-width="1.5" fill="rgba(129,140,248,0.08)"/>
                        <path d="M20 9 L13 19 H18 L16 27 L23 17 H18 Z" fill="white" opacity="0.9"/>
                    </svg>
                    <div class="leading-none">
                        <span class="font-grotesk font-bold text-lg"><span class="grad-text">AI</span><span class="text-white"> Now</span></span>
                        <div class="text-[9px] text-slate-600 font-inter uppercase tracking-widest mt-0.5">Intelligence Feed</div>
                    </div>
                </a>
                <p class="text-slate-500 text-sm font-inter leading-relaxed mb-4">The fastest feed in artificial intelligence. Real-time coverage of models, research, and the tools shaping the future.</p>
                <div class="flex items-center gap-1.5 mb-5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse-dot"></span>
                    <span class="text-emerald-500 text-xs font-grotesk font-medium">Updated every 6 hours</span>
                </div>

                <!-- Mini newsletter signup -->
                <div id="newsletter" class="p-4 rounded-xl" style="background:rgba(129,140,248,0.06);border:1px solid rgba(129,140,248,0.15);">
                    <p class="text-xs font-grotesk font-semibold text-slate-300 mb-2.5">Get the daily digest</p>
                    <div class="flex gap-2">
                        <input type="email" placeholder="your@email.com"
                            class="flex-1 px-3 py-2 text-xs rounded-lg font-inter text-slate-300 placeholder-slate-600 focus:outline-none min-w-0"
                            style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.09);">
                        <button class="px-3 py-2 rounded-lg text-xs font-grotesk font-bold text-white shrink-0 transition-all"
                                style="background:linear-gradient(135deg,#818cf8,#22d3ee);"
                                onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">Go</button>
                    </div>
                    <p class="text-[10px] text-slate-600 font-inter mt-1.5">No spam. Unsubscribe any time.</p>
                </div>
            </div>

            <!-- Col 2: Topics -->
            <div>
                <h4 class="font-grotesk font-bold text-[11px] uppercase tracking-widest text-slate-500 mb-5">Topics</h4>
                <div class="space-y-2.5">
                    @foreach(['AI News'=>'#22d3ee','AI Models'=>'#a78bfa','Research'=>'#34d399','Products'=>'#fb923c','Tools'=>'#f472b6'] as $cat=>$clr)
                    <a href="{{ route('category', $cat) }}" class="flex items-center gap-2.5 group">
                        <span class="w-2 h-2 rounded-full shrink-0 transition-transform group-hover:scale-125" style="background:{{ $clr }};box-shadow:0 0 6px {{ $clr }}88;"></span>
                        <span class="text-sm text-slate-400 font-inter group-hover:text-white transition-colors">{{ $cat }}</span>
                    </a>
                    @endforeach
                </div>

                <hr class="neon-line my-5">

                <h4 class="font-grotesk font-bold text-[11px] uppercase tracking-widest text-slate-500 mb-4">Trending Tags</h4>
                <div class="flex flex-wrap gap-1.5">
                    @foreach(['GPT-5','Gemini','Llama','Claude','Safety','AGI','Open Source','Regulation'] as $tag)
                    <span class="px-2 py-0.5 rounded-md text-[11px] font-inter text-slate-500 cursor-default hover:text-slate-300 transition-colors"
                          style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);">#{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            <!-- Col 3: Company -->
            <div>
                <h4 class="font-grotesk font-bold text-[11px] uppercase tracking-widest text-slate-500 mb-5">Company</h4>
                <div class="space-y-2.5">
                    @foreach(['About AI Now','Advertise With Us','Contact Us','Privacy Policy','Terms of Service','Cookie Settings'] as $link)
                    <a href="#" class="block text-sm text-slate-400 font-inter hover:text-white transition-colors">{{ $link }}</a>
                    @endforeach
                </div>

                <hr class="neon-line my-5">

                <h4 class="font-grotesk font-bold text-[11px] uppercase tracking-widest text-slate-500 mb-4">Powered By</h4>
                <div class="flex flex-wrap gap-1.5">
                    @foreach(['Laravel 11','Filament v3','NewsAPI','Tailwind','MySQL'] as $t)
                    <span class="px-2 py-0.5 rounded text-[11px] font-grotesk text-slate-500 border"
                          style="background:rgba(255,255,255,0.03);border-color:rgba(255,255,255,0.07);">{{ $t }}</span>
                    @endforeach
                </div>
            </div>

            <!-- Col 4: Follow + stats -->
            <div>
                <h4 class="font-grotesk font-bold text-[11px] uppercase tracking-widest text-slate-500 mb-5">Follow</h4>
                <div class="grid grid-cols-2 gap-2 mb-6">
                    @php
                    $socials = [
                        ['Twitter / X', '#1DA1F2', 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.74l7.73-8.835L1.254 2.25H8.08l4.26 5.632 5.903-5.632zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
                        ['LinkedIn',   '#0A66C2', 'M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2zm2-5a2 2 0 110 4 2 2 0 010-4z'],
                        ['RSS Feed',   '#F26522', 'M6.18 15.64a2.18 2.18 0 012.18 2.18C8.36 19.01 7.38 20 6.18 20C4.98 20 4 19.01 4 17.82a2.18 2.18 0 012.18-2.18M4 4.44A15.56 15.56 0 0119.56 20h-2.83A12.73 12.73 0 004 7.27V4.44m0 5.66a9.9 9.9 0 019.9 9.9h-2.83A7.07 7.07 0 004 12.93V10.1z'],
                        ['GitHub',     '#6e5494', 'M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z'],
                    ];
                    @endphp
                    @foreach($socials as [$name, $color, $path])
                    <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg text-xs font-inter text-slate-400 hover:text-white transition-all"
                       style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.07);"
                       onmouseover="this.style.borderColor='{{ $color }}55';this.style.background='{{ $color }}12';"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.07)';this.style.background='rgba(255,255,255,0.04)';">
                        <svg class="w-3.5 h-3.5 shrink-0" style="fill:{{ $color }}" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
                        {{ $name }}
                    </a>
                    @endforeach
                </div>

                <!-- Trust stats -->
                <div class="p-4 rounded-xl space-y-3" style="background:rgba(34,211,238,0.04);border:1px solid rgba(34,211,238,0.12);">
                    @foreach([['20+','Articles Published'],['5','AI Categories'],['6h','Update Cycle'],['50+','News Sources']] as [$n,$l])
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-slate-500 font-inter">{{ $l }}</span>
                        <span class="text-xs font-grotesk font-bold text-cyan-400">{{ $n }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Neon divider -->
        <hr class="neon-line mb-6">

        <!-- Bottom bar -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-slate-600 text-xs font-inter">&copy; {{ date('Y') }} AI Now. All rights reserved.</p>
            <div class="flex items-center gap-4 text-slate-600 text-xs font-inter">
                <span>Built with <a href="https://laravel.com" class="text-slate-500 hover:text-indigo-400 transition-colors">Laravel</a> &amp; NewsAPI</span>
                <span class="text-slate-700">·</span>
                <span class="flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full animate-pulse" style="background:linear-gradient(90deg,#22d3ee,#818cf8);"></span>
                    Made for the AI community
                </span>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script>
    // Mobile menu toggle
    document.getElementById('mob-btn')?.addEventListener('click', () => {
        document.getElementById('mob-menu')?.classList.toggle('hidden');
    });

    // Reading progress bar
    window.addEventListener('scroll', () => {
        const el = document.getElementById('read-progress');
        if (!el) return;
        const article = document.querySelector('article');
        if (!article) return;
        const scrollTop = window.scrollY;
        const docHeight = article.offsetHeight;
        const winHeight = window.innerHeight;
        const scrolled  = Math.min(100, (scrollTop / (docHeight - winHeight + article.offsetTop)) * 100);
        el.style.width = Math.max(0, scrolled) + '%';
    });
</script>
@stack('scripts')
</body>
</html>
