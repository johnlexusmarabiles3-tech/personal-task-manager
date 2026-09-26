@extends('layouts.app')

@section('title', 'Add Task - Task Manager')

@section('content')
    <div class="card">
        <h1>Add New Task</h1>
        <p class="subtitle">Fill in the details below to create a task.</p>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label for="task_name">Task Name</label>
            <input type="text" id="task_name" name="task_name" value="{{ old('task_name') }}" placeholder="e.g. Finish Laravel project">
            @error('task_name') <p class="error-text">{{ $message }}</p> @enderror

            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Optional details about this task">{{ old('description') }}</textarea>
            @error('description') <p class="error-text">{{ $message }}</p> @enderror

            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}">
            @error('due_date') <p class="error-text">{{ $message }}</p> @enderror

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Pending" {{ old('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status') <p class="error-text">{{ $message }}</p> @enderror

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
