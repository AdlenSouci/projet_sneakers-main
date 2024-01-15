<nav class="navbar navbar-expand-lg navbar-light bg-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                @if(Request::url() !== url('/shop'))
                    <li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
                @endif
                @if(Request::url() !== url('/about'))
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                @endif
                @if(Request::url() !== url('/contact'))
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                @endif
                @if(Request::url() !== url('/basket'))
                    <li class="nav-item"><a class="nav-link" href="/basket">Basket</a></li>
                @endif
                @if(Request::url() !== url('/login'))
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endif
                @if(Request::url() !== url('/register'))
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                @endif
            </ul>
            @if(Request::url() == url('/shop'))
            <form class="d-flex ms-auto" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Submit</button>
            </form>
            @endif
        </div>
    </div>
</nav>
