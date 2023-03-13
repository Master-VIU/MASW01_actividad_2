@if ($errors->any())
<div class="alert alert-danger">
    <strong>Por favor corregir los errores:</strong>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
