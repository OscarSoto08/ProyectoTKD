<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taekwondo Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Variables */
:root {
    --primary-color: #c62828; /* Rojo */
    --secondary-color: #ffffff; /* Blanco */
    --background-color: #000000; /* Negro */
    --accent-color: #ffc107; /* Amarillo */
}

/* General */
body {
    font-family: 'Arial', sans-serif;
    color: var(--secondary-color);
    background: var(--background-color);
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

/* Header */
.header {
    background: var(--primary-color);
    padding: 1rem;
    width: 100%;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.header h1 {
    margin: 0;
    font-size: 2rem;
    color: var(--secondary-color);
}

/* Quiz Container */
.quiz-container {
    background: #222;
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    max-width: 600px;
    width: 90%;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
}

.question-section h2 {
    margin: 0;
    color: var(--accent-color);
    font-size: 1.5rem;
}

.question-section p {
    font-size: 1.2rem;
    margin: 1rem 0;
}

/* Answer Buttons */
.answers-section {
    margin-top: 1rem;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.answer-btn {
    background: var(--primary-color);
    color: var(--secondary-color);
    border: none;
    padding: 1rem;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: transform 0.2s, background-color 0.2s;
}

.answer-btn:hover {
    background: var(--accent-color);
    transform: scale(1.05);
}

/* Progress Bar */
.progress-section {
    margin-top: 1rem;
    background: var(--secondary-color);
    height: 10px;
    width: 100%;
    border-radius: 5px;
    overflow: hidden;
}

.progress-bar {
    background: var(--primary-color);
    height: 100%;
    width: 25%; /* Cambiar dinámicamente */
    transition: width 0.3s ease-in-out;
}

/* Timer */
.timer-section {
    margin-top: 1rem;
    font-size: 1.2rem;
    color: var(--accent-color);
}

/* Footer */
.footer {
    margin-top: 2rem;
    text-align: center;
    font-size: 0.9rem;
    color: var(--secondary-color);
}

</style>
<body>
    <header class="header">
        <h1>Taekwondo Quiz</h1>
    </header>
    <main class="quiz-container">
        <div class="question-section">
            <h2 id="level-title">Nivel 1: Cinturón Blanco</h2>
            <p id="question-text">¿Cuál es el significado del cinturón blanco?</p>
        </div>
        <div class="answers-section">
            <button class="answer-btn">Inocencia</button>
            <button class="answer-btn">Sabiduría</button>
            <button class="answer-btn">Poder</button>
            <button class="answer-btn">Velocidad</button>
        </div>
        <div class="progress-section">
            <div class="progress-bar"></div>
        </div>
        <div class="timer-section">
            <span id="timer">15</span> segundos restantes
        </div>
    </main>
    <footer class="footer">
        <p>© 2024 Taekwondo Quiz</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const questionText = document.getElementById("question-text");
    const answerButtons = document.querySelectorAll(".answer-btn");
    const progressBar = document.querySelector(".progress-bar");
    const timer = document.getElementById("timer");

    let currentQuestion = 0;
    let score = 0;
    let timeLeft = 15;

    // Array de preguntas
    const questions = [
        {
            question: "¿Cuál es el significado del cinturón blanco?",
            answers: ["Inocencia", "Sabiduría", "Poder", "Velocidad"],
            correct: 0,
        },
        // Más preguntas aquí...
    ];

    // Función para cargar la pregunta
    function loadQuestion() {
        const current = questions[currentQuestion];
        questionText.textContent = current.question;
        answerButtons.forEach((btn, index) => {
            btn.textContent = current.answers[index];
            btn.onclick = () => checkAnswer(index);
        });
        resetTimer();
    }

    // Verificar respuesta
    function checkAnswer(index) {
        if (index === questions[currentQuestion].correct) {
            score++;
            progressBar.style.width = `${(score / questions.length) * 100}%`;
        }
        nextQuestion();
    }

    // Siguiente pregunta
    function nextQuestion() {
        currentQuestion++;
        if (currentQuestion < questions.length) {
            loadQuestion();
        } else {
            endQuiz();
        }
    }

    // Temporizador
    function resetTimer() {
        timeLeft = 15;
        timer.textContent = timeLeft;
        const timerInterval = setInterval(() => {
            timeLeft--;
            timer.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                nextQuestion();
            }
        }, 1000);
    }

    // Finalizar Quiz
    function endQuiz() {
        questionText.textContent = "¡Quiz terminado! Puntuación final: " + score;
        document.querySelector(".answers-section").style.display = "none";
        document.querySelector(".timer-section").style.display = "none";
    }

    loadQuestion();
});

    </script>
</body>
</html>
