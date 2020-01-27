@extends('layouts.app')

@section('content')
	<div class="container align-item">
		<div class="col 8 ">
			<form class="d-flex flex-column" action="{{route('newpost')}}" method="post" enctype="multipart/form-data">
				@csrf
				<h1>Crea tu publicacion</h1>
				<label>Inserte un titulo(*)</label>
					<input type="text" name="titulo">
				<label>Escriba el contenido(*)</label>
					<textarea name="texto"></textarea>
				<label>Suba una foto relacionada(*)</label>
					<input type="file" name="img">
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
				<button type="submit" name="submit" class="col-1">Publicar!</button>
			</form>
		</div>
	</div>
@endsection
