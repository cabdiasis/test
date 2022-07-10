<?php

$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "store";

$conn = mysqli_connect("us-cdbr-east-06.cleardb.net","b15ea59dcdac73","def2bd98","heroku_ee628d3fc1a82c3");

if (!$conn) {

    echo "Connection failed!";

}



if (isset($_POST['username']) && isset($_POST['password'])) {

    $uname = $_POST['username'];

    $pass = $_POST['password'];

    if (empty($uname)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM signup WHERE username='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $uname && $row['password'] === $pass) {

                $_SESSION['username'] = $row['username'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['userid'] = $row['userid'];

                header("Location: user.php");

                exit();

            }else{

                header("Location: login.php?error=Incorect User name or password");

                exit();

            }
        }

}