<main id="main" class="main">
    <section data-aos="zoom-in" data-aos-duration="1000" class="sectionPrincipal">
        <h1 class="tituloPrincipal">Películas y series ilimitadas <br> en un solo lugar</h1>
        <h2 class="subtituloPrincipal">Disfruta donde quieras. <br> Cancela en cualquier momento.</h2>
        <a class="botonRegistrarse" href="./pages/registrarse.html">Registrate</a>
    </section>
    <section data-aos="fade-up" data-aos-offset="300" data-aos-delay="50" data-aos-duration="1000" class="buscadorPrincipal">
        <h2 class="tituloSection">¿Qué estas buscando para ver?</h2>
        <form class="buscadorPeliculas">
            <input class="inputBuscador" type="text" placeholder="Buscar..." id="buscar" name="buscar">
            <input class="botonBuscador" type="submit" value="Buscar">
        </form>
    </section>
    <hr>
    <section id="tendencias" data-aos="fade-up" data-aos-offset="400" data-aos-delay="100" data-aos-duration="1000" class="peliculasTendencia">
        <h3 class="tituloSection">Las tendencias de hoy</h3>
        <div class="peliculas" id="tendenciasContainer">
            <!-- Aquí se cargarán las películas tendencia -->
        </div>
        <button id="botonAnterior" class="boton anterior">Anterior</button>  
        <button id="botonSiguiente" class="boton siguiente">Siguiente</button>
    </section>
    <hr>
    <section data-aos="fade-up" data-aos-offset="200" data-aos-delay="100" data-aos-duration="2000" class="peliculasAclamadas">
        <h3 class="tituloSection">Las más aclamadas</h3>
        <div class="aclamadas" id="aclamadasContainer">
            <!-- Aquí se cargarán las películas más aclamadas -->
        </div>
    </section>
</main>
