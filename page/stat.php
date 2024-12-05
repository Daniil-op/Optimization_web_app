<?php
$conn = new mysqli("localhost", "g95200tg_bd", "Harden13!", "g95200tg_bd");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT id, name, score, created_at, upgrade_at FROM users";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="title">Statement Summary</title>
    <style>
        body {
          margin: 0;
          padding: 0;
          background-image: linear-gradient(90deg, #3B8AF1, #569AF3, #3B8AF1);
          display: flex;
          flex-direction: column;
          min-height: 100vh;
        }
        
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
            color: #fff;
            font-family: 'Roboto', sans-serif;
            font-weight: 600;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            background-image: linear-gradient(90deg, #3B8AF1, #569AF3, #3B8AF1);
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #fff;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }

        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.25;
        }
    </style>
</head>
<body>
    <table>
        <caption>Statement Summary</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Score</th>
                <th scope="col">Created At</th>
                <th scope="col">Upgrade At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td data-label='ID'>" . $row["id"] . "</td>";
                    echo "<td data-label='Name'>" . $row["name"] . "</td>";
                    echo "<td data-label='Score'>" . $row["score"] . "</td>";
                    echo "<td data-label='Created At'>" . $row["created_at"] . "</td>";
                    echo "<td data-label='Upgrade At'>" . $row["upgrade_at"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
