<?php
    $searchTerm = $_GET['term'];
    $termLength = strlen($_GET['term']);
    $keywordUrL = "https://api.themoviedb.org/3/search/keyword?api_key=<<apikey>>&query=$searchTerm";
    print_r($_GET['term']);
    echo "<br>";
    echo "$termLength";
    echo "<br>";
    $test = file_get_contents($keywordUrL, false, null, 30, 30);
    $idNumber = filter_var($test, FILTER_SANITIZE_NUMBER_FLOAT);
    echo $idNumber;
    $movieUrl = "https://api.themoviedb.org/3/discover/movie?api_key=<<apikey>>&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate&with_keywords=$idNumber";
    $movieSearch = file_get_contents($movieUrl);
    echo $movieSearch;
?>