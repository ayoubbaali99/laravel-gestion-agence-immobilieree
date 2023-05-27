<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <title>@yield('title') | Administration</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Agence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
        $route = request()->route()->getName();
        @endphp

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('admin.property.index')}}" @class(['nav-link','active'=>str_contains($route,'property.')])>Gérer les biens</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.option.index')}}" @class(['nav-link','active'=>str_contains($route,'option.')])>Gérer les options</a>
                </li>
            </ul>
            <div class="ms-auto">
                @auth
                  <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="nav-link">
                                Se déconnecter
                            </button>
                        </form>
                    </li>
                  </ul>
                  @endauth
            </div>
        </div>
        </div>
    </nav>

<div class="container mt-5">


@include('shared.flash')


@yield('content')

</div>

<script>
    new TomSelect('select[multiple]',{plugins:{remove_button:{title:'Supprimer'}}})
</script>

</body>
</html>
