<?php
$conn = new mysqli("localhost", "g95200tg_bd", "Harden13!", "g95200tg_bd");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $player_name = $_POST['player_name'];
  $score = $_POST['score'];

  $sql = "UPDATE users SET score = $score WHERE name = '$player_name'";

  if ($conn->query($sql) === TRUE) {
    echo "Score updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
