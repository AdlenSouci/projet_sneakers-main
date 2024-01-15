<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>My Sneakers</title>
</head>

<body>

    @include('components.navbar')





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
                                            <input class="form-control form-control-sm quantity-input" type="number" min="0" name="quantity" value="{{ $item['quantity'] }}" data-item-id="{{ $item['id'] }}" data-item-price="{{ $item['price'] }}" onchange="updateItemQuantity(this)" />


                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0 item-price" data-item-price="{{ $item['price'] }}">€ {{ $item['price'] * $item['quantity'] }}</h6>
                                                <button class="btn btn-danger" onclick="clearBasketArticle(this)" data-article-id="{{ $item['id'] }}">Supprimer</button>


                                            </div>

                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        @endforeach

                                        <div class="pt-5">
                                            <button class="btn btn-danger" onclick="clearBasket()">Vider le panier</button>
                                            <h6 class="mb-0"><a href="/" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">

                                            <!--     <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">items 3</h5>
                                                <h5>€ 132.00</h5>
                                            </div>-->

                                            <h5 class="text-uppercase mb-3">Shipping</h5>

                                            <div class="mb-4 pb-2">
                                                <select class="select">
                                                    <option value="1">Standard-Delivery- €5.00</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    <option value="4">Four</option>
                                                </select>
                                            </div>

                                            <h5 class="text-uppercase mb-3">Give code</h5>

                                            <div class="mb-5">
                                                <div class="form-outline">
                                                    <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplea2">Enter your code</label>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Total price</h5>
                                                <h5 id="totalPrice">€ {{ $totalPrice }} </h5>
                                            </div>

                                            <!-- Ajoutez ceci à l'endroit où vous avez le bouton "Register" -->
                                            <button class="btn btn-dark btn-block btn-lg" onclick="redirectToAuth()">Register</button>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <!--Script Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




    <script>
        function redirectToAuth() {
            // Stockez l'URL actuelle pour revenir après la connexion
            var returnUrl = window.location.href;

            // Utilisateur non connecté, redirigez vers la page d'authentification Breeze
            window.location.href = '{{ route("login") }}?redirect=' + encodeURIComponent(returnUrl);
        }


        function showOrderConfirmationPopup(email) {
            // Affichez un pop-up avec le message de commande confirmée et l'adresse e-mail
            alert('Commande confirmée pour l\'utilisateur avec l\'adresse e-mail : ' + email);
        }
    </script>


    <script>
        function clearBasket() {
            fetch('/clear-basket', {
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
        function clearBasketArticle(button) {
            var articleId = button.getAttribute('data-article-id');

            fetch('{{ route("clear-basket-article") }}', { // Utilisez la fonction route() pour générer l'URL de la route
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
        function updateItemQuantity(input) {
            // Obtenez les valeurs nécessaires
            var newQuantity = parseInt(input.value);
            var pricePerItem = parseFloat(input.getAttribute("data-item-price"));

            // Vérifiez si la nouvelle quantité est un nombre valide
            if (!isNaN(newQuantity) && newQuantity >= 0) {
                // Recherchez l'élément avec la classe "item-price" dans le même parent que l'input
                var itemPriceElement = input.closest('.row').querySelector(".item-price");

                // Assurez-vous que l'élément existe avant de mettre à jour le contenu
                if (itemPriceElement) {
                    // Calculez le nouveau total en multipliant la quantité par le prix unitaire
                    var newTotal = newQuantity * pricePerItem;

                    // Mettez à jour l'affichage du prix
                    itemPriceElement.textContent = "€ " + newTotal.toFixed(2);

                    // Mettez à jour l'attribut data-item-price avec le prix unitaire
                    input.setAttribute("data-item-price", pricePerItem.toFixed(2));

                    // Mettez à jour le prix total
                    updateTotalPrice();
                }
            } else {
                // Remettez la quantité à 0 si la nouvelle quantité n'est pas valide
                input.value = 0;
            }
        }

        function updateTotalPrice() {
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

    <!-- Ajoutez ceci à votre script JavaScript -->








</body>

</html>