<?php 

include('connect.php');

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$date = date('Y-m-d H:i:s');

$query = "INSERT INTO wiadomosc (imie, email, wiadomosc, data)
 VALUES ('$name', '$email', '$message', '$date')";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<style>
            body{
            background-color:#fff;
            }
            a{
            text-decoration: none;
            color: inherit;
            }
            .btn {
            margin: 1.5rem auto 0 auto;
            padding: 12px 20px;
            border: none;
            background-color: #bb6f11;
            color: #fff;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            }

            .btn:hover {
            background-color: #bc9667;
            }

          </style>";
    echo "<h1>Wiadomość została wysłana</h1>";
    echo "<a href='index.php'><button class='btn'>Powrót</button></a>";
} else {
    echo "Błąd: " . mysqli_error($con);
}

?>