<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>SuperPc : : Usuarios</title>
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}">


    @if (Session::has('success'))
        <div class="alert alert-success">
            <p class="">{{ Session::get('success') }} </p>
        </div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger">
            <p class="">{{ Session::get('danger') }} </p>
        </div>
    @endif
</head>

@auth
    <nav class="logout">
        <form action="{{ url('users/logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-secondary" type="submit"> Cerrar sesión </button>
        </form>
    </nav>

@endauth
