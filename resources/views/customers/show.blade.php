@extends('layouts.app')
@section('content')
	{{$customer->firstname}},{{$customer->lastname}},{{$customer->phone_number}},{{$customer->address}},{{$customer->coment}},{{$customer->money_spent}}
@endsection