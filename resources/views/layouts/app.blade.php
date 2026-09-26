<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Task Manager')</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --success: #16a34a;
            --danger: #dc2626;
            --pending-bg: #fef3c7;
            --pending-text: #92400e;
            --completed-bg: #dcfce7;
            --completed-text: #166534;
            --bg: #f4f5fb;
            --card: #ffffff;
            --border: #e5e7eb;
            --text: #1f2937;
            --muted: #6b7280;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }
        nav.topbar {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: #fff;
            padding: 18px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        nav.topbar a {
            color: #fff;
            text-decoration: none;
        }
        nav.topbar .brand {
            font-size: 1.25rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .container {
            max-width: 900px;
            margin: 32px auto;
            padding: 0 20px;
        }
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        h1 { font-size: 1.6rem; margin: 0 0 4px 0; }
        .subtitle { color: var(--muted); margin: 0 0 20px 0; }
        .btn {
            display: inline-block;
            padding: 9px 16px;
            border-radius: 8px;
            border: none;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: opacity 0.15s ease;
        }
        .btn:hover { opacity: 0.88; }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-secondary { background: #e5e7eb; color: #1f2937; }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-sm { padding: 6px 12px; font-size: 0.8rem; }
        .actions-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }
        th {
            color: var(--muted);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        tr:last-child td { border-bottom: none; }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .badge-pending { background: var(--pending-bg); color: var(--pending-text); }
        .badge-completed { background: var(--completed-bg); color: var(--completed-text); }
        .row-actions { display: flex; gap: 8px; flex-wrap: wrap; }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .alert-success { background: var(--completed-bg); color: var(--completed-text); }
        form.inline { display: inline; }
        label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 0.9rem; }
        input[type=text], input[type=date], textarea, select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            margin-bottom: 18px;
        }
        textarea { resize: vertical; min-height: 90px; }
        .error-text { color: var(--danger); font-size: 0.8rem; margin: -12px 0 14px 0; }
        .form-actions { display: flex; gap: 10px; margin-top: 8px; }
        .status-select {
            margin-bottom: 0;
            padding: 6px 8px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <nav class="topbar">
        <a href="{{ route('tasks.index') }}" class="brand">📋 Task Manager</a>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
