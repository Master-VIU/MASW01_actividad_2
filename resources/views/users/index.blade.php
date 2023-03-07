@include('../layouts.head')

<div class="container-table">

    @if (Session::has('success'))
        <div class="alert alert-success">
            <p class="">{{ Session::get('success') }} </p>
        </div>
    @elseif(Session::has('warning'))
        <div class="alert alert-warning">
            <p class="">{{ Session::get('warning') }} </p>
        </div>
    @endif
    <div>
        <h1>Usuarios registrados<img src="{{ asset('img/icon.png') }}" width="120"></h1>
        <a href="{{ route('users.create') }}">
            <button type="button" class="btn btn-primary">Nuevo</button>
        </a>
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
                            <a href="{{ route('users.edit', $user->user_id) }}">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </a>
                            <form method="post" action="{{ route('users.destroy', $user->user_id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
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
