<?php include 'connect.php' ?>
<?php
$to_do = $date= "";
if(isset($_POST)){
    $to_do = $_POST['todo'];
    $date = $_POST['due'];
    $sql = "INSERT INTO new_todo (to_do, date) VALUES ('$to_do', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "<a href='todo.html'></a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>