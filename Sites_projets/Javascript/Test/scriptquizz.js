// Questions will be asked
const Questions = [{
    id: 0,
    q: "Quel travail fait ta mère la pute ?",
    a: [{ text: "Prostitué", isCorrect: false },
        { text: "Salope", isCorrect: false },
        { text: "Suce pour un kinder", isCorrect: true },
        { text: "Stripteaseuse", isCorrect: false }
    ]

},
{
    id: 1,
    q: "Wéwéwé la miff ça dit quoi",
    a: [{ text: "Quaresma", isCorrect: false, isSelected: false },
        { text: "Quoicoubeh", isCorrect: true  },
        { text: "Chi", isCorrect: false },
        { text: "Feur", isCorrect: false }
    ]

},
{
    id: 2,
    q: "Finis les paroles : Plus tu parles de moi, plus...",
    a: [{ text: "j'vais te bz ta mère", isCorrect: false },
        { text: "ça me donne la barre", isCorrect: false },
        { text: "j'accélère", isCorrect: true },
        { text: "de dents j'vais te casser", isCorrect: false }
    ]

},

{
    id: 3,
    q: "Finis les paroles : Plus tu parles de moi, plus...",
    a: [{ text: "j'vais te bz ta mère", isCorrect: false },
        { text: "ça me donne la barre", isCorrect: false },
        { text: "j'accélère", isCorrect: true },
        { text: "de dents j'vais te casser", isCorrect: false }
    ]

},
{
    id: 4,
    q: "Finis les paroles : Plus tu parles de moi, plus...",
    a: [{ text: "j'vais te bz ta mère", isCorrect: false },
        { text: "ça me donne la barre", isCorrect: false },
        { text: "j'accélère", isCorrect: true },
        { text: "de dents j'vais te casser", isCorrect: false }
    ]

},
{
    id: 5,
    q: "Finis les paroles : Plus tu parles de moi, plus...",
    a: [{ text: "j'vais te bz ta mère", isCorrect: false },
        { text: "ça me donne la barre", isCorrect: false },
        { text: "j'accélère", isCorrect: true },
        { text: "de dents j'vais te casser", isCorrect: false }
    ]

}

]

// Set start
var start = true;

// Iterate
function iterate(id) {

// Getting the result display section
var result = document.getElementsByClassName("result");
result[0].innerText = "";

// Getting the question
const question = document.getElementById("question");


// Setting the question text
question.innerText = Questions[id].q;

// Getting the options
const op1 = document.getElementById('op1');
const op2 = document.getElementById('op2');
const op3 = document.getElementById('op3');
const op4 = document.getElementById('op4');


// Providing option text 
op1.innerText = Questions[id].a[0].text;
op2.innerText = Questions[id].a[1].text;
op3.innerText = Questions[id].a[2].text;
op4.innerText = Questions[id].a[3].text;

// Providing the true or false value to the options
op1.value = Questions[id].a[0].isCorrect;
op2.value = Questions[id].a[1].isCorrect;
op3.value = Questions[id].a[2].isCorrect;
op4.value = Questions[id].a[3].isCorrect;

var selected = "";

// Show selection for op1
op1.addEventListener("click", () => {
    op1.style.backgroundColor = "lightgoldenrodyellow";
    op2.style.backgroundColor = "lightskyblue";
    op3.style.backgroundColor = "lightskyblue";
    op4.style.backgroundColor = "lightskyblue";
    selected = op1.value;
})

// Show selection for op2
op2.addEventListener("click", () => {
    op1.style.backgroundColor = "lightskyblue";
    op2.style.backgroundColor = "lightgoldenrodyellow";
    op3.style.backgroundColor = "lightskyblue";
    op4.style.backgroundColor = "lightskyblue";
    selected = op2.value;
})

// Show selection for op3
op3.addEventListener("click", () => {
    op1.style.backgroundColor = "lightskyblue";
    op2.style.backgroundColor = "lightskyblue";
    op3.style.backgroundColor = "lightgoldenrodyellow";
    op4.style.backgroundColor = "lightskyblue";
    selected = op3.value;
})

// Show selection for op4
op4.addEventListener("click", () => {
    op1.style.backgroundColor = "lightskyblue";
    op2.style.backgroundColor = "lightskyblue";
    op3.style.backgroundColor = "lightskyblue";
    op4.style.backgroundColor = "lightgoldenrodyellow";
    selected = op4.value;
})

// Grabbing the evaluate button
const evaluate = document.getElementsByClassName("evaluate");

// Evaluate method
evaluate[0].addEventListener("click", () => {
    if (selected == "true") {
        result[0].innerHTML = "True";
        result[0].style.color = "green";
    } else {
        result[0].innerHTML = "False";
        result[0].style.color = "red";
    }
})
}

if (start) {
iterate("0");
}

// Next button and method
const next = document.getElementsByClassName('next')[0];
var id = 0;

next.addEventListener("click", () => {
start = false;
if (id < 2) {
    id++;
    iterate(id);
    console.log(id);
}

})