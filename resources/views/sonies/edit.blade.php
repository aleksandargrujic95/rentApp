
@extends('layouts.app')

@section('content')
<?php
	date_default_timezone_set('Europe/Belgrade');
	$today = \Carbon\Carbon::now();
 	$from_date =  \Carbon\Carbon::parse($sony->date_of_rent)->format('Y-m-d');
 	$to_date =   \Carbon\Carbon::parse($sony->date_of_giveback)->format('Y-m-d');
    $DeferenceInDays = \Carbon\Carbon::parse($today)->diffInDays($sony->date_of_giveback, false);
    $today_parsed = \Carbon\Carbon::parse($today)->format('Y-m-d');
    
?>
	<h1>Edit sony</h1>
	<form action="/sonies/{{ $sony->id }}" method="POST" role="form" style="width: 90%; margin-bottom: 10px;">
		@method('PATCH')
		@csrf
		<div class="form-group">
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="title">Od datuma:</label>
					<input class="form-control" type="date" id="from" name="date_of_rent" value="{{$today_parsed}}" placeholder="{{$today_parsed}}">
					<label for="title">Do datuma:</label>
					<input class="form-control" type="date" id="to" name="date_of_giveback" value="{{$today_parsed}}" placeholder="{{$today_parsed}}">
					<input type="hidden" id="diff_days" name="diff_days" value="">
					<label for="title">Cena:</label>
					<input class="form-control" type="price" name="price2" value="">
					<label for="title">Broj Dzojstika:</label>
					<div class="custom-control custom-radio">
					  <input type="radio" id="customRadio1" name="joystick" class="custom-control-input" value="2" required="required">
					  <label class="custom-control-label" for="customRadio1">2</label>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" id="customRadio2" name="joystick" class="custom-control-input" value="4">
					  <label class="custom-control-label" for="customRadio2">4</label>
					</div>
					<label for="customer_id">Kome:</label>
					<select class="form-control" name="customer_id" id="customer_id">
						<option value="1">Musterija</option>
						@foreach($customers as $customer)
							<option value="{{$customer->id}}">{{$customer->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<button type="submit" id="submit" class="btn btn-primary">Update sony</button>
		</div>
	</form>
 		<script >
	(function() {
	    $('#submit').on('click', function(){
	      var from = new Date($('#from').val());
	      var to = new Date($('#to').val());
	      day_from = from.getDate();
	      day_to = to.getDate();
	      	diff = day_to - day_from;
		    document.getElementById("diff_days").value = diff;
		    });
	})();
</script>
	@endsection