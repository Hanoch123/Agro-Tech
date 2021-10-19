<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = new mysqli('localhost','root','','ff');
    if($conn->connect_error)
    {
        die("Connection Failed : ".$conn->connect_error);
    }else{
        if(isset($_POST['login'])){
        $stmt = $conn->prepare("select * from login where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo '<script type="text/JavaScript">alert("Login Successful");document.location.href="Afterlogged.html"</script>';
            }
            else{
                echo '<script type="text/JavaScript">alert("Invalid Password");document.location.href="Register.html"</script>';
            }
        }else{
            echo '<script type="text/JavaScript">alert("Invalid Username or Password");document.location.href="Register.html"</script>';
        }
    }
}
?>