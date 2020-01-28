@extends('layouts.app')

@section('content')
    @if(Route::is('edit')))
    <div class="container align-item">
        <div class="col 8 ">
            <form class="d-flex flex-column" action="{{route('newpost')}}" method="post" enctype="multipart/form-data"
                  id="form">
                @csrf
                <h1>Edita tu publicacion</h1>
                <label>Inserte un titulo(*)</label>
                <input type="text" name="titulo" id="titulo" value="{{$pub->titulo}}">
                <label>Escriba el contenido(*)</label>
                <textarea name="texto" id="texto">{{$pub->texto}}</textarea>
                <div class="custom-file mt-3 mb-3">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <button type="submit" name="submit" class="col-1 btn btn-dark">Publicar!</button>
            </form>
        </div>
    </div>
    @else
        <div class="container align-item">
            <div class="col 8 ">
                <form class="d-flex flex-column" action="{{route('newpost')}}" method="post"
                      enctype="multipart/form-data" id="form">
                    @csrf
                    <h1>Crea tu publicacion</h1>
                    <label>Inserte un titulo(*)</label>
                    <input type="text" name="titulo" id="titulo" required>
                    <label>Escriba el contenido(*)</label>
                    <textarea name="texto" id="texto" required></textarea>
                    <div class="custom-file mt-3 mb-3">
                        <input type="file" class="custom-file-input" id="customFile" required>
                        <label class="custom-file-label" for="customFile">Selecciona una imagen relacionada(*)</label>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" name="submit" class="col-1 btn btn-dark">Publicar!</button>
                </form>

                @if(count($errors) > 0)
                    <div class="errors m3">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="has-error mt-2">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
