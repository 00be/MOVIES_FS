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
        this.reset(); // Restablecer el formulario después de la inserción
        cargarPeliculas(); // Recargar la lista de películas
    });
});