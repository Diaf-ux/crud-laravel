<!DOCTYPE html>
<html>
<head>
    <title>Просмотр заметки</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            text-align: center;
        }
        .note {
            background: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<h1>Просмотр заметки</h1>
<div class="note">
    <h2>{{ $note->name }}</h2>
    <p>{{ $note->description }}</p>
</div>
<a href="/notes">Вернуться к списку заметок</a>
</body>
</html>
