<?php
$conn = new mysqli("localhost", "g95200tg_bd", "Harden13!", "g95200tg_bd");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $player_name = $_POST['player_name'];

  $sql = "INSERT INTO users (name, score) VALUES ('$player_name', 0)";

  if ($conn->query($sql) === TRUE) {
    // Redirect back to the quiz page with the player's name as a query parameter
    header("Location: quiz.php?start=true&player_name=$player_name");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
