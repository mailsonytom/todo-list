<?php include 'connect.php' ?>
<?php
$first_name= $last_name = $user_name= $pass_word ="";
if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);;
    $sql = "INSERT INTO user_details (first_name, last_name, user_name, pass_word) VALUES ('$firstname', '$lastname', '$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "You've signed up. <a href='index.html'>Click here to Login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>