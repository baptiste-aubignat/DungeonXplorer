class Hero {
    constructor(id, class_id, name, pv, mana, strength, initiative, armor, bonus_stength, xp) {
        this.id = id;
        this.class_id = class_id;
        this.name = name;
        this.pv = pv;
        this.mana = mana;
        this.strength = strength;
        this.initiative = initiative;
        this.armor = armor;
        this.bonus_stength = bonus_stength;
        this.xp = xp;
    }

    /**
     * calcule les dégâts d'une attaque
     * @returns dégâts
     */
    calcQttaque () {
        return dee() + this.strength + this.bonus_stength;
    }

    /**
     * calcule l'initiative de l'action
     * @returns initiative finale
     */
    calcInitiative () {
        return dee() + this.initiative;
    }

    /**
     * calcule la défense d'un héro
     * @returns défense
     */
    calcDefense () {
        if (this.class_id == 3) {
            def = this.initiative;
        } else {
            def = this.strength;
        }
        return dee() + Math.round(def / 2) + this.armor;
    }

    toString() {
        return JSON.stringify(this);
    }

    getId() {
        return this.id;
    }

    getName() {
        return this.name;
    }

    getPv() {
        return this.pv;
    }

    getMana() {
        return this.mana;
    }

    getStrength() {
        return this.strength;
    }

    getInitiative() {
        return this.initiative;
    }

    getArmor() {
        return this.armor;
    }

    getBonusStrength() {
        return this.bonus_strength;
    }

    getXp() {
        return this.xp;
    }
}