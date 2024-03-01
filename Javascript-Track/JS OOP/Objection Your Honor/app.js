class Person{
    constructor(name , age) {
        this.name = name;
        this.age = age;
    }
}

class Prosecutor extends Person{
    constructor(name , age){
        super(name , age)
    }

    prosecute(defendant , cases){
        defendant.case.title = cases.title;
        defendant.case.ageLimit = {
            minAge: cases.minAge,
            maxAge: cases.maxAge
        }

        if(defendant.age < defendant.case.ageLimit.minAge || defendant.age > defendant.case.ageLimit.maxAge){
            defendant.case.verdict = 'NOT GUILTY';
        }else{
            defendant.case.verdict = 'GUILTY';

            const newDate = new Date("2020-12-17");
            let year = newDate.getFullYear() + cases.years;
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            let month = newDate.getMonth() + cases.months;
            if(month > 12){
                month -= 12;
                year += 1;
            }
            let monthName = monthNames[month];
            let day = newDate.getDate() + cases.days + 1;
            defendant.case.imprisonmentTerm = `${day} ${monthName} ${year}`;
        }
    }
}

class Defendant extends Person{
    constructor(name , age){
        super(name , age);
        this.case = {};
    }
}

class Case{
    constructor(title , years , months , days , minAge , maxAge) {
        this.title = title;
        this.years = years;
        this.months = months;
        this.days = days;
        this.minAge = minAge;
        this.maxAge = maxAge;
    }

    computeReleaseDate(){

    }
}

class TrialCourt{
    static initiateTrial(defendant , prosecutor){
        console.log(`Name: ${defendant.name}`);
        console.log(`Age: ${defendant.age} years old`);
        console.log(`Case Title: ${defendant.case.title}`);
        console.log(`Filed by: ${prosecutor.name}`);
        console.log(`Verdict: ${defendant.case.verdict}`);

        if(defendant.case.verdict === 'GUILTY'){
            console.log(`Release Date: ${defendant.case.imprisonmentTerm}`);
        }
    }
}

// let’s say the imprisonment term for this case is 3 years, 3 months, 3 days
// and the age of someone who can be convicted is between 18 to 75 years old.
let case1 = new Case("Malicious Mischief", 3, 3, 3, 18, 75);
let prosecutor = new Prosecutor ("John", 30);
let defendant1 = new Defendant ("Girlie", 5);

prosecutor.prosecute(defendant1, case1);

TrialCourt.initiateTrial(defendant1, prosecutor);
/*
    Name: Girlie
    Age: 5 years old
    Case Title: Malicious Mischief
    Filed by: John
    Verdict: NOT GUILTY
*/   