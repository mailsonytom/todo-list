<?php include 'connect.php'?>
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
$id = $_GET['id'];
$sql = "UPDATE new_todo SET current_status='1' WHERE id=$id";
if(mysqli_query($conn, $sql)){
    echo '<script type="text/javascript">
                    window.location = "done.php"
                </script>';
}
?>