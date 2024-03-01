var ninja1 = {
    hp: 100,
    strength: 15,
    attack: function() {
        let damage = Math.ceil(Math.random() * this.strength);
        ninja2.hp -= damage;
        console.log(`Ninja1 attacks Ninja2 and does a damage of ${damage}! Ninja1 health: ${this.hp}. Ninja2 health: ${ninja2.hp}`);
    }
}
var ninja2 = {
    hp: 150,
    strength: 10,
    attack: function() {
        let damage = Math.ceil(Math.random() * this.strength);
        ninja1.hp -= damage;
        console.log(`Ninja2 attacks Ninja1 and does a damage of ${damage}! Ninja1 health: ${ninja1.hp}. Ninja2 health: ${this.hp}`);
    }
}

for(let i=1; i<=10; i++){
    console.log(`===Round ${i}===`);
    ninja1.attack();
    ninja2.attack();
}

if(ninja1.hp > ninja2.hp){
    console.log('Ninja1 WINS!!!!!');
}else{
    console.log('Ninja2 WINS!!!!!');
}