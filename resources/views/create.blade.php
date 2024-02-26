<!-- Formulaire pour créer un nouvel article -->
<form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Titre">
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Créer</button>
</form>