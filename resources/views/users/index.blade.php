@include('../layouts.head')

<div class="container-table">

    <h1>Listado de usuarios registrados<img src="{{ asset('img/icon.png') }}" width="120"></h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre completo</th>
                <th scope="col">Dni</th>
                <th scope="col">País</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        @foreach ($data as $item)
            <tbody>
                <tr>
                    <td>{{ $item->name }} {{ $item->surnames }}</td>
                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->country }}</td>
                    <td>
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>


@include('../layouts.footer')
