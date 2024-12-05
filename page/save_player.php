<?php
$conn = new mysqli("localhost", "g95200tg_bd", "Harden13!", "g95200tg_bd");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $playerName = $_POST["player_name"];
  $sql = "INSERT INTO users (name, score) VALUES ('$playerName', 0)";
  if ($conn->query($sql) === TRUE) {
    echo "success";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
