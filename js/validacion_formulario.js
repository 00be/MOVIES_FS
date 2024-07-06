function validarFormulario() {
    var titulo = document.getElementById('titulo').value;
    var lanzamiento = document.getElementById('lanzamiento').value;
    var genero = document.getElementById('genero').value;
    var duracion = document.getElementById('duracion').value;
    var director = document.getElementById('director').value;
    var reparto = document.getElementById('reparto').value;
    var sinopsis = document.getElementById('sinopsis').value;
    var imagen = document.getElementById('imagen').value;

    // Validación básica: verificar que los campos no estén vacíos
    if (titulo.trim() == '' || lanzamiento.trim() == '' || genero == '' || duracion.trim() == '' || director.trim() == '' || reparto.trim() == '' || sinopsis.trim() == '' || imagen.trim() == '') {
        alert('Por favor, complete todos los campos.');
        return false;
    }

    return true; // Envía el formulario si pasa la validación
}
