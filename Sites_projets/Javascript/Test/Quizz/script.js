const quizData = [
    {
        question : "Qui utilise ChatGPT ?",
        a : "Walid EL ASRI" ,
        b : "Fred GRUWE" ,
        c : "T-block & Shrek" ,
        d : "Kesary PAVADAY cette tricheuse" ,
        correct: "c",
    },

    {
        question : "Qui est le plus moche ?",
        a : "Walid EL ASRI" ,
        b : "Walid GRUWE" ,
        c : "Walid MILIEN" ,
        d : "Walid PAVADAY" ,
        correct: "a",
        
    },
    {
        question : "Qui est le plus intelligent ?",
        a : "Walid EL ASRI" ,
        b : "Walid GRUWE" ,
        c : "Walid MILIEN" ,
        d : "Walid PAVADAY" ,
        correct: "d",

    },

    {
        question : "Qui est le plus puant ?",
        a : "Walid EL ASRI" ,
        b : "Walid GRUWE" ,
        c : "Walid MILIEN" ,
        d : "Walid PAVADAY" ,
        correct: "b",

    }
];

const quiz = document.getElementById('quiz');
const reponseEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const d_text = document.getElementById('d_text');
const submitBtn = document.getElementById('submit');

let currentQuiz = 0 ;
let score = 0 ;

chargeQuiz();

function chargeQuiz(){
    deselectReponse();

    const currentQuizData = quizData[currentQuiz];

    questionEl.innerText = currentQuizData.question ;
    a_text.innerText = currentQuizData.a ;
    b_text.innerText = currentQuizData.b ;
    c_text.innerText = currentQuizData.c ;
    d_text.innerText = currentQuizData.d ;
}

function deselectReponse(){

    reponseEls.forEach(reponseEl => reponseEl.checked = false )
}

function getSelected(){
    let reponseEl ;
    reponseEls.forEach(reponseEl =>{

        if(reponseEl.checked){
            answer = reponseEl.id ;
        }
    })

    return answer ;
}

submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    if(answer){
    if(answer === quizData[currentQuiz].correct){
        
    score++;
}

    currentQuiz ++;

    if(currentQuiz < quizData.length){
        chargeQuiz()

    } 
    else {
        quiz.innerHTML = `
        <h2>Vous avez répondu correctement à ${score}/${quizData.length} questions !</h2>
        <button onclick ="location.reload()">Recommencer</button>
        `
    }

}
})
