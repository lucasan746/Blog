@extends('layouts.app')

@section('content')
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Panel de administrador</h4>
    <hr>
    <p class="mb-0">Publicaciones sin revisar :</p>
  </div>
<div class="item mb-5 m-2">
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
