@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user())
            <a href="{{route('post')}}" class="btn btn-secondary btn-lg borrar">Crear una Publicación</a>
        @endif
        <div class="item mb-5 m-2">
            @foreach ($pub as $publicacion)
                <div class="media mt-auto">
                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="/storage/{{$publicacion->img}}"
                         alt="image" height="200" width="200">
                    <div class="media-body">
                        <h3 class="title mb-1"><a href="/post/{{$publicacion->id}}">{{$publicacion->titulo}}</a></h3>
                        <div class="meta mb-1"><span class="text">Por {{$publicacion->user->name}}</span></div>
                        <div class="intro">{{$publicacion->texto}}</div>
                        <a href="/post/{{$publicacion->id}}" class="more-link" href="blog-post.html">Read more
                            &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
