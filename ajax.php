<?php
    //echo "<script>console.log(\"Hit\")</script>";
    if (isset($_POST['title'])) {
        $movieTitle = $_POST['title']; 
        setcookie("title",$movieTitle, time()+600000);
    }
    if (isset($_POST['date'])) {
        $movieDate = $_POST['date']; 
        setcookie("date",$movieDate, time()+600000);
    }
    if (isset($_POST['genre'])) {
        $movieGenre = $_POST['genre']; 
        setcookie("genre",$movieGenre, time()+600000);
    }
?>