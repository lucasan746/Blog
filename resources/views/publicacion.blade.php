@extends('layouts.app')

@section('content')
    @if ($pub)
        @if (Auth::user())
            @if (Auth::user()->rol==1)
                <div class="alert alert-warning" role="alert">
                    <p><span>Esta publicación aún no fue revisada</span></p>
                    <p><span>¿Aceptar esta publicación?</span></p>
                    <div class="">
                        <form class="m-2" action="/revision" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value='{{$pub->id}}'>
                            <button type="submit" class="btn btn-primary btn-sm active" role="button"
                                    aria-pressed="true">Aceptar
                            </button>
                        </form>
                    </div>
                    <div class="">
                        <form class="m-2" action="/borrar" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$pub->id}}">
                            <button onclick="return borrar()" type="submit" class="btn btn-secondary btn-sm active" role="button"
                                    aria-pressed="true">Borrar
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if($pub->user->id==Auth::user()->id)
                        <div class="d-flex flex-row flex-row-reverse">
                            <form class="m-1" action="/edit" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$pub->id}}">
                            <button href="/edit" type="buttom" class="btn btn-primary btn-sm">Editar</button>
                            </form>
                            <form class="m-1" action="/borrar" method="post" enctype="multipart/form-data"  id="borrar">
                                @csrf
                                <input type="hidden" name="id" value="{{$pub->id}}">
                                <button  type="submit" class="btn btn-secondary btn-sm" onclick="return borrar()">Borrar</button>
                            </form>
                        </div>

                    @endif
                    <hr>
                    <h1 class="mt-4">{{$pub->titulo}}</h1>
                    @if (Auth::user())
                      @if ($pub->user_id==Auth::user()->id)
                        <p class="lead">Por ti</a>
                      @else
                        <p class="lead">Por <a href="#">{{$pub->user->name}}</a>

                      @endif
                      @else
                      <p class="lead">Por <a href="#">{{$pub->user->name}}</a>

                    @endif
                    </p>
                    <hr>
                    <p>Publicado el {{$pub->updated_at}}</p>
                    <hr>
                    <img class="img-fluid rounded" src="/storage/{{$pub->img}}" width="700" height="300">
                    <hr>
                    <p class="lead">{{$pub->texto}}</p>
                    <hr>
                    <div class="card my-4">
                        <h5 class="card-header">Dejar un comentario:</h5>
                        <div class="card-body">
                            @if (Auth::user())
                                <form class="" action="/comentario" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="comentario" class="form-control" rows="3"></textarea>
                                    </div>
                                    <input type="hidden" name="publicacion_id" value="{{$pub->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <button type="submit" class="btn btn-primary">Comentar</button>
                                </form>
                            @else
                                <h4 class="alert alert-warning">Debe estar registrado para comentar</h4>
                            @endif
                        </div>
                    </div>

                    @foreach ($pub->comentario as $comentario)
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">{{$comentario->user->name}}</h5>
                                {{$comentario->comentario}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="card my-4">
                        <h5 class="card-header">Valoración</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3>Puntos:</h3>
                                </div>
                                <div class="col-lg-6">
                                    <h3>{{round($pub->puntaje_promedio,1)}}/10</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-4">
                        <h5 class="card-header">Puntuar Publicación</h5>
                        <div class="card-body">
                            @if (Auth::user())
                                <form class="" action="{{route('puntaje')}}" method="post" enctype="multipart/form-
                data">
                                    @csrf
                                    <select class="custom-select" name="puntaje">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="publicacion_id" value="{{$pub->id}}">
                                    <button type="submit" name="button" class="m-2 btn btn-dark">Valorar</button>
                                    @else
                                        <h4 class="alert alert-warning">Debe estar registrado para puntuar</h4>
                                    @endif
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    @else
        <h1 class="alert alert-warning">Esta publicacion no existe</h1>
    @endif

@endsection
