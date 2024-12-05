<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style_quiz.css">
  <link rel="icon" href="/template/assets_index/logo.svg" type="image/x-icon"> <!--Иконка для страницы-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>LaboratoryISP</title>
</head>
<body>
<?php
$conn = new mysqli("localhost", "g95200tg_bd", "Harden13!", "g95200tg_bd");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, tittle, question_1, question_2, question_3, answer, image FROM questions";
$result = $conn->query($sql);
$correctAnswers = 0;
?>
<div class="login-box" id="player-form" style="display: block">
  <h2>Здравствуйте! Введите ваше имя)</h2>
  <form id="player-form-submit" method="post" action="start_game.php">
  <div class="user-box">
    <input type="text" id="player_name" name="player_name" required>
    <label for="player_name">Имя</label>
  </div>
  <div class="container-button">
  <input id="start" type="submit" value="Начать игру!">
  <input onclick="location.href='http://g95200tg.beget.tech/page/stat.php'" id="start" type="submit" value="Результаты">
  <input onclick="location.href='http://g95200tg.beget.tech'" id="start" type="submit" value="Вернуться на главную">
  </div>
</form>
</div>

<div id="quiz-container" style="display: none;">
  <div class="container">
    <div class="card-stat">
      <button onclick="location.href='http://g95200tg.beget.tech'" class="circle"></button>
      <div class="timer-container">
          <div class="circle-timer"></div>
          <div id="timer">30</div>
      </div>
      <div class="heart-block">
        <i class="fas fa-heart"></i>
        <span id="correct-answers-count" class="count">0</span>
      </div>
    </div>
  </div>

  <?php
if ($result->num_rows > 0) {
    $i = 1;
    while($row = $result->fetch_assoc()) {
        echo "<div class='question' data-question-id='$i' data-correct-answer='" . $row["answer"] . "'>";
        echo "<div class='question-container'>";
        echo "<img src='" . $row["image"] . "' alt='Question Image' style='width: 300px; height: 200px; display: block; margin: 0 auto; border-radius: 10px;'>";
        echo "<p class='question-text' style='text-align: center; color: #ccc; font-size: 20px; font-family: Arial, sans-serif;'>Вопрос $i из 10</p>";
        echo "<p class='question-title' style='text-align: center; color: #fff; font-size: 25px; font-family: Arial, sans-serif;'>" . $row["tittle"] . "</p>";
        echo "</div>";
        echo "<div class='input-container'>";
        for ($j = 1; $j <= 3; $j++) {
            echo "<label class='answer-label_$j'>";
            echo "<input type='radio' name='answer' value='$j'>";
            echo "<p style='color: #3B8AF1; font-weight: bold'>" . $row["question_$j"] . "</p>";
            echo "</label>";
        }
        echo "</div>";
        echo "</div>";
        $i++;
    }
} else {
    echo "0 results";
}
?>
</div>

<script>
let timerInterval;
let timeLeft = 30;
let correctAnswers = 0;
let playerName = "";

function startTimer() {
  clearInterval(timerInterval);
  timeLeft = 30;
  document.getElementById('timer').textContent = timeLeft;
  timerInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
  timeLeft--;
  document.getElementById('timer').textContent = timeLeft;

  if (timeLeft < 0) {
    clearInterval(timerInterval);
    autoSelectAnswer();
  }
}

function showQuestion(questionId) {
  // Hide all questions
  document.querySelectorAll('.question').forEach(function(question) {
    question.style.display = 'none';
  });

  // Show the current question
  document.querySelector('.question[data-question-id="' + questionId + '"]').style.display = 'block';
  startTimer(); // Reset the timer
}

function selectAnswer(element) {
  var currentQuestion = element.closest('.question');
  var correctAnswer = currentQuestion.getAttribute('data-correct-answer');
  var selectedAnswer = element.querySelector('input[type="radio"]').value;

  if (selectedAnswer == correctAnswer) {
    correctAnswers++;
    document.getElementById('correct-answers-count').textContent = correctAnswers;
  }

  var nextQuestionId = parseInt(currentQuestion.getAttribute('data-question-id')) + 1;

  if (nextQuestionId <= <?php echo $result->num_rows; ?>) {
    showQuestion(nextQuestionId);
  } else {
    // Handle quiz completion
    sendResults();
  }
}

function autoSelectAnswer() {
  var currentQuestion = document.querySelector('.question[style="display: block;"]');
  var firstAnswerLabel = currentQuestion.querySelector('.answer-label_1 input[type="radio"]');
  firstAnswerLabel.checked = true;
  selectAnswer(firstAnswerLabel.parentElement);
}

function sendResults() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "save_score.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert("Your score has been saved!");
      window.location.href = "quiz.php";
    }
  };
  xhr.send("player_name=" + playerName + "&score=" + correctAnswers);
}

document.addEventListener("DOMContentLoaded", function() {
  const urlParams = new URLSearchParams(window.location.search);
  const startParam = urlParams.get('start');
  const playerNameParam = urlParams.get('player_name');

  if (startParam === 'true' && playerNameParam) {
    playerName = playerNameParam;
    document.getElementById('player-form').style.display = 'none';
    document.getElementById('quiz-container').style.display = 'block';
    showQuestion(1);
  }

  // Add event listeners to radio buttons only once
  document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
    radio.addEventListener('click', function() {
      selectAnswer(this.parentElement);
    });
  });
});
</script>
</body>
</html>
