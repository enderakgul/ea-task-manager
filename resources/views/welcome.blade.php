<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Scheduler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Task Scheduler</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('assign') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Schedule Tasks</button>
    </form>

    <h2 class="mt-5">Tasks</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Task İsmi</th>
            <th>Süre</th>
            <th>Zorluk</th>
            <th>Developer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->isim }}</td>
                <td>{{ $task->sure }}</td>
                <td>{{ $task->zorluk }}</td>
                <td>{{ $task->developer->isim ?? 'Unassigned' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2 class="mt-5">Developers</h2>
    <table class="table">
        <thead>
        <tr>
            <th>İSİM</th>
            <th>TASK LİSTESİ</th>
            <th>TOPLAM SÜRE</th>
        </tr>
        </thead>
        <tbody>
        @foreach($developers as $developer)
            <tr>
                <td>{{ $developer->isim }}</td>
                <td>
                    @foreach($developer->tasks as $task)
                        {{ $task->provider }} - {{ $task->isim }} <br>
                    @endforeach
                </td>
                <td>{{ number_format($developer->load, 1) }} saat</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
