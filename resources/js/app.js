import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function() {
    console.log("jQuery is working!");

    // Получение всех заметок
    $.ajax({
        url: `http://127.0.0.1:8000/api/notes`,
        method: 'get',
        dataType: 'json',
        success: function(data) {
            const notes = data;
            const wrapper = $('#notes-list');
            wrapper.empty();  // Очистка перед добавлением новых данных
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

    // Функция для удаления заметки
    window.deleteNote = function(id) {
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
    };

    // Обработчик создания заметки
    $('#create-note-form').on('submit', function(e) {
        e.preventDefault();
        const name = $('#name').val();
        const description = $('#description').val();

        $.ajax({
            url: `http://127.0.0.1:8000/api/notes`,
            method: 'post',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify({
                name: name,
                description: description,
            }),
            success: function(data) {
                alert('Заметка создана');
                window.location.href = '/notes';
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Обработчик изменения заметки
    $('#edit-note-form').on('submit', function(e) {
        e.preventDefault();
        const id = $('#note-id').val();
        const name = $('#name').val();
        const description = $('#description').val();

        $.ajax({
            url: `http://127.0.0.1:8000/api/notes/${id}`,
            method: 'put',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify({
                name: name,
                description: description,
            }),
            success: function(data) {
                alert('Заметка обновлена');
                window.location.href = '/notes';
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
