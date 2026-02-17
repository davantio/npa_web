<div class="container footer-top">
    <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="sitename">{{ $companies->name }}</span>
            </a>
            <div class="footer-contact pt-3">
                <p>{{ $companies->address }}</p>
                <p class="mt-3"><strong>Phone:</strong> <span>+62 {{ $companies->phone }}</span></p>
                <p><strong>Email:</strong> <span>{{ $companies->email }}</span></p>
            </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Products</h4>
            <ul>
                @foreach ($productCategories as $category)
                    <li><a href="#">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

    </div>
</div>

<div class="container copyright text-center mt-4">
    <p>© <strong class="px-1 sitename">{{ $companies->name }}</strong>
    </p>
</div>
