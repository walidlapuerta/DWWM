// Tableau contenant les questions
let questions = [`Quel est l'âge du capitaine ?
1. 42
2. 101
3. 18`,


`Quel est l'âge du capitaine ?
1. 42
2. 101
3. 18`,


`Quel est l'âge du capitaine ?
1. 42
2. 101
3. 18`,

`Quel est l'âge du capitaine ?
1. 42
2. 101
3. 18`
]

// Utilisation du questions.length afin que le programme affiche la longueur du tableau
// et l'adapte automatiquement par la suite
alert("Bienvenue sur le quiz !" + "\n" + questions.length + " questions vous seront posées");


// Tableau listant les indices des bonnes réponses de chaque questions
let reponses = [1,3,1,4]
// Compteur de bonnes réponses
let compteurBonneRep = 0 ;

// Boucle For afin d'afficher chaque question 
for (let i=0; i<questions.length; i++){

    let intituleQuestion = "Question " + (i+1) + "/" + questions.length + "\n" ;

    let reponseUser = prompt(intituleQuestion + questions[i]);
    console.log(reponseUser);

    if (reponseUser == reponses[i]){
        console.log("Bien ouèj");
        compteurBonneRep = compteurBonneRep+1 ;

    }
    else{
        console.log("T'es éclaté")
    };

}

// Compteur de bonne réponse incrémenté avec le nbre de bonne rep
alert(compteurBonneRep + " réponses sur " + questions.length + " correctes");



