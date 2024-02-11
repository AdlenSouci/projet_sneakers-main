<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite(['resources/css/accueil.css'])
    <title>Shop</title>

</head>

<body>

@include('layouts.navigation')



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
                                    <a class="btn btn-outline-dark mt-auto toggleDescription" href="{{ route('article', $article['id']) }}">View options</a>
                                    <br>
                                    <!-- Ajoutez les attributs data-bs-toggle et data-bs-target -->
                                    <button class="btn btn-outline-dark mt-auto addToBasket" data-article-id="{{ $article['id'] }}">Add to basket</button>


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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('addToBasket')) {
                // Récupérez l'ID de l'article à partir de l'attribut data-article-id
                var articleId = event.target.getAttribute('data-article-id');

                // Faites une requête Ajax pour ajouter l'article au panier
                $.ajax({
                    url: '{{ route("addToBasket") }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'article_id': articleId
                    },
                    success: function(response) {
                        alert(response.message); // Vous pouvez personnaliser cela en fonction de vos besoins
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>

</body>

</html>