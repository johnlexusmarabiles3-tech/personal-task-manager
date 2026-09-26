@extends('layouts.app')

@section('title', 'All Tasks - Task Manager')

@section('content')
    <div class="card">
        <div class="actions-bar">
            <div>
                <h1>My Tasks</h1>
                <p class="subtitle">{{ $tasks->count() }} task(s) total</p>
            </div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Add Task</a>
        </div>

        @if ($tasks->isEmpty())
            <div class="empty-state">
                <p>No tasks yet. Click "Add Task" to create your first one.</p>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td><strong>{{ $task->task_name }}</strong></td>
                            <td>{{ Str::limit($task->description, 60) ?: '—' }}</td>
                            <td>{{ $task->due_date ? $task->due_date->format('M d, Y') : '—' }}</td>
                            <td>
                                <span class="badge {{ $task->status === 'Completed' ? 'badge-completed' : 'badge-pending' }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td>
                                <div class="row-actions">
                                    {{-- Quick status toggle --}}
                                    <form action="{{ route('tasks.updateStatus', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="status-select" onchange="this.form.submit()">
                                            <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>

                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary btn-sm">Edit</a>

                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Delete this task? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
