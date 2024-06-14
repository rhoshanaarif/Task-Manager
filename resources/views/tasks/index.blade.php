@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
    <table class="table table-striped table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->status == 'pending')
                            <span class="badge badge-warning status-badge">{{ $task->status }}</span>
                        @elseif($task->status == 'completed')
                            <span class="badge badge-success status-badge">{{ $task->status }}</span>
                        @else
                            <span class="badge badge-secondary status-badge">{{ $task->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
