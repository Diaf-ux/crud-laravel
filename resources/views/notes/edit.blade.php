<!DOCTYPE html>
<html>
<head>
    <title>Изменение заметки</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-button {
            background: red;
        }
        .back-button {
            background: grey;
            margin-top: 10px;
            width: 10%;
        }
    </style>
    @vite('resources/js/app.js')
</head>
<body><form action="{{ route('notes.update', $note->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Название заметки:</label>
    <input type="text" id="name" name="name" value="{{ $note->name }}" required>
    <label for="description">Описание заметки:</label>
    <textarea id="description" name="description" required>{{ $note->description }}</textarea>
    <button type="submit">Обновить</button>
</form>
<form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="margin-top: 10px;">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-button">Удалить</button>
</form>
<button onclick="window.history.back()" class="back-button">Назад</button>
</body>
</html>
