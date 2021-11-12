<?php
    $searchTerm = $_GET['term'];
    $keywordURL = "https://api.themoviedb.org/3/search/keyword?api_key=<<apikey>>&query=$searchTerm";
    print_r($_GET['term']);
    echo "<br>";
    $test = file_get_contents($keywordURL);
    echo $test;

?>