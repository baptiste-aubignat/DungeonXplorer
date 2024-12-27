class Monster {
    constructor(id, name, pv, mana, strength, initiative, xp) {
        this.id = id;
        this.name = name;
        this.pv = pv;
        this.mana = mana;
        this.strength = strength;
        this.initiative = initiative;
        this.xp = xp;
    }

    /**
     * calcule les dégâts d'une attaque
     * @returns dégâts
     */
    calcAttaque () {
        return dee() + this.strength;
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
        return dee() + Math.round((this.strength) / 2);
    }

    takeDamage(dmg) {
        this.pv -= dmg;
        if (this.pv < 0) {
            this.pv = 0;
        }
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

    getXp() {
        return this.xp;
    }

    isDead() {
        return this.pv <= 0;
    }
}