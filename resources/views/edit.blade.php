<!-- Formulaire pour éditer un article existant -->
<form action="{{ route('articles.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $article->title }}">
    <textarea name="description">{{ $article->description }}</textarea>
    <button type="submit">Modifier</button>
</form>
