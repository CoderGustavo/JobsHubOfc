<header class="container d-flex justify-content-center justify-content-md-between align-items-center header">
    <a href="/" class="imglogo">
        <img src="/View/assets/img/logo.png" alt="logo">
    </a>

    <nav class="navbar d-none d-md-flex">
        <a href="/">Inicio</a>
        <a href="/courses">Cursos</a>
        <a href="/likes">Curtidas</a>
        <?php if($_SESSION["user"]): ?>
            <a href="/profile" class="btn-call-to-action">Perfil</a>
        <?php else: ?>
            <a href="/login" class="btn-call-to-action">Log in</a>
        <?php endif; ?>
    </nav>

</header>