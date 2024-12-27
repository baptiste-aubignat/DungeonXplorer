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
            <a class="navbar-item tprincipal" href="<?php echo BASE_URL; ?>/hero/selection">
                Choisir Héros
            </a>
        </div>
        <div class="navbar-end pr-6">
            <?php 
            $conn = Database::connect();
            $query = "SELECT isAdmin from Account where name = '".$_SESSION["user"]."';";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $recu = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if($recu['isAdmin'] == 1){
                echo "<a class='navbar-item tprincipal' href='".BASE_URL."/adminPanel'>Panneau Administrateur</a>";
            }
            ?>
            
            <a class="navbar-item tprincipal" href="<?php echo BASE_URL; ?>/account/profile">
                Profile
            </a>
        </div>
    </div>
</nav>