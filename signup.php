<?php include 'connect.php' ?>
<?php
$firstname = $lastname = $username = $password = "";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $flag = 0;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $select_query = "SELECT * FROM user_credentials";
    $result = mysqli_query($conn, $select_query);
    while($row=mysqli_fetch_assoc($result)){
        if($row['username'] == $username){
        $flag = 1;
            echo '<script type="text/javascript">
                    window.location = "user_duplicate_error.php"
                    </script>';
        }
    }
    if($flag == 0){
        $sql = "INSERT INTO user_credentials (firstname, lastname, username, password) VALUES ('$firstname', '$lastname', '$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "signin.php"
                    </script>';
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>
        sign-up list
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Todo List</a>
        <a href="signin.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign In</button>
        </a>
    </nav>
    <div class="container">
        <h2 class= " col-md-4 text-center mx-auto"> Register for TO-DO list</h2>
        <form action="" method="POST" class="col-md-8 mx-auto mt-5 px-2 py-2 border border-primary rounded" >
            <div class="form-group">
                <label for="Inputfirstname">First name</label>
                <input type="text" class="form-control" name="firstname" id="Inputfirstname" aria-describedby="nameHelp" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="Inputlastname">Last name</label>
                <input type="text" class="form-control" name="lastname" id="Inputlastname" aria-describedby="nameHelp" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</body>

</html>