<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('books.index') }}" class="navbar-brand">Book Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-lg-auto">
                <a href="{{ route('books.create') }}" class="btn btn-sm btn-info col-lg-12 col-sm-3 ">
                    <i class="bi bi-plus-circle"></i>
                    <span class="fw-bold fs-6">New book</span>
                </a>
            </ul>
        </div>
    </div>
</nav>
