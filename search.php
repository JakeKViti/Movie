<?php
    echo"<pre>";
    $searchTerm = $_GET['term'];
    $termLength = strlen($_GET['term']);
    $keywordUrL = "https://api.themoviedb.org/3/search/keyword?api_key=&query=$searchTerm";
    print_r($_GET['term']);
    echo "<br>";
    echo "$termLength";
    echo "<br>";
    $test = file_get_contents($keywordUrL, false, null, 30, 30);
    $idNumber = filter_var($test, FILTER_SANITIZE_NUMBER_FLOAT);
    $movieUrl = "https://api.themoviedb.org/3/discover/movie?api_key=&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate&with_keywords=$idNumber";
    $movieSearch = file_get_contents($movieUrl, true);
    $movieArray = array($movieSearch);


    $json_data = json_decode($movieSearch, true);
    //print_r($json_data['results'][0]);

    for($i = 0; $i <= count($json_data['results']); $i++){
        @print_r($json_data['results'][$i]['original_title']);
        echo " ";
        @print_r($json_data['results'][$i]['genre_ids']);
        echo " ";
        @print_r($json_data['results'][$i]['release_date']);
        echo "<br>";
    }
    
?>