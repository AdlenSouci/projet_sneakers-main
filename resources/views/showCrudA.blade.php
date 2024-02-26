<!-- Affiche les détails de l'article -->
<h2>{{ $article->title }}</h2>
<p>{{ $article->description }}</p>
<!-- Lien pour revenir à la liste des articles -->
<a href="{{ route('articles.index') }}">Retour à la liste des articles</a>
