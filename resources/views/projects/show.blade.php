@extends('layouts.app')

@section('content')
<h1>{{ $project->title }}</h1>

<div class="content">{{ $project->description }}</div>
<p>
	<a href="/projects/{{ $project->id }}/edit">
		Edit
	</a>
</p>
@if ($project->tasks->count())
	<div>
		@foreach($project->tasks as $task)
			<div>
				<form method="POST" action="/tasks/{{ $task->id }}">
					@method('PATCH')
					@csrf
					<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}} >
					{{ $task->description }}
				</form>
			</div>
		@endforeach
	</div>
@endif

{{-- add a new task --}}

<form action="/projects/{{ $project->id }}/tasks" method="POST" class="form-horizontal" role="form">
	@csrf
	<div class="form-group">
		<label class="sr-only" for="">Add Task</label>
		<input type="text" class="form-control" name="description" placeholder="Add Task">
	</div>
 	@include('errors')
	<button type="submit" class="btn btn-primary">Create Task</button>
</form>
<p>{{$user = auth()->user()['name']}}</p>

@endsection