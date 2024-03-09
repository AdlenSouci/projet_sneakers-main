<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @vite(['resources/css/basket.css'])
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>My Sneakers</title>

    <style>

    </style>
</head>

<body>

    @include('layouts.navigation')





    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted">{{ count($cartItems) }} items</h6>
                                        </div>
                                        <hr class="my-4">


                                        @foreach ($cartItems as $item)
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="{{ $item['image'] }}" class="img-fluid rounded-3" alt="{{ $item['name'] }}">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">article</h6>
                                                <h6 class="text-black mb-0">{{ $item['name'] }}</h6>
                                            </div>

                                            <div class="col-md-6 col-lg-5 col-xl-5 d-flex justify-content-end align-items-center">
                                                <label class="custom-label rounded" for="pointure">Sélectionnez une pointure :</label>
                                                <select id="pointure" name="pointure" class=" custom-input rounded">
                                                    <option value="">Choisissez une pointure</option>
                                                    @foreach($item['tailles'] as $taille)
                                                    <option value="{{ $taille }}">{{ $taille }}</option>
                                                    @endforeach
                                                </select>
                                                <input class="form-control form-control-sm quantity-input  rounded" type="number" min="0" name="quantity" value="{{ $item['quantity'] }}" data-item-id="{{ $item['id'] }}" data-item-price="{{ $item['price'] }}" onchange="changerQuantiter(this)" />

                                            </div>

                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0 item-price" data-item-price="{{ $item['price'] }}">€ {{ $item['price'] * $item['quantity'] }}</h6>
                                                <button class="btn btn-danger" onclick="viderArticlePanier(this)" data-article-id="{{ $item['id'] }}">Supprimer</button>


                                            </div>

                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        @endforeach

                                        <div class="pt-5">
                                            <button class="btn btn-danger" onclick="viderPanier()">Vider le panier</button>
                                            <h6 class="mb-0"><a href="/shop" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">



                                            <h5 class="text-uppercase mb-3">Shipping</h5>





                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Total price</h5>
                                                <h5 id="totalPrice">€ {{ $totalPrice }} </h5>
                                            </div>

                                            @if(auth()->check())
                                            <form action="" method="post">
                                                @csrf
                                                <button id="passCommandButton" class="btn btn-dark btn-block btn-lg">Passer la commande</button>
                                            </form>
                                            @else
                                            <p>Connectez-vous pour passer une commande.</p>
                                            @endif



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <div id="successMessage" class="alert alert-success" style="display: none;">
        La commande a été passée avec succès !
    </div>



    <script>
        function viderPanier() {
            fetch('/vider-panier', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);

                    // Rechargez la page côté client
                    location.reload();
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression du panier :', error);
                });

        }
    </script>


    <script>
        function viderArticlePanier(button) {
            var articleId = button.getAttribute('data-article-id');

            fetch('{{ route("vider-article-panier") }}', { // Utilisez la fonction route() pour générer l'URL de la route
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        article_id: articleId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);

                    // Rechargez la page côté client si la suppression a réussi
                    if (!data.error) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la suppression de l\'article :', error);
                });
        }
    </script>





    <script>
        function changerQuantiter(input) {
            // Obtenez les valeurs nécessaires
            var newQuantity = parseInt(input.value);
            var pricePerItem = parseFloat(input.getAttribute("data-item-price"));

            // Vérifiez si la nouvelle quantité est un nombre valide
            if (!isNaN(newQuantity) && newQuantity >= 0) {
                // Recherchez l'élément avec la classe "item-price" dans le même parent que l'input
                var itemPriceElement = input.closest('.row').querySelector(".item-price");


                if (itemPriceElement) {
                    // Calculez le nouveau total en multipliant la quantité par le prix unitaire
                    var newTotal = newQuantity * pricePerItem;

                    // Mettez à jour l'affichage du prix
                    itemPriceElement.textContent = "€ " + newTotal.toFixed(2);

                    // Mettez à jour l'attribut data-item-price avec le prix unitaire
                    input.setAttribute("data-item-price", pricePerItem.toFixed(2));

                    // Mettez à jour le prix total
                    calculerPrixTotal();
                }
            } else {
                // Remettez la quantité à 0 si la nouvelle quantité n'est pas valide
                input.value = 0;
            }
        }

        function calculerPrixTotal() {
            // Sélectionnez tous les éléments avec la classe "item-price" et additionnez les montants
            var itemPrices = document.querySelectorAll('.item-price');
            var totalPrice = 0;

            itemPrices.forEach(function(itemPrice) {
                totalPrice += parseFloat(itemPrice.textContent.replace('€ ', ''));
            });

            // Mettez à jour l'élément affichant le prix total
            document.querySelector('#totalPrice').textContent = "€ " + totalPrice.toFixed(2);
        }
    </script>


    <script>
        function checkAuthentication() {
            // Vérifiez si l'utilisateur est connecté en consultant la barre de navigation
            var userLoggedIn = document.getElementById('userLoggedIn'); // suppose que vous avez un élément dans votre barre de navigation avec l'ID 'userLoggedIn' qui indique si l'utilisateur est connecté ou non

            if (userLoggedIn) {
                // Si l'utilisateur est connecté, passez la commande
                placeOrder();
            } else {
                // Si l'utilisateur n'est pas connecté, affichez un message l'invitant à se connecter
                alert("Veuillez vous connecter pour passer une commande.");
            }
        }
    </script>

    <script>
        // Fonction pour afficher un message de commande passée
        function showOrderConfirmation() {
            // Afficher un message ou un pop-up
            alert("Commande passée avec succès !");


        }

        // Ajouter un événement "click" au bouton "Passer la commande"
        var passCommandButton = document.querySelector("#passCommandButton");
        if (passCommandButton) {
            passCommandButton.addEventListener("click", function(event) {
                // Empêcher le comportement par défaut du formulaire (envoi)
                event.preventDefault();
                // Appeler la fonction pour afficher le message de commande passée
                //showOrderConfirmation();
                //viderPanier();

            });
        }
    </script>

    <script>
        document.getElementById('commandForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche le formulaire de se soumettre normalement
            this.submit(); // Soumettez le formulaire
        });
    </script>



</body>

</html>