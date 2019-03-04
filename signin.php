<?php include 'connect.php' ?>
<?php
$username = $password = "";
if(isset($_POST)){
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user_credentials WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if($row=mysqli_fetch_assoc($result)){
        if(password_verify($password, $row['password'])){
            echo '<script type="text/javascript">
                    window.location = "todo.html"
                </script>';
        }
    }
    else{
        echo "Wrong username or password. <a href='index.html'Click here to login again.</a>";  
    }
}
?>