<div class="container pt-large px-5">
    <div class="notification bsecondaire has-text-centered">
        <div class="fixed-grid has-3-cols">
            <div class="grid">
                <div class="cell">
                    <div id="name_hero"></div>
                    <div id="pv_hero"></div>
                    <div id="mana_hero"></div>
                    <div id="xp_hero"></div>
                </div>
                <div class="cell" style="height:400px;">
                    <textarea id="log"></textarea>
                </div>
                <div class="cell">
                    <div id="name_monster"></div>
                    <div id="pv_monster"></div>
                    <div id="mana_monster"></div>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="button" id="physique" onclick="physique()" disabled>Attaque physique</button>
            <button type="button" class="button" id="magique" onclick="magique()" disabled>Attaque magique</button>
        </div>
    </div>
</div>
<p id="userValue" hidden><?php echo $_SESSION["user"]; ?></p>
<p id="heroValue" hidden><?php echo $_SESSION["hero"]; ?></p>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script defer src="<?php echo BASE_URL; ?>/scripts/Hero.js"></script>
<script defer src="<?php echo BASE_URL; ?>/scripts/Monster.js"></script>
<script defer src="<?php echo BASE_URL; ?>/scripts/fight.js"></script>