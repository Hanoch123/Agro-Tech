<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$conn = new mysqli('localhost','root','','FF');
if($conn->connect_error){
   die('Connection Failed : '.$conn->connect_error);
}else{
    if(isset($_POST['send'])){
    $stmt = $conn->prepare("insert into contact(name,email,subject,message)values(?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo '<script type="text/JavaScript">alert("Thanks for the feedback!");document.location.href="Afterlogged.html"</script>';
}
}
?>