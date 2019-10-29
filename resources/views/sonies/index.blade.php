@extends('layouts.app')
@section('content')
<?php
use Carbon\Carbon;
$today = Carbon::now();

?>
<h1 style="text-align: center;">Pregled Sonija</h1>
<br><br>
<div class="row">
	<div class="col-sm">
		
	</div>
	<div class="col-sm">
		
	</div>
	<div class="col-sm" style="text-align: right;">
	</div>
	<div class="col-sm" style="text-align: right;"> 
		<a href="/sonies/create" class="btn btn-danger" style="background: #FF5852; border-color: #FF5852;">Dodaj Sony</a> <a href="/customers/create" class="btn btn-primary" style="background: #00D5C9; border-color: #00D5C9;">Dodaj korisnika</a>
	</div>
</div>
<div class="table_cont" style="margin-bottom: 20px;">
	<div class="row">
    <div class="col-sm">
      Sony:
    </div>
    <div class="col-sm">
      Kome:
    </div>
    <div class="col-sm">
      Broj Dzojstika:
    </div>
    <div class="col-sm">
      Od:
    </div>
    <div class="col-sm">
      Do:
    </div>
    </div>
 </div>
    @foreach($sonies as $sony)
    <?php
    $DeferenceInDays = Carbon::parse($today)->diffInDays($sony->date_of_giveback);
    ?>
 
    	@if($sony->customer_id !== 1 && $sony->date_of_giveback >= $today)
		    <div class="row" style="background: #262C3A; margin-bottom: 5px; padding: 10px 0; border: 1px solid #FF5852;border-radius: 4px; color: #fff;">
			    <div class="col-sm">
			    	<a href="/sonies/{{$sony->id}}/edit">{{$sony->name}}</a>
			    </div>
			    <div class="col-sm">
			    	<a href="/customers/{{$sony->customer->id}}">{{$sony->customer->firstname}} {{$sony->customer->lastname}}</a>
			    </div>
			    <div class="col-sm">
			      {{$sony->joystick}}
			    </div>
			    <div class="col-sm">
			      {{$sony->date_of_rent}}
			    </div>
			    <div class="col-sm">
			      {{$sony->date_of_giveback}}
			    </div>
		    </div>
 	@else
 	 	<div class="row" style="background: #93C2FA; margin-bottom: 5px; padding: 10px 0; border: 2px solid #262C3A; border-radius: 4px;">
			<div class="col">
			   	<a href="/sonies/{{$sony->id}}">{{$sony->name}}</a>
			</div>	
			<div class="col">
			   	<p>Na stanju</p>
			</div> 
			<div class="col">
			   	
			</div>
			<div class="col" style="text-align: right;">
			   	<a class="btn btn-primary" style="background: #FF5852; border-color: #FF5852;" href="/sonies/{{$sony->id}}/edit">Iznajmi</a>
			</div>	   
		</div>
	@endif
@endforeach
@endsection