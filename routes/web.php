<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Redirect the home page straight to the task list
Route::redirect('/', '/tasks');

// Full CRUD for tasks:
// index   -> GET    /tasks
// create  -> GET    /tasks/create
// store   -> POST   /tasks
// edit    -> GET    /tasks/{task}/edit
// update  -> PUT    /tasks/{task}
// destroy -> DELETE /tasks/{task}
Route::resource('tasks', TaskController::class);

// Extra route just for the quick "Pending / Completed" status toggle
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
    ->name('tasks.updateStatus');
