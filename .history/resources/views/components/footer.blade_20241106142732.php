<!-- Pied de page-->
<footer class="py-3 bg-dark custom-footer">
    <div class="container">
        <div class="row">
            <div class="col-9 col-md-9">
                <p class="m-0 text-left text-white ">Copyright © My sneakers {{now()->format('Y') }}</p>
            </div>
            <div class="col-3 col-md-3">
                <nav class="navbar nav-custom ">
                    <ul class="nav flex-column ">
                        <li class="nav-item"><a class="nav-link " href="{{ Route('mentions') }}">Mentions légales</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ Route('cgu') }}">CGU</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/basket') }}">Panier</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">À propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</footer>