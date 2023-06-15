// const nombre = 5;
// let fact = 1;

// for(let i=1; i <=nombre; i++){
    
//     fact = fact * i ;
//         }

// console.log("Factorielle " + nombre + " = " + fact);


// const rayon = 5 ;
// const pi = 3.14 ;

// let peri =  2 * pi * rayon  ;

// console.log("L'aire est de  " + peri );



// const Ville1 = {
//     nom : "Paris",
//     lat : 48.8534 ,
//     long : 2.3488
// };

// const Ville2 ={
//     nom : "Bordeaux",
//     lat : 44.8333 ,
//     long : -0.5667
// }

// const Ville3 ={
//     nom : "Dunkerque",
//     lat : 51.035 ,
//     long : 2.378
// };

// const tab = [Ville1, Ville2, Ville3] ;

// function affichageCoord(){
// for(let indice of tab ){

//    console.log(`----${indice.nom}----\nlat :${indice.lat}\nlong : ${indice.long}\n`)
// }}
const notes = [5, 10, 15, 20] ;

// function calculMoyenne(notes){
//  for(let i = 0; i <notes.length; i++){

//     sum = notes[i] + sum;
//     moy = sum / notes[i].length ;
//     message = "La moyenne est de " + moy;
//  }
// }
// console.log(calculMoyenne());
// affichageCoord();



const poids = 76 ;
const taille = 176 ;


function calculImc(){

const imc = poids / (taille * taille);
let message = "Votre IMC est de " + imc ;
return message ;
}

console.log(calculImc()) ;











