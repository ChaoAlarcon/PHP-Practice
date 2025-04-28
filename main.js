// Al enviar el formulario
document.getElementById('formulario').addEventListener('submit', function(e) {
    e.preventDefault();  // Evitar el envío tradicional

    var nombre = document.getElementById('nombre').value;

    // Crear el objeto AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "insertar.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Cuando la solicitud se complete
    xhr.onload = function() {
        if (xhr.status == 200) {
            // Actualizar la lista de usuarios sin recargar la página
            document.getElementById('listaUsuarios').innerHTML = xhr.responseText;
            document.getElementById('nombre').value = '';
              // Limpiar el input
        }
    };

    // Enviar los datos del formulario (nombre)
    xhr.send("nombre=" + nombre);
});

document.getElementById('formulario').addEventListener('submit', function(e) {
    e.preventDefault();  // Evitar el envío tradicional

    var password = document.getElementById('password').value;

    // Crear el objeto AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "insertar.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Cuando la solicitud se complete
    xhr.onload = function() {
        if (xhr.status == 200) {
            // Actualizar la lista de usuarios sin recargar la página
            document.getElementById('listaUsuarios').innerHTML = xhr.responseText;
            document.getElementById('password').value = '';
              // Limpiar el input
        }
    };

    // Enviar los datos del formulario (nombre)
    xhr.send("password=" + password);
});

// Delegación de eventos para los botones de eliminar
document.getElementById('listaUsuarios').addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('eliminar')) {
        var id = e.target.getAttribute('data-id');

        // Crear el objeto AJAX para eliminar
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "eliminar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Cuando la solicitud se complete
        xhr.onload = function() {
            if (xhr.status == 200) {
                // Actualizar la lista de usuarios después de eliminar
                document.getElementById('listaUsuarios').innerHTML = xhr.responseText;
            }
        };

        // Enviar el ID del usuario a eliminar
        xhr.send("id=" + id);
    }
});


