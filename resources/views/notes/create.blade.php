<!DOCTYPE html>
<html>
<head>
    <title>Создание заметки</title>
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
    </style>
</head>
<body>
<h1>Создание заметки</h1>
<form action="{{ route('notes.store') }}" method="POST">
    @csrf
    <label for="name">Название заметки:</label>
    <input type="text" id="name" name="name" required>
    <label for="description">Описание заметки:</label>
    <textarea id="description" name="description" required></textarea>
    <button type="submit">Сохранить</button>
</form>
</body>
</html>
