<?php include 'connect.php' ?>
<?php
session_start();
$user_id = $_SESSION['user_id'];
$to_do = $date= "";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $to_do = $_POST['todo'];
    $date = strtotime($_POST['due']);
    $sql = "INSERT INTO new_todo (to_do, due_date, current_status, user_id) VALUES ('$to_do', '$date', '0', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
                    window.location = "incomplete.php"
                </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>
        newtask list
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(238, 238, 238)">
        <a class="navbar-brand" href="#">New task</a>
        <a href="signin.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign out</button>
        </a>
    </nav>
    <div class="container-fluid">
        <div class="row mt-4 ">
            <div class="col-md-10 mx-auto">
                <h6 class="text-primary">Add To-Do </h6>
                <div class="list-group mt-2">
                    <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="10" id="comment" name="todo">
                                </textarea>
                            <input type="date" class="form-control" name="due">
                            <a href="incomplete.php">
                                <input type="submit" />
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>