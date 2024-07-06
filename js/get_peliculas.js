document.addEventListener('DOMContentLoaded', function () {
    cargarPeliculas();
});

function cargarPeliculas() {
    fetch('../php/get_peliculas.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('bodyTablePeliculas').innerHTML = data;
        });
}

function eliminarPelicula(id) {
    if (confirm('¿Está seguro de que desea eliminar esta película?')) {
        fetch('../php/delete_pelicula.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + id
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            cargarPeliculas();
        });
    }
}

function modificarPelicula(id) {
    fetch('../php/get_pelicula.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            document.getElementById('peliculaId').value = data.id;
            document.getElementById('titulo').value = data.titulo;
            document.getElementById('lanzamiento').value = data.lanzamiento;
            document.getElementById('genero').value = data.genero;
            document.getElementById('duracion').value = data.duracion;
            document.getElementById('director').value = data.director;
            document.getElementById('reparto').value = data.reparto;
            document.getElementById('sinopsis').value = data.sinopsis;
            // Aquí puedes manejar la imagen si es necesario
        });
}
document.getElementById('formNuevaPelicula').addEventListener('submit', function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    fetch('../php/post_pelicula.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        this.reset(); // Restablecer el formulario después de la inserción/modificación
        document.getElementById('peliculaId').value = ''; // Limpiar el campo oculto peliculaId
        cargarPeliculas(); // Recargar la lista de películas
    });
});

