<?php
session_start();
$conn = mysqli_connect("us-cdbr-east-06.cleardb.net","b15ea59dcdac73","def2bd98","heroku_ee628d3fc1a82c3");
if (isset($_POST['signup'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $code = rand(1000,10000000);
    $sql = "INSERT INTO signup(name, location, email, number, username,password,userid) VALUE('$name','$location', '$email', '$number','$username','$password','$code')";
    $result = mysqli_query($conn, $sql);
    $_SESSION['username'] = $row['username'];

    $_SESSION["name"] = $row['name'];

    $_SESSION["userid"] = $row['userid'];

    header("Location: user.php");
}
?>