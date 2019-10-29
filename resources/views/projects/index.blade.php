@extends('layouts.app')

@section('content')
	<h1>Projects</h1>
	<ul class="list-group" style="margin-bottom: 10px;">
		@foreach($projects as $project)
			<li class="list-group-item">
				<a href="/projects/{{ $project->id }}">
					{{ $project->title }}
				</a>
			</li>
		@endforeach
	</ul>
	<a href="/projects/create" class="btn btn-primary">Create new Project</a>
@endsection