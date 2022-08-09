$(document).ready(function() {
    listarPersonas()
});


function listarPersonas() {
    let template = `<tr data='{data}'>
        <td> {id} </td>
        <td> {nombres} </td>
        <td> {apellidos} </td>
        <td> {dni} </td>
        <td> {address} </td>
        <td>
            <button id="eliminar" class="btn btn-danger">Eliminar</button>
            <button id="editar" class="btn btn-warning">
            <a href="{{ route('persona.edit') }}" class="page-link" data-bs-toggle="modal" data-bs-target="#agregarModal">Actualizar</a>
            </button>
        </td>
    </tr> `;

    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/api/persona",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        dataType: "JSON"
    }).done(function(data) {
        var templates
        data.data.forEach(persona => {
            templates += template
                .replace('{id}', persona.id)
                .replace('{nombres}', persona.nombres)
                .replace('{apellidos}', persona.apellidos)
                .replace('{dni}', persona.dni)
                .replace('{address}', persona.address)
                .replace('{data}', JSON.stringify(persona));
        });
        $('#personas-list').html(templates);

    }).fail(function(data) {
        console.log(data)
    });
}

$(document).on('click', '#agregar-persona', function() {
    var request = {};
    request.nombres = $('#nombre').val();
    request.apellidos = $('#apellidos').val();
    request.dni = $('#dni').val();
    request.address = $('#address').val();
    console.log(request);

    if ($('#staticBackdropLabel').text() == 'EDICCION DE PERSONA') {
        var id = $('#id').val();
        request.id = id;
        $.ajax({
            type: "PUT",
            url: "http://127.0.0.1:8000/api/persona/" + id,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            data: JSON.stringify(request),
            dataType: "JSON"
        }).done(function(data) {
            alert(data.message)
            $('#cerrar-modal-agregar').click();
            $('#nombre').val('');
            $('#apellidos').val('');
            $('#dni').val('');
            $('#address').val('');
            $('#id').val('');
            listarPersonas();
        }).fail(function(data) {
            alert(data.message)
        });
    } else {

        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/api/persona",
            data: JSON.stringify(request),
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            dataType: "JSON"
        }).done(function(data) {
            alert(data.message)
            listarPersonas();
            $('#cerrar-modal-agregar').click();
            $('#nombre').val('');
            $('#apellidos').val('');
            $('#dni').val('');
            $('#address').val('');
        }).fail(function(data) {
            alert(data.message)
        });
    }
});

$(document).on('click', '#eliminar', function() {
    var btn = $(this).parents('tr').attr('data');
    var data = JSON.parse(btn);
    $.ajax({
        type: "DELETE",
        url: "http://127.0.0.1:8000/api/persona/" + data.id,
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        dataType: "JSON"
    }).done(function(data) {
        alert(data.message)
        listarPersonas();
    }).fail(function(data) {
        alert(data.message)
    });

});

$(document).on('click', '#editar', function() {
    var btn = $(this).parents('tr').attr('data');
    var data = JSON.parse(btn);
    $('#titulo').text('Editar Persona')
    $('#staticBackdropLabel').text('EDICCION DE PERSONA')
    $('#nombre').val(data.nombres);
    $('#apellidos').val(data.apellidos);
    $('#dni').val(data.dni);
    $('#address').val(data.address)
    $('#id').val(data.id)
});