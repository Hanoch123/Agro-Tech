<?php
    session_start();
    session_destroy();
    echo '<script type="text/JavaScript">alert("Successfully Logged Out!");document.location.href="Main.html"</script>';
?>