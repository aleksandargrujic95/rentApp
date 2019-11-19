@extends('layouts.app')

@section('content')
	<h1>Dodaj korisnika</h1>
	<form action="/customers/{{ $customer->id }}" method="POST" role="form" style="width: 90%; margin-bottom: 10px;">
		@method('PATCH')
		@csrf
	
		<div class="form-group">
			<label for="title">Ime</label>
			<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' :  ''}}" id="name" name="name" value="{{$customer->name}}" required>
			<label for="title">Opstina</label>
			<input type="text" class="form-control {{ $errors->has('opstina') ? 'is-invalid' :  ''}}" id="opstina" name="opstina" value="{{$customer->opstina}}" required>
			<label for="title">Broj telefona</label>
			<input type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' :  ''}}" id="phone_number" name="phone_number" value="{{$customer->phone_number}}" required>
			<label for="title">Adresa</label>
			<input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' :  ''}}" id="address" name="address" value="{{$customer->address}}" required>
			<label for="title">Potroseno para</label>
			<input type="text" class="form-control {{ $errors->has('money_spent') ? 'is-invalid' :  ''}}" id="money_spent" name="money_spent" value="{{$customer->money_spent}}" required>
			<label for="title">Broj iznajmljivanja</label>
			<input type="text" class="form-control"  name="number_of_rent" value="{{$customer->number_of_rent}}" required>
			<label for="title">Komentar</label>
			<input type="text" class="form-control {{ $errors->has('comment') ? 'is-invalid' :  ''}}" id="comment" name="comment" value="{{$customer->comment}}" required>
		</div>
		<button type="submit" class="btn btn-primary">Sacuvaj izmene</button>
		@include('errors')
	</form>
@endsection