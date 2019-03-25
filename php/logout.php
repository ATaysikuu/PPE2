<?php
    session_start(); //create session
    session_unset(); //unset session variables
    session_destroy(); //destroy session cookies
    //echo '<script>document.location="index.php"</script>'; //send user back to /
    header("Location: /");
?>