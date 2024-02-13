<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite(['resources/css/styles.css' , 'resources/css/accueil.css'])

</head>

<body>
   
    @include('layouts.navigation')

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset($article['img']) }}" alt="..." /></div>
                <div class="col-md-6">

                    <h1 class="display-5 fw-bolder"><?= $article['modele'] ?></h1>
                    <div class="fs-5 mb-5">
                        <h5 class="fw-bolder"><?= $article['prix_public'] ?></h5>
                        <span><?= $article['prix'] ?></span>
                    </div>
                    <p class="lead"><?= $article['description'] ?></p>
                    <div class="d-flex">

                        <label for="pointure">Sélectionnez une pointure :</label>

                        <select id="pointure" name="pointure">
                            <option value="">Choisissez une pointure</option>
                            @foreach($article->tailles as $taille)
                            <option value="{{ $taille->taille }}">{{ $taille->taille }}</option>
                            @endforeach
                        </select>


                        <button class="btn btn-outline-dark mt-auto ajouter_au_panier" data-article-id="{{ $article['id'] }}">Passe a la caisse 
                        </button> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                       
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                      
                        <div class="card-body p-4">
                            <div class="text-center">
                                
                                <h5 class="fw-bolder">Fancy Product</h5>
                               
                                $40.00 - $80.00
                            </div>
                        </div>
                        
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                    
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                     
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                     
                        <div class="card-body p-4">
                            <div class="text-center">
                               
                                <h5 class="fw-bolder">Special Item</h5>
                               
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                            
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                     
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                      
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                     
                        <img class="card-img-top" src="{{ asset($article['img']) }}" alt="..." />
                       
                        <div class="card-body p-4">
                            <div class="text-center">
                               
                                <h5 class="fw-bolder">Sale Item</h5>
                               
                                <span class="text-muted text-decoration-line-through">$50.00</span>
                                $25.00
                            </div>
                        </div>
                      
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        
                        <img class="card-img-top" src="{{ asset($article['img']) }}" alt="..." />
                       
                        <div class="card-body p-4">
                            <div class="text-center">
                              
                                <h5 class="fw-bolder">Popular Item</h5>
                        
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                               
                                $40.00
                            </div>
                        </div>
                    
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script>
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('ajouter_au_panier')) {
                // Récupérez l'ID de l'article à partir de l'attribut data-article-id
                var articleId = event.target.getAttribute('data-article-id');

                // Faites une requête Ajax pour ajouter l'article au panier
                $.ajax({
                    url: '{{ route("ajouter_au_panier") }}',
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