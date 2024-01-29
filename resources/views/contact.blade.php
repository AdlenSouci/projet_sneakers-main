<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    @vite(['resources/css/contact.css' , 'resources/css/nav.css'])
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Contact</title>
</head>

<body>
@include('layouts.navigation')

    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">Formulaire de contact</h2>

            <form action="index.php" method="post" class="mt-4">
                <div class="mb-3">
                    <label for="nom" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="objet" class="form-label">Object</label>
                    <input type="text" class="form-control" id="objet" name="objet" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" required></textarea>
                </div>

                <input type="submit" value="Envoyer" class="btn btn-primary rounded-pill">
            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>