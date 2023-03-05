@include('../layouts.head')

<h1>Listado de usuarios registrados</h1>
 
@foreach ($data as $item => $values)
    <ul>
        <li>{{$values}}</li>
        
    </ul>
@endforeach

@include('../layouts.footer')