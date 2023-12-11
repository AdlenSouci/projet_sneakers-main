<!DOCTYPE html>
<html lang="fr">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />



    <title>About us</title>

</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">About us</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="main-text">
                    <h1>Welcome to My Sneakers</h1>
                    <p class="lead">
                        My Sneakers is the online sneaker store that offers a wide selection of models, brands, and prices. Whether you're a seasoned collector or a casual sneaker enthusiast, you'll find the shoes that suit you on our site.
                    </p>
                    <p class="lead">
                        We offer a diverse range of sneakers, from classic models to exclusive ones. You'll find sneakers from all major brands, such as Nike, Adidas, Jordan, Converse, Puma, etc. You can also explore sneakers in different categories, including running, basketball, tennis, and more.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Logo Section -->
                <div class="logo-section text-end mt-3">
                    <img src="{{ asset('img/logo.png') }}" alt="My Sneakers Logo" class="logo-img">
                </div>
            </div>
        </div>

    </div>


    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>