// const notes = [5,10,15,20];
// console.log(notes);

// // fonction pop supprime le dernier élément de la pile du tableau
// notes.pop();
// console.log(notes);

// // fonction push qui ajoute des éléments au tableau
// notes.push(17,16);
// console.log(notes);

// // fonction map permet de récupérer un tableau et d'apporter des modifs en retournant un nouveau tableau
// // const notes2 = notes.map(function(note){
//     // fonction pour mettre le résultat au carré, même chose avec le "**"/carré ou cube ou plus
//     // return Math.pow(note,2); 
//     // return note ** 3;
// // });

// console.log(notes2);

// // fonction findIndex pour récupérer la note 15

// const index = notes.findIndex(function(note){

//     return note === 15;
// });
// console.log(index);



// const etudiants = [
//     ["riri", 5,10,15,20],
//     ["fifi", 15,12,8,14],
//     ["loulou", 2,11,18,20],
// ];

// const valeur = etudiants.find.find(function(etu){
//     return etu[0] === "fifi";
// });
// console.log(valeur);


// Exo 1
const notes = [5,10,15,20];
for (const [position, value] of Object.entries(notes)) {
    console.log(`Note ${position} : ${value}`);
  }


//   Exo 2
const notes2 = notes.map(function(note){
    console.log(Math.pow(note,2)) ; 
});


// Exo 3

const etudiants = [
        {nom : "riri", age : 25},
        {nom : "fifi", age : 23},
        {nom : "loulou", age : 22},
        {nom : "titi", age : 24},
    ];


function suppPersonne(etudiants, nom){

    for (let i = 0; i < etudiants.length; i++) {
        if (etudiants[i].nom === nom) {
            etudiants.splice(i, 1);
          return etudiants;
        }
      }
      return "Entrez un élève existant";

}

console.log(suppPersonne(etudiants, "loulou"));


  
  





