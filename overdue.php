<?php include 'connect.php' ?>
<?php

session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}
else{
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>
        Todo list
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">To-Do List</a>
        <a href="signin.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign out</button>
        </a>
    </nav>
    <div class="container-fluid">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" href="incomplete.php">Incomplete</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="overdue.php"> Overdue</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="done.php">Done</a>
            </li>

        </ul>
        <div class="list-group mt-2">
        <?php
                $compare_time = strtotime(date('Y-m-d', time()). '00:00:00');
                $sql = "SELECT * FROM new_todo";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_assoc($result)){
                    if($row['due_date'] < $compare_time && $row['user_id']==$user_id){
                        echo '<button type="button" class="list-group-item list-group-item-action">'.$row['to_do'].'</button>';
                    
                    }
                }
            ?>
        </div>

    </div>
</body>
</html>