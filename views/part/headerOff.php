<nav class="navbar" aria-label="main navigation">
    <div class="navbar-brand pl-6">
        <a class="navbar-item" href="<?php echo BASE_URL; ?>">
            <figure class="image">
                <img src="<?php echo BASE_URL; ?>/images/Logo.png" alt="logo DungeonXplorer" class="is-rounded logo aligneBas">
            </figure>
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item tprincipal" href="<?php echo BASE_URL; ?>">
                Home
            </a>
        </div>
        <div class="navbar-end pr-6">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button boutonOr" href="<?php echo BASE_URL; ?>/account/inscription">
                    S'inscrire
                    </a>
                    <a class="button is-light" href="<?php echo BASE_URL; ?>/account/connexion">
                    Se connecter
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>