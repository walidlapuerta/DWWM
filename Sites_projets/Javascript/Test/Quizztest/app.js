let screenWelcome = document.getElementById("welcomescreen");
let screenQuestion = document.getElementById("questionscreen");
let screenResult = document.getElementById("resultscreen");

function Quiz(){
    this.questions = [] ;
    this.nbCorrects = 0;
    this.indexCurrentQuestion = 0 ;

    this.addQuestion = function(question){
        this.questions.push(question);
    }

    this.showCurrentQuestion = function(){

        if(this.indexCurrentQuestion < this.questions.length){
        this.questions[this.indexCurrentQuestion].getElement(
        this.indexCurrentQuestion+1, this.questions.length);
    }
        else{
            screenQuestion.classList.add("hidden");


            let elNbCorrects = document.querySelector("#nbcorrects");
            elNbCorrects.textContent = quiz.nbCorrects;

            screenResult.style.display = "block" ;

            
        }
    }

} 

function Question (title, answers, answerCorrect)  {

    this.title = title ;
    this.answers = answers ;
    this.answerCorrect = answerCorrect ;

    this.getElement = function(indexQuestion, nbQuestions) {

        let questionNumber = document.createElement("h2");
        questionNumber.classList.add("quiz__subtitle");
        questionNumber.textContent = "Question " + indexQuestion + "/" + nbQuestions ;
        console.log(questionNumber);

        screenQuestion.append(questionNumber);

        let questionTitle = document.createElement("h3");
        questionTitle.textContent = this.title;
        screenQuestion.append(questionTitle);


        let questionAnswers = document.createElement("ul");
        questionAnswers.classList.add("question__answers");


        this.answers.forEach((answer, index) =>{

        let elAnswer = document.createElement("li");
        elAnswer.classList.add("answer");
        elAnswer.textContent = answer;
        elAnswer.id = index + 1 ;
        elAnswer.addEventListener("click", this.checkAnswer)

        questionAnswers.append(elAnswer);
        })

        
        screenQuestion.append(questionAnswers);

    }

// fonction pour ajouter une réponse grâce au push
    this.addAnswer = function(answer){
        // this.answers[this.answers.length] = answer ;
        this.answers.push(answer);
       },

// fonction afin d'écouter l'événement qui se passe lors du click sur la réponse
       this.checkAnswer = (event) => {

        console.log(event.target);
        let answerSelected = event.target ;
        console.log(this.answerCorrect);

        if(this.isCorrectAnswer(answerSelected.id)){
            answerSelected.classList.add("answer--correct");
            quiz.nbCorrects++ ;
        }
        else{
    // Dans le cas où la réponse n'est pas correcte
            answerSelected.classList.add("answer--wrong");

            let elRightAnswer = document.getElementById(this.answerCorrect);
            elRightAnswer.classList.add("answer--correct");

        }

        setTimeout(function(){
            screenQuestion.textContent = '';
            quiz.indexCurrentQuestion++ ;
            quiz.showCurrentQuestion();
        }, 500)
       }


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

let question1 = new Question("Combien d'animaux arrivent à manger avec leur queue ?",
 ["Aucun", "Un seul, l'ornithorynque", "Une vingtaine d'espèces de marsupiaux", "Tous ceux qui en ont une"], 4);
quiz.addQuestion(question1);


let question2 = new Question("Quel est le fromage préféré de Brigitte Macron ?",
 ["Le cheddar", "Le roquefort", "Le camembert président"], 3);
quiz.addQuestion(question2);


let question3 = new Question("Qu'est ce qui est jaune et qui attends ?", 
["Jonathan", "Homer Simpson", "Un citron dans une gare"], 3);
quiz.addQuestion(question3);

let question4 = new Question("Qu'allume Johnny ?", 
["La lumière", "Le gaz", "Le fuego"], 3);
quiz.addQuestion(question4);

let question5 = new Question("Qui a dit : Je pense donc je suis ?", 
["Paquet de cartes", "Mc Solaar", "Descartes", "Booba"], 3);
quiz.addQuestion(question5);

let question6 = new Question("Pourquoi il n'y a que 2 places dans la Ferrari ?", 
["Parce que quand tu fais des sous tu perds des amis", "Jsais pô j'ai une twingo", "Bah parce que ça coute cher"], 1);
quiz.addQuestion(question6);

let question7 = new Question("Qui a les cramptés ?", 
["David Cramptés", "Jean Pierre Cramptés", "Squeezie cramptés", "Emmanuel Cramptés"], 4);
quiz.addQuestion(question7);

let question8 = new Question("T'as dit quoi ???", 
["Feur", "Nan rien", "QUOICOUBEEEEEHHH !!!!!", "T'as les cramptés"], 3);
quiz.addQuestion(question8);


console.log(quiz);



// association avec le HTML ->

// let elNbCorrects = document.getElementById("nbcorrects");

// let elNbCorrects = document.querySelector("#nbcorrects");
// console.log(elNbCorrects);

// textcontent = propriété qui permet de récupérer uniquement le texte contenu dans un élément html
// INNERHTML = récupére TOUT le contenu html dans la balise
// console.log(elNbCorrects.textContent);
// elNbCorrects.textContent = quiz.nbCorrects;

// 2.0 Plus besoin de ce code ici car ajouté dans une fonction pour la fonction showCurrentQuestion au début


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
    // 1. screenWelcome.style.display = "none";
    screenWelcome.classList.add('hidden');
    screenQuestion.style.display = "block" ;

    quiz.showCurrentQuestion();

}

let welcomebtn = document.getElementById('welcomebtn');
welcomebtn.addEventListener("click", seeFirstQuestion);

