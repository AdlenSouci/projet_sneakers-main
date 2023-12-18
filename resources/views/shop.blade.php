
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <title>Shop</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </nav>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php foreach ($articlesData as $article) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image -->
                            <img class="card-img-top" src="{{ asset($article['img']) }}" alt="..." />
                            <!-- Product details -->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $article['modele'] ?></h5>
                                    <!-- Add other details as needed -->

                                </div>
                            </div>
                            <!-- Product actions -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $article['prix_public'] ?></h5>
                                    <a class="btn btn-outline-dark mt-auto" href="#" id="toggleDescription">View options</a>

                                    <!-- Utilisez la classe collapse pour masquer la section par défaut -->
                                    <div id="descriptionCollapse" class="collapse">
                                        <section id="description"><?= $article['description'] ?></section>
                                    </div>

                                    <!-- Ajoutez les attributs data-bs-toggle et data-bs-target -->
                                   
                                    <a class="btn btn-outline-dark mt-auto" href="/basket" id="toggleDescription">Add to basket</a>
                                </div>
                            </div>





                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My sneakers 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>




    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Ajoutez Bootstrap JS avant ce script -->
    <script>
        document.getElementById('toggleDescription').addEventListener('click', function() {
            // Sélectionnez la section de description
            var descriptionSection = document.getElementById('descriptionCollapse');

            // Inversez la visibilité de la section
            if (descriptionSection.classList.contains('show')) {
                descriptionSection.classList.remove('show');
            } else {
                descriptionSection.classList.add('show');
            }
        });
    </script>

</body>

</html>