<!DOCTYPE html>
<html>
<head>
    <title>Список заметок</title>
    @vite('resources/js/app.js')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f0f0f0;
            padding: 10px;
            margin: 5px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        button {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        a {
            text-decoration: none;
            color: white;
            background: #007BFF;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<h1>Список заметок</h1>
<ul id="notes-list">
    <!-- Заметки будут добавляться сюда через JS -->
</ul>
<a href="/notes/create">Добавить</a>

<script>
    $(document).ready(function() {
        // Получение всех заметок
        $.ajax({
            url: `http://127.0.0.1:8000/api/notes`,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                const notes = data;
                const wrapper = $('#notes-list');
                notes.forEach(note => {
                    wrapper.append(`
                        <li id="note-${note.id}">
                            ${note.name}
                            <div>
                                <a href="/notes/${note.id}/edit">Изменить</a>
                                <button onclick="deleteNote(${note.id})">Удалить</button>
                            </div>
                        </li>
                    `);
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    function deleteNote(id) {
        if (confirm('Вы уверены, что хотите удалить эту заметку?')) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/notes/${id}`,
                method: 'delete',
                dataType: 'json',
                success: function() {
                    alert('Заметка удалена');
                    $(`#note-${id}`).remove();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>
</body>
</html>
