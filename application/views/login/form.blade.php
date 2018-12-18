@extends('layouts.app')

@section('style')
	<style type="text/css" media="screen">
		.login{
			margin-top: 10%;
		}
		h1{
			margin-bottom: 30px;
		}
	</style>
@endsection

@section('content')
	<div class="login">
		<h1 class="text-center">Cellvoz Desarrollo</h1>
		<div class="row justify-content-md-center">
			<div class="col-md-4">
				{{ validation_errors() }}
				{!! form_open('', ['autocomplete' => 'off']) !!}
					<div class="form-group">
						<label for="username">Usuario:</label>
						<input type="text" name="username" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" name="password" class="form-control" required/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-primary" name="request">Ingresar</button>
					</div>
				{!! form_close() !!}
			</div>
		</div>
	</div>
@endsection