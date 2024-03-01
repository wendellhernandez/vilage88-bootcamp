class Note{
    constructor(){
        this.nameList = ['do', 're', 'mi', 'fa', 'sol', 'la', 'ti'];
    }

    getName(){
        return this.name = this.nameList[Math.floor(Math.random() * 7)];
    }

    getPitch(){
        return this.pitch = Math.ceil(Math.random() * 7);
    }

    show(){
        console.log(this.name);
        console.log(this.pitch);
    }
}

class Instrument{
    constructor(){
        this.record = [];
    }

    addNote(name , pitch){
        this.record[this.record.length] = name;
        this.record[this.record.length] = pitch;
    }

    removeLastNote(){
        let newArr = [];
        for(let i=0; i<this.record.length-2; i++){
            newArr[i] = this.record[i];
        }
        this.record = newArr;
    }

    changeNote(index , name , pitch){
        this.record[(index-1)*2] = name;
        this.record[((index-1)*2)+1] = pitch;
    }

    shuffleRecord(){
        for(let i=0; i<this.record.length; i++){
            let index1 = this.pitch = Math.ceil(Math.random() * this.record.length/2)
            let index2 = this.pitch = Math.ceil(Math.random() * this.record.length/2)
            let tempName = this.record[(index1-1)*2];
            let tempPitch = this.record[((index1-1)*2)+1];

            this.record[(index1-1)*2] = this.record[(index2-1)*2];
            this.record[((index1-1)*2)+1] = this.record[((index2-1)*2)+1];
            this.record[(index2-1)*2] = tempName;
            this.record[((index2-1)*2)+1] = tempPitch;
        }
    }

    autoCompose(num){
        this.record = [];

        for(let i=0; i<num; i++){
            this.addNote(note.getName() , note.getPitch());
        }
    }

    showRecord(){
        console.log(this.record);
    }
}

class Piano extends Instrument{
    constructor(brand , model , color){
        super();
        this.brand = brand;
        this.model = model;
        this.color = color;
    }
}

class Xylophone extends Instrument{
    constructor(brand , model , color){
        super();
        this.brand = brand;
        this.model = model;
        this.color = color;
    }
}

let note = new Note();
let piano = new Piano();
let xylophone = new Xylophone();

piano.autoCompose(10);
piano.showRecord();