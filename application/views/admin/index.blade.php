@extends('layouts.app')

@section('style')
	<style type="text/css" media="screen">
		.content{
			margin-top: 5%;
		}
	</style>
	<link rel=stylesheet href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
	<div class="content">
		{!! form_open('dashboard', ['method' => 'get', 'autocomplete' => 'off']) !!}
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Desde</label>
							</div>						
							<div class="col-md-9">
								<input type="date" name="desde" class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Hasta</label>
							</div>						
							<div class="col-md-9">
								<input type="date" name="hasta" class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Edad ></label>
							</div>						
							<div class="col-md-8">
								<input type="text" name="edad" class="form-control only-number" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<button type="submit" class="btn btn-success btn-block">Enviar</button>
				</div>
			</div>
		{!! form_close() !!}
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Área</th>
						<th>Saldo</th>
					</tr>
				</thead>
				<tbody>
					@foreach($clientes as $cliente)
						@php($data = $cliente_find->find($cliente['id']))
						<tr>
							<td>{{ date('Y-m-d', strtotime($cliente['fecha'])) }}</td>
							<td>{{ $cliente['nombre'] }}</td>
							<td>{{ count($data) > 0 ? $data[0]['edad'] : '-' }}</td>
							<td>{{ count($data) > 0 ? $data[0]['area'] : '-' }}</td>
							<td>$ {{ number_format(count($data) > 0 ? $data[0]['saldo'] : 0) }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('script')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function(){
    		$('table').DataTable({
    			searching: false
    		})
		})
		$(document).on('keypress', '.only-number', function(e){
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false
			}
		})
		$(document).submit(function(event){
			const desde = $('[name="desde"]').val();
			const hasta = $('[name="hasta"]').val();
			if(desde != '' && hasta != ''){
				if(desde > hasta){
					alert('La fecha desde debe ser menor a la fecha hasta')
					event.preventDefault()
				}
			}
		})
	</script>
@endsection