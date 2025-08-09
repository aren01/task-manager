@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th width="200px">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>
                <span class="badge {{ $task->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                    {{ ucfirst($task->status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No tasks found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection