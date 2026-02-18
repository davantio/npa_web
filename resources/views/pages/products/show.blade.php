@extends('layouts.app')

@section('title', 'Produk - Nusa Pratama Anugrah')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap');

    :root {
        --forest:   #1a3a2a;
        --moss:     #2c5f3f;
        --leaf:     #3d7a52;
        --sage:     #5a9e6f;
        --mist:     #e8f0eb;
        --cream:    #f5f0e8;
        --gold:     #b89a5a;
        --dark:     #0f2219;
        --text:     #2a3d30;
    }

    /* ─── RESET & BASE ──────────────────────────────── */
    .npa-wrap * { box-sizing: border-box; margin: 0; padding: 0; }

    .npa-wrap {
        font-family: 'DM Sans', sans-serif;
        background: var(--cream);
        color: var(--text);
        overflow-x: hidden;
    }

    /* ─── PAGE TITLE / BREADCRUMB ───────────────────── */
    .npa-hero {
        background: var(--forest);
        background-image:
            radial-gradient(ellipse 80% 60% at 70% 50%, rgba(61,122,82,.35) 0%, transparent 70%),
            repeating-linear-gradient(
                135deg,
                transparent 0px,
                transparent 40px,
                rgba(255,255,255,.02) 40px,
                rgba(255,255,255,.02) 41px
            );
        padding: 72px 0 52px;
        position: relative;
        overflow: hidden;
    }

    .npa-hero::before {
        content: '';
        position: absolute;
        right: -80px; top: -80px;
        width: 380px; height: 380px;
        border: 1px solid rgba(184,154,90,.18);
        border-radius: 50%;
    }
    .npa-hero::after {
        content: '';
        position: absolute;
        right: -30px; top: -30px;
        width: 240px; height: 240px;
        border: 1px solid rgba(184,154,90,.12);
        border-radius: 50%;
    }

    .npa-hero .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 32px;
    }

    .npa-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: rgba(255,255,255,.55);
        margin-bottom: 20px;
        letter-spacing: .04em;
    }
    .npa-breadcrumb a { color: var(--sage); text-decoration: none; transition: color .2s; }
    .npa-breadcrumb a:hover { color: var(--gold); }
    .npa-breadcrumb .sep { color: rgba(255,255,255,.25); }
    .npa-breadcrumb .current { color: rgba(255,255,255,.7); }

    .npa-hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 5vw, 3.2rem);
        color: #fff;
        font-weight: 700;
        line-height: 1.15;
        position: relative;
        z-index: 1;
    }
    .npa-hero-title em {
        font-style: italic;
        color: var(--gold);
    }

    /* ─── CATEGORY HEADER ───────────────────────────── */
    .npa-cat-header {
        max-width: 1200px;
        margin: 0 auto;
        padding: 64px 32px 0;
    }

    .npa-cat-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--forest);
        color: var(--gold);
        font-size: 11px;
        font-weight: 500;
        letter-spacing: .12em;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 2px;
        margin-bottom: 18px;
    }
    .npa-cat-badge .dot {
        width: 5px; height: 5px;
        background: var(--gold);
        border-radius: 50%;
    }

    .npa-cat-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.6rem, 3.5vw, 2.4rem);
        color: var(--forest);
        font-weight: 700;
        margin-bottom: 12px;
        line-height: 1.2;
    }

    .npa-cat-desc {
        font-size: 15px;
        color: #4a6755;
        line-height: 1.7;
        max-width: 560px;
    }

    .npa-divider {
        max-width: 1200px;
        margin: 32px auto 0;
        padding: 0 32px;
    }
    .npa-divider hr {
        border: none;
        border-top: 1px solid rgba(26,58,42,.12);
    }

    /* ─── PRODUCT GRID ──────────────────────────────── */
    .npa-products {
        max-width: 1200px;
        margin: 0 auto;
        padding: 48px 32px 96px;
    }

    .npa-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 28px;
    }

    /* ─── PRODUCT CARD ──────────────────────────────── */
    .npa-card {
        background: #fff;
        border: 1px solid rgba(26,58,42,.1);
        border-radius: 4px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: box-shadow .3s ease, transform .3s ease, border-color .3s;
        position: relative;
    }

    .npa-card:hover {
        box-shadow: 0 16px 48px rgba(26,58,42,.15);
        transform: translateY(-4px);
        border-color: var(--sage);
    }

    /* image area */
    .npa-card-img {
        position: relative;
        aspect-ratio: 4/3;
        overflow: hidden;
        background: var(--mist);
    }

    .npa-card-img img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .npa-card:hover .npa-card-img img {
        transform: scale(1.05);
    }

    /* overlay tag */
    .npa-card-tag {
        position: absolute;
        top: 14px; left: 14px;
        background: var(--forest);
        color: var(--gold);
        font-size: 10px;
        font-weight: 500;
        letter-spacing: .1em;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 2px;
        z-index: 2;
    }

    /* brochure badge */
    .npa-brochure-badge {
        position: absolute;
        top: 14px; right: 14px;
        background: var(--gold);
        color: var(--dark);
        border-radius: 50%;
        width: 40px; height: 40px;
        display: flex; align-items: center; justify-content: center;
        font-size: 17px;
        z-index: 2;
        opacity: 0;
        transform: scale(.7);
        transition: opacity .25s, transform .25s;
        cursor: pointer;
        text-decoration: none;
    }
    .npa-card:hover .npa-brochure-badge {
        opacity: 1;
        transform: scale(1);
    }

    /* body */
    .npa-card-body {
        padding: 20px 22px 22px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .npa-card-name {
        font-family: 'Playfair Display', serif;
        font-size: 16.5px;
        font-weight: 700;
        color: var(--forest);
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .npa-card-meta {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #5a7a65;
        margin-bottom: 14px;
    }
    .npa-card-meta svg {
        flex-shrink: 0;
        color: var(--sage);
    }
    .npa-card-weight {
        font-weight: 500;
        color: var(--text);
    }

    /* bottom bar */
    .npa-card-foot {
        margin-top: auto;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-top: 16px;
        border-top: 1px solid rgba(26,58,42,.08);
    }

    .npa-btn-brochure {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: transparent;
        border: 1.5px solid var(--forest);
        color: var(--forest);
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: .05em;
        padding: 8px 16px;
        border-radius: 2px;
        text-decoration: none;
        transition: background .22s, color .22s;
        cursor: pointer;
    }
    .npa-btn-brochure:hover {
        background: var(--forest);
        color: #fff;
    }

    .npa-btn-detail {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--forest);
        border: 1.5px solid var(--forest);
        color: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: .05em;
        padding: 8px 16px;
        border-radius: 2px;
        text-decoration: none;
        transition: background .22s, border-color .22s;
    }
    .npa-btn-detail:hover {
        background: var(--moss);
        border-color: var(--moss);
    }

    /* ─── EMPTY STATE ───────────────────────────────── */
    .npa-empty {
        text-align: center;
        padding: 80px 20px;
        color: #7a9a83;
    }
    .npa-empty svg { margin-bottom: 20px; opacity: .4; }
    .npa-empty p { font-size: 15px; }

    /* ─── ANIMATIONS ────────────────────────────────── */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .npa-card {
        animation: fadeUp .45s ease both;
    }
    .npa-card:nth-child(1) { animation-delay: .05s; }
    .npa-card:nth-child(2) { animation-delay: .12s; }
    .npa-card:nth-child(3) { animation-delay: .19s; }
    .npa-card:nth-child(4) { animation-delay: .26s; }
    .npa-card:nth-child(5) { animation-delay: .33s; }
    .npa-card:nth-child(6) { animation-delay: .40s; }

    /* ─── RESPONSIVE ────────────────────────────────── */
    @media (max-width: 640px) {
        .npa-grid { grid-template-columns: 1fr 1fr; gap: 16px; }
        .npa-hero { padding: 52px 0 36px; }
        .npa-products, .npa-cat-header { padding-left: 20px; padding-right: 20px; }
    }
    @media (max-width: 440px) {
        .npa-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="npa-wrap">

    <!-- ── HERO / PAGE TITLE ── -->
    <div class="npa-hero">
        <div class="container">
            <nav class="npa-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span class="sep">›</span>
                <span class="current">Produk</span>
            </nav>
            <h1 class="npa-hero-title">Katalog <em>Produk</em></h1>
        </div>
    </div>

    <!-- ── CATEGORY HEADER ── -->
    <div class="npa-cat-header">
        <div class="npa-cat-badge">
            <span class="dot"></span>
            Kategori
            <span class="dot"></span>
        </div>
        <h2 class="npa-cat-title">{{ $productCategories->name ?? 'Produk Unggulan' }}</h2>
        <p class="npa-cat-desc">
            {{ $productCategories->description ?? 'Temukan rangkaian produk berkualitas tinggi dari Nusa Pratama Anugrah, dirancang untuk memenuhi kebutuhan Anda.' }}
        </p>
    </div>
    <div class="npa-divider"><hr></div>

    <!-- ── PRODUCT GRID ── -->
    <div class="npa-products">
        @if(isset($products) && $products->count())
            <div class="npa-grid">
                @foreach($products as $product)
                <div class="npa-card">

                    <!-- Image -->
                    <div class="npa-card-img">
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            loading="lazy"
                        >
                        <span class="npa-card-tag">{{ $product->category->name ?? 'Produk' }}</span>

                        @if($product->datasheet_file)
                        <a href="{{ asset('storage/' . $product->datasheet_file) }}"
                           target="_blank"
                           class="npa-brochure-badge"
                           title="Unduh Brosur">
                            ⬇
                        </a>
                        @endif
                    </div>

                    <!-- Body -->
                    <div class="npa-card-body">
                        <h3 class="npa-card-name">{{ $product->name }}</h3>

                        <!-- Weight -->
                        <div class="npa-card-meta">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                            </svg>
                            Netto:&nbsp;<span class="npa-card-weight">
                                {{ $product->packaging ? $product->packaging  : 'Hubungi kami' }}
                            </span>
                        </div>

                        <!-- Footer actions -->
                        {{-- <div class="npa-card-foot">
                            @if($product->datasheet_file)
                            <a href="{{ asset('storage/' . $product->datasheet_file) }}"
                               target="_blank"
                               class="npa-btn-brochure">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
                                </svg>
                                Brosur
                            </a>
                            @endif
                            <a href="{{ route('products.show', $product->id) }}"
                               class="npa-btn-detail">
                                Detail
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                    <polyline points="12 5 19 12 12 19"/>
                                </svg>
                            </a>
                        </div> --}}
                    </div>

                </div><!-- /npa-card -->
                @endforeach
            </div><!-- /npa-grid -->

            <!-- Pagination -->
            @if(method_exists($products, 'links'))
            <div style="margin-top: 48px; display:flex; justify-content:center;">
                {{ $products->links() }}
            </div>
            @endif

        @else
            <!-- Empty state -->
            <div class="npa-empty">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none"
                     stroke="#2c5f3f" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2"/>
                    <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                </svg>
                <p>Belum ada produk dalam kategori ini.</p>
            </div>
        @endif
    </div>

</div><!-- /npa-wrap -->

@endsection

@section('scripts')
{{-- Tambahkan script tambahan di sini jika diperlukan --}}
@endsection