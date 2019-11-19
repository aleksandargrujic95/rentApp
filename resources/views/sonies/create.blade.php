@extends('layouts.app')

@section('content')
	<?php
	$today_parsed = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y-m-d');
	?>

	<h1>Dodaj Sony</h1>
	<form action="/sonies" method="POST" role="form" style="width: 90%; margin-bottom: 10px;">
		@csrf
	
		<div class="form-group">
			<label for="title">Sony:</label>
			<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' :  ''}}" id="name" name="name" value="{{ old('name') }}" required>
			<label for="title">Datum iznajmljivanja:</label>
			<input type="date" class="form-control {{ $errors->has('date_of_rent') ? 'is-invalid' :  ''}}" id="date_of_rent" name="date_of_rent" value="{{ $today_parsed }}" required>
			<label for="title">Datum povratka:</label>
			<input type="date" class="form-control {{ $errors->has('date_of_giveback') ? 'is-invalid' :  ''}}" id="date_of_giveback" name="date_of_giveback" value="{{ $today_parsed }}" required>
			<label for="title">Kome</label>
			<input type="text" class="form-control {{ $errors->has('customer_id') ? 'is-invalid' :  ''}}" id="customer_id" name="customer_id" value="{{ old('customer_id') }}" required>
		</div>
		<button type="submit" class="btn btn-primary">Dodaj na stanje</button>
		@include('errors')
	</form>
@endsection