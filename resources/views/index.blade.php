<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    @vite(['resources/css/accueil.css'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>My Sneakers</title>

    <style>
        /* CSS personnalisé pour le carousel */
        .carousel {
            margin: auto;
            /* Centrer horizontalement */
            max-width: 500px;
            /* Largeur maximale du carousel */
        }

        .carousel-item img {
            max-height: 400px;
            /* Hauteur maximale des images du carousel */
            object-fit: cover;
            /* Assurez-vous que l'image remplit l'espace sans distorsion */
            width: 100%;
            /* Largeur maximale des images */
        }
    </style>
</head>

<body class="main-body">
    @include('layouts.navigation')




    <div class="container mt-5">
        <!-- Aligner à gauche -->
        <div class="card card-3d" style="max-width: 600px; max-height: 400px">
            <div class="card-body">
                <h5 class="card-title">Welcome to My Sneakers</h5>
                <p class="card-text lead">
                    My Sneakers is the online sneaker store that offers a wide selection of models, brands, and prices. Whether you're a seasoned collector or a casual sneaker enthusiast, you'll find the shoes that suit you on our site.
                </p>
                <p class="card-text">
                    We offer a diverse range of sneakers, from classic models to exclusive ones. You'll find sneakers from all major brands, such as Nike, Adidas, Jordan, Converse, Puma, etc. You can also explore sneakers in different categories, including running, basketball, tennis, and more.
                </p>
            </div>
        </div>
    </div>




    <br>


    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <br>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My sneakers</p>
        </div>
    </footer>
    <br>

    <!--Script Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>