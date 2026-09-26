<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Optional: a couple of sample tasks so the list isn't empty on first run.
        Task::create([
            'task_name'   => 'Set up Laravel project',
            'description' => 'Install dependencies and configure the database connection.',
            'status'      => 'Completed',
            'due_date'    => now()->subDays(2),
        ]);

        Task::create([
            'task_name'   => 'Build Task CRUD',
            'description' => 'Add, view, edit, delete, and update the status of tasks.',
            'status'      => 'Pending',
            'due_date'    => now()->addDays(5),
        ]);
    }
}
