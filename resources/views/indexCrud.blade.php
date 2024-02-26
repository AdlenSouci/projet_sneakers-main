<!-- Affiche la liste des articles -->
@foreach($articles as $article)
    <div>
        <h2>{{ $article->title }}</h2>
        <!-- Liens pour afficher, éditer ou supprimer l'article -->
        <a href="{{ route('articles.showCrudA', $article->id) }}">Voir</a>

        <a href="{{ route('articles.edit', $article->id) }}">Modifier</a>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </div>
@endforeach
