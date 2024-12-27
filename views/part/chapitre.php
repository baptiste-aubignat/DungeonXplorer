<div class="container pt-large px-5">
    <div class="notification bsecondaire has-text-centered">
        <h1 class="is-size-1">Chapitre <?php echo CHAP->nbChap; ?></h1>
        <br>
        <?php CHAP->getChap(); ?>
    </div>
</div>
<p id="userValue" hidden><?php echo $_SESSION["user"]; ?></p>
<p id="heroValue" hidden><?php echo $_SESSION["hero"]; ?></p>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script defer src="<?php echo BASE_URL; ?>/scripts/chapitre.js"></script>