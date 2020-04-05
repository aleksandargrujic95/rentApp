@extends('layouts.app')
@section('content')
<h1 style="text-align: center;">Pregled Korisnika</h1>
<br><br>
<div class="row">
		<div class="col-sm">
			<a href="/customers/create" class="btn btn-primary">Dodaj korisnika</a>
		</div>
		<div class="col-sm" style="text-align: right; font-size: x-large;">
			<p>Pronadji korisnika:</p>
		</div>
		<div class="col-sm">
			<form action="/search" method="get">
				<div class="input-group">
					<input type="search" name="search" class="form-control">
					<span class="input-group-prepend">
						<button type="submit" class="btn btn-primary">Search</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-sm">
			<form action="/searchJbk" method="get">
				<div class="input-group">
					<input type="search" name="searchJbk" class="form-control">
					<span class="input-group-prepend">
						<button type="submit" class="btn btn-primary">Search JBK</button>
					</span>
				</div>
			</form>
		</div>
	</div>
	  <table class="table">
	  <thead class="thead-dark">
	    <tr>
		  <th scope="col">#</th>
		  <th scope="col">JBK:</th>
	      <th scope="col">Ime:</th>
	      <th scope="col">Opstina:</th>
	      <th scope="col">Telefon:</th>
	      <th scope="col">Adresa:</th>
	      <th scope="col">Komentar:</th>
	      <th scope="col">Broj iznajmljivanja:</th>
	      <th scope="col">Potreoseno para:</th>
		  <th scope="col"></th>
		  <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  	$i=0;
	  	?>
	  	@foreach($customers as $customer)
			<?php
		  		$i++;
		  	?>
			<tr>
			  <th scope="row">{{$i}}</th>
			  <td>{{ $customer->jbk }}</td>
		      <td>{{ $customer->name }}</td>
		      <td>{{ $customer->opstina }}</td>
		      <td>{{ $customer->phone_number }}</td>
		      <td>{{ $customer->address }}</td>
		      <td>{{ $customer->comment }}</td>
		      <td>{{ $customer->number_of_rent }}</td>
		      <td>{{ $customer->money_spent }} din</td>
		      <td>
		      	<form method="POST" action="/customers/{{ $customer->id }}">
					@method('DELETE')
					@csrf
					<button type="submit" class="delete-btn"><i class="fas fa-user-times"></i></button>
				</form>
			  </td>
			  <td>
				<form method="GET" action="/customers/{{ $customer->id }}">
					@csrf
					<button type="submit" class="submit-btn"><i class="fas fa-user-edit"></i></button>
				</form>
			  </td>
		    </tr>
		@endforeach	   
	  </tbody>
	</table>
	<div class="row">
		<div class="col-12 text-center">
			{{$customers->links()}}
		</div>	
	</div>
@endsection