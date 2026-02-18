<div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('storage/' . \App\Models\Company::first()->logo) }}" alt="" class="img-fluid">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        {{-- <h1 class="sitename">BizPage</h1> --}}
    </a>

    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="/#hero" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="/#about">About</a></li>
            <li class="dropdown"><a href="/#features"><span>Products</span> <i
                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    @foreach (\App\Models\ProductCategory::where('is_visible', true)->get() as $category)
                        <li><a href="{{ route('product.show', $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="/#clients">Partners</a></li>
            <li><a href="/#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

</div>
