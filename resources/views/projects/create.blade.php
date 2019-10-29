@extends('layouts.app')

@section('content')
	<h1>Create a new Project</h1>
	<form action="/projects" method="POST" role="form" style="width: 90%; margin-bottom: 10px;">
		@csrf
	
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' :  ''}}" id="title" name="title" value="{{ old('title') }}" required>
			<label for="title">Description</label>
			<textarea class="form-control {{ $errors->has('description') ? 'is-invalid' :  ''}}" rows="3" name="description" required> {{ old('description') }}
			</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Create project</button>
		@include('errors')
	</form>
@endsection