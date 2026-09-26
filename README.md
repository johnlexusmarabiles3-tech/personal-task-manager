# Personal Task Manager (Laravel Mini Project)

Project Code: WST21-PM-2026-SF
Student Name: **[YOUR FULL NAME HERE]**
Course & Year: **[YOUR COURSE & YEAR HERE]**
Database Used: **MySQL** (SQLite also supported as a zero-config alternative — see below)

## Features
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status (Pending / Completed) — via a quick dropdown on the task list, or through the Edit form

## Tech Stack
- Laravel 11
- Blade templating
- MySQL (Eloquent ORM)
- Plain CSS (no external framework) for the UI

## How the Project is Structured
This follows the flow taught in class: **Routes → Controller → Model → Database → Blade**

| Piece | File |
|---|---|
| Route definitions | `routes/web.php` |
| Controller (business logic) | `app/Http/Controllers/TaskController.php` |
| Model (Eloquent) | `app/Models/Task.php` |
| Migration (database schema) | `database/migrations/2026_09_26_000000_create_tasks_table.php` |
| Views (Blade) | `resources/views/tasks/*.blade.php` and `resources/views/layouts/app.blade.php` |

### Database Schema (`tasks` table)
| Field | Type | Purpose |
|---|---|---|
| id | bigint (PK) | Task ID |
| task_name | string | Name of the task |
| description | text (nullable) | Task details |
| status | enum('Pending','Completed') | Current status |
| due_date | date (nullable) | Task deadline |
| created_at / updated_at | timestamps | Record tracking |

### Routes
| Method | URI | Action | Purpose |
|---|---|---|---|
| GET | /tasks | index | View all tasks |
| GET | /tasks/create | create | Show add-task form |
| POST | /tasks | store | Save a new task |
| GET | /tasks/{task}/edit | edit | Show edit form |
| PUT | /tasks/{task} | update | Save edited task |
| DELETE | /tasks/{task} | destroy | Delete a task |
| PATCH | /tasks/{task}/status | updateStatus | Quick status toggle |

## Setup Instructions

### 1. Clone the repository
```bash
git clone https://github.com/YOUR-USERNAME/YOUR-REPO.git
cd YOUR-REPO
```

### 2. Install PHP dependencies
```bash
composer install
```

### 3. Copy the environment file and generate an app key
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure the database

**Option A — MySQL (recommended)**
1. Create a database, e.g. `task_manager`, in MySQL (via phpMyAdmin, HeidiSQL, or the CLI: `CREATE DATABASE task_manager;`).
2. In `.env`, confirm/update these values to match your local MySQL setup:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

**Option B — SQLite (no server setup needed)**
1. In `.env`, set:
   ```
   DB_CONNECTION=sqlite
   ```
   and comment out/remove the other `DB_*` lines.
2. Create the SQLite file:
   ```bash
   touch database/database.sqlite
   ```

### 5. Run the migrations (creates the `tasks` table)
```bash
php artisan migrate
```

Optional — seed a couple of sample tasks so the list isn't empty on first run:
```bash
php artisan db:seed
```

### 6. Start the development server
```bash
php artisan serve
```

Visit **http://127.0.0.1:8000** in your browser — it redirects straight to the task list at `/tasks`.

## Notes
- `vendor/` and `node_modules/` are intentionally not committed (standard for Laravel/PHP projects) — running `composer install` regenerates them.
- Form validation is handled server-side in `TaskController` (required task name, valid status, valid date).
- The status column on the task list uses a small dropdown that submits instantly on change (via a hidden PATCH form), so you can flip a task between Pending and Completed with one click, in addition to changing it from the full Edit form.
