<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Artconnect</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.highlights') }}">Highlights <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Collections
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Wardrobe</a>
          <a class="dropdown-item" href="#">Fragile</a>
          <a class="dropdown-item" href="#">Other item</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Artworks</a>
      </li>
    </ul>
    <form method="POST" action="{{ route('admin.logout') }}" accept-charset="UTF-8" name="logout-form" id="logout-form">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-light">Log Out</button>
</form>

  </div>
</nav>
</div>