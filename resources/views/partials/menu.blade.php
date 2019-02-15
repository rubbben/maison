<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1" href="#">La Maison</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{url('/')}}">Accueil</a>
      <a class="nav-item nav-link" href="{{url('soldes')}}">Soldes</a>
      @forelse($categories as $id => $title)
        <a class="nav-item nav-link" href="{{url('category', $id)}}">{{$title}}</a>
          @empty
        <li>Aucune Catégorie pour l'instant</li>
      @endforelse
    </div>
  </div>
</nav>
</nav>
