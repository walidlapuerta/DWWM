
function Quiz(){
    this.questions = [] ;
    this.nbCorrects = 0;

    this.addQuestion = function(question){
        this.questions.push(question);
    }

    this.launch =  function(){

// Pour chacune de mes questions il va venir éxecuter ma fonction(question) qui contient le tab de questions
        this.questions.forEach((question) =>{

            let answerUser = prompt(question.getBody());
            if(question.isCorrectAnswer(answerUser)){
                console.log ("Gagné !")
                this.nbCorrects++ ;
            }
            else{
                console.log("Perdu !");
            }
        })
 
        this.showResults();
    }

    this.showResults = function(){
        let msg = "Résultats :\n" + this.nbCorrects + " réponses sur " + this.questions.length + " correctes !" ; 
        alert(msg);
    }
}

function Question (title, answers, answerCorrect)  {

    this.title = title ;
    this.answers = answers ;
    this.answerCorrect = answerCorrect ;

    this.getBody = function(){
        let body = this.title.toUpperCase() + "\n";

        for(let i=0; i<this.answers.length; i++){
            body += (i+1) + " . " + this.answers[i] + "\n";
        }
        return body;
    },

// fonction pour ajouter une réponse grâce au push
    // this.addAnswer = function(answer){
    //     // this.answers[this.answers.length] = answer ;
    //     this.answers.push(answer);
    //    },

       this.isCorrectAnswer = function(answerUser){
        if(answerUser == this.answerCorrect){
            return true
        }
        else{
            return false
        }
       }
};

let quiz = new Quiz();

let question1 = new Question("Quel est l'âge du capitaine", [42, 101, 18], 1);
quiz.addQuestion(question1);


let question2 = new Question("Quelle est la différence entre un pigeon ?",
 ["Glouuuu", "uh?", "La longueur des pattes"], 3);
quiz.addQuestion(question2);


let question3 = new Question("Qu'est ce qui est jaune et qui attends", 
["Jonathan", "Homer Simpson", "Un citron dans une gare"], 3);
quiz.addQuestion(question3);

console.log(quiz);

// quiz.launch();



// association avec le HTML ->

// let elNbCorrects = document.getElementById("nbcorrects");

let elNbCorrects = document.querySelector("#nbcorrects");
console.log(elNbCorrects);

// textcontent = propriété qui permet de récupérer uniquement le texte contenu dans un élément html
// INNERHTML = récupére TOUT le contenu html dans la balise
console.log(elNbCorrects.textContent);
elNbCorrects.textContent = quiz.nbCorrects;


// *********************

// Fonction qui récupére les class portant le même nom / Uniquement sur les class, impossible de mettre 2 fois le mm id
// let elNbQuestions = document.getElementsByClassName("nbquestions");

// Meme chose que le précèdent
let elNbQuestions = document.querySelectorAll(".nbquestions");
console.log(elNbQuestions);

// Pour chaque élément du texte dans lesquels la class nbquestions est renseignée,
//  il faut que celui-ci fasse la taille du tableau grâce à la boucle For ou ForEach


// for(let i=0; i<elNbQuestions.length;i++){
//     elNbQuestions[i].textContent = quiz.questions.length;
// }


elNbQuestions.forEach(function(elNbQuestion)
{
    elNbQuestion.textContent = quiz.questions.length;

});

// 1. Fonction pour retirer l'écran d'accueil lorsque l'on appuie sur le bouton grâce à l'attribut de style
// 2. Meilleur solution que le premier: cette fois grâce à la fonction classList qui récupérer directement dans le style.css
// la fonction 'hidden' incluse dedans
function seeFirstQuestion(){
    let screenWelcome = document.getElementById("welcomescreen");
    // 1. screenWelcome.style.display = "none";
    screenWelcome.classList.add('hidden');

    let screenQuestion = document.getElementById("questionscreen");
    screenQuestion.style.display = "block" ;

    quiz.showCurrentQuestion();

}

let welcomebtn = document.getElementById('welcomebtn');
welcomebtn.addEventListener("click", seeFirstQuestion);

