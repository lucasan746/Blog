@extends('layouts.app')

@section('content')
<div class="item mb-5 m-2">
    <h1>Panel de administrador</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($pub as $publicacion)
            <tr>
                <th scope="row">{{$publicacion->id}}</th>
                <td>{{$publicacion->titulo}}</td>
                <td>{{$publicacion->user->name}}</td>
                <td>{{$publicacion->updated_at}}</td>
                <td><a href="/post/{{$publicacion->id}}" class="btn btn-light" style="color:black">Ver</a></td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
{{ $pub->links() }}
@endsection
