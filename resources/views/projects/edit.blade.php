@extends('layouts.app')

@section('content')

	<h1>Edit Project</h1>

	<form action="/projects/{{ $project->id }}" method="POST" role="form" style="width: 90%; margin-bottom: 10px;">
		@method('PATCH')
		@csrf
	
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
			<label for="title">Description</label>
			<textarea class="form-control" rows="3" name="description" required>
				{{ $project->description }}
			</textarea>
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Update project</button>
	</form>
	<form method="POST" action="/projects/{{ $project->id }}">
		@method('DELETE')
		@csrf
		<button type="submit" class="btn btn-danger">Delete  project</button>
	</form>
@endsection