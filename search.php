<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movies</title>
</head>
<body>
<div class="indexPage">
        <div class="mainSection">
                <div class="searchContainer">
                    <form action="search.php" method="GET">
                        <input class="searchBox" type="text" name="term">
                        <input class="searchButton" type="submit" value="Search">
                    </form>
                </div>
        </div>
    </div>
</body>
</html>

<?php
    echo"<pre>";
    $searchTerm = $_GET['term'];
    
    $keywordUrL = "https://api.themoviedb.org/3/search/keyword?api_key=&query=$searchTerm";
    print_r($_GET['term']);
    echo "<br>";
    @$test = file_get_contents($keywordUrL, false, null, 30, 30);
    $idNumber = filter_var($test, FILTER_SANITIZE_NUMBER_FLOAT);
    $movieUrl = "https://api.themoviedb.org/3/discover/movie?api_key=&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate&with_keywords=$idNumber";
    $movieSearch = file_get_contents($movieUrl, true);
    $movieArray = array($movieSearch);


    $json_data = json_decode($movieSearch, true);
    //print_r($json_data['results'][0]);

    for($i = 0; $i < count($json_data['results']); $i++){
        @print_r($json_data['results'][$i]['original_title']);
        echo " ";
        //@print_r($json_data['results'][$i]['genre_ids']);
        foreach(@$json_data['results'][$i]['genre_ids'] as $genre){
            switch($genre){
                case 12:
                    echo "Adventure ";
                    break;
                case 14:
                    echo "Fantasy ";
                    break;
                case 16:
                    echo "Animation ";
                    break;
                case 18:
                    echo "Drama ";
                    break;
                case 27:
                    echo "Horror ";
                    break;
                case 28:
                    echo "Action ";
                    break;
                case 35:
                    echo "Comedy ";
                    break;
                case 36:
                    echo "History ";
                    break;
                case 37:
                    echo "Western ";
                    break;
                case 53:
                    echo "Thriller ";
                    break;
                case 80:
                    echo "Crime ";
                    break;
                case 99:
                    echo "Documentary ";
                    break;
                case 878:
                    echo "Science Fiction ";
                    break;
                case 9648:
                    echo "Mystery ";
                    break;
                case 10402:
                    echo "Music ";
                    break;
                case 10749:
                    echo "Romance ";
                    break;
                case 10751:
                    echo "Family ";
                    break;
                case 10752:
                    echo "War ";
                    break;
                case 10770:
                    echo "TV Movie ";
                    break;        
            }
        }
        echo " ";
        @print_r($json_data['results'][$i]['release_date']);
        echo "<br>";
    }
    
?>

