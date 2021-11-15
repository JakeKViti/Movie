<?php
    //echo "<script>console.log(\"Hit\")</script>";
    if (isset($_POST['action'])) {
        $movieId = $_POST['action']; 
        setcookie("FavMovie",$movieId, time()+600);
    }
?>