@extends('layouts.app')

@section('content')
	<h1>Dodaj korisnika</h1>
	<form action="/customers" method="POST" role="form" style="width: 90%; margin-bottom: 10px;">
		@csrf
	
		<div class="form-group">
			<label for="title">Ime</label>
			<input type="text" class="form-control {{ $errors->has('firstname') ? 'is-invalid' :  ''}}" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
			<label for="title">Prezime</label>
			<input type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' :  ''}}" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
			<label for="title">Broj telefona</label>
			<input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' :  ''}}" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
			<label for="title">Adresa</label>
			<input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' :  ''}}" id="address" name="address" value="{{ old('address') }}" required>
			<label for="title">Potroseno para</label>
			<input type="text" class="form-control {{ $errors->has('money_spent') ? 'is-invalid' :  ''}}" id="money_spent" name="money_spent" value="{{ old('money_spent') }}" required>
			<label for="title">Komentar</label>
			<input type="text" class="form-control {{ $errors->has('coment') ? 'is-invalid' :  ''}}" id="coment" name="coment" value="{{ old('coment') }}" required>
		</div>
		<button type="submit" class="btn btn-primary">Napravi korisnika</button>
		@include('errors')
	</form>
@endsection