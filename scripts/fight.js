let hero;
let monster;

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
    
    if (initHero > initMonster) {
        addLog("joueur agit en premier");
    } else {
        addLog("monstre agit en premier");
    }
}

function addLog(info) {
    document.getElementById("log").innerHTML = document.getElementById("log").innerHTML  + info + "<br>";
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