@extends('layouts.app')

@section('title', 'Edit Task - Task Manager')

@section('content')
    <div class="card">
        <h1>Edit Task</h1>
        <p class="subtitle">Update the details of this task.</p>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="task_name">Task Name</label>
            <input type="text" id="task_name" name="task_name" value="{{ old('task_name', $task->task_name) }}">
            @error('task_name') <p class="error-text">{{ $message }}</p> @enderror

            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
            @error('description') <p class="error-text">{{ $message }}</p> @enderror

            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}">
            @error('due_date') <p class="error-text">{{ $message }}</p> @enderror

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status') <p class="error-text">{{ $message }}</p> @enderror

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
