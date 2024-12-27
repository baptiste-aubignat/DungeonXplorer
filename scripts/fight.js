let hero;
let monster;

const delay = ms => new Promise(res => setTimeout(res, ms));

/**
 * simule le lancé d'un dée de 6 (entre 1 et 6)
 * @returns valeur du dée
 */
function dee () {
    return Math.floor(Math.random()*6+1)%7;
}

const fetchData = async (query) => {
    return new Promise((resolve, reject) => {
        let ajaxurl = '/DungeonXplorer/private/tool/ajax';
        $.post(ajaxurl, { type: 'query', query: query }, function (response) {
            try {
                resolve(JSON.parse(response));
            } catch (e) {
                reject('Invalid JSON response');
            }
        });
    });
};

function updateData() {
    console.log(hero.toString());
    console.log(monster.toString());
    document.getElementById("name_hero").innerText = hero.getName();
    document.getElementById("pv_hero").innerText = "pv : " + hero.getPv();
    document.getElementById("mana_hero").innerText = "mana : " + hero.getMana();
    document.getElementById("xp_hero").innerText = "xp : " + hero.getXp();

    document.getElementById("name_monster").innerText = monster.getName();
    document.getElementById("pv_monster").innerText = "pv : " + monster.getPv();
    document.getElementById("mana_monster").innerText = "mana : " + monster.getMana();
}

function jeu() {
    let initHero = hero.calcInitiative();
    let initMonster = monster.calcInitiative();
    addLog("joueur tire " + initHero);
    addLog("monstre tire " + initMonster);

    let playerTurn;
    
    if (initHero > initMonster) {
        addLog("=> joueur agit en premier");
        playerTurn = true;
    } else {
        addLog("=> monstre agit en premier");
        playerTurn = false;
    }
    addLog("");

    if (playerTurn == false) {
        monsterAttaque();
    } else {
        document.getElementById("physique").disabled = false;
        document.getElementById("magique").disabled = false;
    }
}

function monsterAttaque  () {
    document.getElementById("physique").disabled = true;
    document.getElementById("magique").disabled = true;

    let attaq = monster.calcAttaque();
    let def = hero.calcDefense();
    addLog("monstre fait " + attaq + " dégâts");
    addLog("player se defend de " + def);
    let dmg = attaq - def;
    if (dmg > 0) {
        addLog("=> joueur subit " + dmg + " dégâts");
        hero.takeDamage(dmg);
        updateData();
    } else {
        addLog("=> l'attaque est inefficace !");
    }
    addLog("");
    if (!mort()) {
        document.getElementById("physique").disabled = false;
        document.getElementById("magique").disabled = false;
    }
}

function physique() {
    let attaq = hero.calcAttaque();
    let def = monster.calcDefense();
    console.log(def);
    addLog("player fait " + attaq + " dégâts");
    addLog("monstre se defend de " + def);
    let dmg = attaq - def;
    if (dmg > 0) {
        addLog("=> monstre subit " + dmg + " dégâts");
        monster.takeDamage(dmg);
        updateData();
    } else {
        addLog("=> l'attaque est inefficace !");
    }
    addLog("");
    if (!mort()) {
        monsterAttaque();
    }
}

function magique() {
    if (hero.getMana() > 0) {
        let attaq = hero.calcAttaqueMagique();
        let def = monster.calcDefense();
        addLog("player fait " + attaq + " dégâts");
        addLog("monstre se defend de " + def);
        let dmg = attaq - def;
        if (dmg > 0) {
            addLog("=> monstre subit " + dmg + " dégâts");
            monster.takeDamage(dmg);
            updateData();
        } else {
            addLog("=> l'attaque est inefficace !");
        }
        addLog("");
        if (!mort()) {
            monsterAttaque();
        }
    } else {
        alert("pas assez de mana !");
    }
}

function mort() {
    if (monster.isDead()) {
        addLog("le monstre est mort !");
        addLog("Felicitation !");
        monstreMort();
        return true;
    } else if (hero.isDead()) {
        addLog("vous êtes Mort !");
        addLog("Felicitation !");
        joueurMort();
        return true;
    }
    return false;
}

const joueurMort = async() => {
    document.getElementById("physique").disabled = true;
    document.getElementById("magique").disabled = true;
    let query = "update Hero set chapter_id = 10 where hero_id = "+hero.getId()+";";
    await fetchData(query);
    await delay(1000);
    location.replace("/DungeonXplorer/play");
}

const monstreMort = async() => {
    document.getElementById("physique").disabled = true;
    document.getElementById("magique").disabled = true;
    hero.addXp(monster.getXp());
    let query = `
        UPDATE Hero
        SET chapter_id = (
            SELECT next_chapter_id
            FROM (
                SELECT l.next_chapter_id
                FROM Hero h
                JOIN Links l ON l.chapter_id = h.chapter_id
                WHERE h.hero_id = ${hero.getId()} AND l.next_chapter_id <> 10
            ) AS derived_table
        )
        WHERE hero_id = ${hero.getId()};
    `;
    await fetchData(query);
    query = "update Hero set pv = "+hero.getPv()+" where hero_id = "+hero.getId()+";";
    await fetchData(query);
    query = "update Hero set mana = "+hero.getMana()+" where hero_id = "+hero.getId()+";";
    await fetchData(query);
    query = "update Hero set xp = "+hero.getXp()+" where hero_id = "+hero.getId()+";";
    await fetchData(query);
    await delay(1000);
    location.replace("/DungeonXplorer/play");
}

function addLog(info) {
    document.getElementById("log").innerHTML =  info + "\n" + document.getElementById("log").innerHTML;
}

document.addEventListener('DOMContentLoaded', async () => {

    try {
        let heroQuery = `
            SELECT h.hero_id, h.class_id, h.name, pv, COALESCE(mana, 0) as mana, strength, initiative, COALESCE(armor_bonus, 0) AS armor, xp
            FROM Hero h
            JOIN Hero_list hl ON h.hero_id = hl.hero_id
            JOIN Account a ON a.account_id = hl.account_id
            LEFT JOIN Armor a2 ON a2.armor_id = h.armor_id
            WHERE h.name = '${document.getElementById("heroValue").innerHTML}' 
            AND a.name = '${document.getElementById("userValue").innerHTML}';
        `;
        let hero_stat = await fetchData(heroQuery);
        hero = new Hero(
            hero_stat.hero_id, hero_stat.class_id, hero_stat.name, hero_stat.pv, hero_stat.mana,
            hero_stat.strength, hero_stat.initiative, hero_stat.armor, 0, hero_stat.xp
        );

        let monsterQuery = `
            SELECT m.monster_id, m.name, m.pv, COALESCE(m.mana, 0) as mana, m.strength, m.initiative, m.xp
            FROM Hero h
            JOIN Hero_list hl ON h.hero_id = hl.hero_id
            JOIN Account a ON a.account_id = hl.account_id
            JOIN Encounter e ON e.chapter_id = h.chapter_id
            JOIN Monster m ON m.monster_id = e.monster_id
            WHERE h.name = '${document.getElementById("heroValue").innerHTML}' 
            AND a.name = '${document.getElementById("userValue").innerHTML}';
        `;
        let monster_stat = await fetchData(monsterQuery);
        monster = new Monster(
            monster_stat.monster_id, monster_stat.name, monster_stat.pv, monster_stat.mana,
            monster_stat.strength, monster_stat.initiative, monster_stat.xp
        );
        updateData();

        jeu()
    } catch (error) {
        console.error(error);
    }
});