<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','ff');
    if($conn->connect_error){
        die("connection failed : ".$conn->connect_error);
    }
    else{
        if(isset($_POST['signup'])){
        $stmt = $conn->prepare("insert into login(username,email,password) values(?,?,?)");
        $stmt->bind_param("sss",$username,$email,$password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo '<script type="text/JavaScript">alert("Signup Successful");document.location.href="Register.html"</script>';
    }
}
?>