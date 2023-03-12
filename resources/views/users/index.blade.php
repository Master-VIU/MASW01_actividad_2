<html>
@include('../layouts.head')

<body>   

    <div class="container-table">
        <div>
            <h1>Usuarios registrados<img src="{{ asset('img/icon.png') }}" width="120"></h1>
        </div>
        <table class="table">
            @if ($data != null)
                <thead>
                    <tr>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Dni</th>
                        <th scope="col">País</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                @foreach ($data as $user)
                    <tbody>
                        <tr>
                            <td>{{ $user->name }} {{ $user->surnames }}</td>
                            <td>{{ $user->dni }}</td>
                            <td>{{ $user->country }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </a>                                
                            </td>
                        </tr>
                    </tbody>
                @endforeach
        </table>
    @else
        <p class="no-registro">No hay usuarios registrados.</p>
        @endif
    </div>


    @include('../layouts.footer')

</body>

</html>
