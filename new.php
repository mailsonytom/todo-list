<?php include 'connect.php' ?>
<?php
$todo = $date= "";
if(isset($_POST)){
    $todo = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);;
    $sql = "INSERT INTO user_credentials (firstname, lastname, username, password) VALUES ('$firstname', '$lastname', '$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "You've signed up. <a href='index.html'>Click here to Login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}