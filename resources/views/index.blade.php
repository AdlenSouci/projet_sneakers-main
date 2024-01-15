<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>My Sneakers</title>
</head>

<body>
@include('components.navbar')

    
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

    <div class="logo" style="position: absolute; top: 0; right: 0;">
        <img class="logo" src="{{ asset('img/logo.png') }}" alt="Logo" width="200" height="200">
    </div>


  


    <div class="container custom-container">
        <input type="radio" name="slider" id="item-1" checked>
        <input type="radio" name="slider" id="item-2">
        <input type="radio" name="slider" id="item-3">
        <div class="cards">
            <label class="card-cust" for="item-1" id="img-1">
                <img class=" custom-img" src="{{ asset('img/1.jpg') }}" alt="sneaker">
            </label>
            <label class="card-cust" for="item-2" id="img-2">
                <img class=" custom-img" src="{{ asset('img/2.jpg') }}" alt="sneaker">
            </label>
            <label class="card-cust" for="item-3" id="img-3">
                <img class=" custom-img" src="{{ asset('img/3.jpg') }}" alt="sneaker">
            </label>
        </div>

    </div>

    <!--Script Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>