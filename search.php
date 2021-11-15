<?php
    include("classes/SearchCases.php");
    $SearchCases = new SearchCases($_GET['term']);
    $json_data = $SearchCases->getSearch($_GET['term']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movies</title>
    <link rel="stylesheet" href="/assets/css/theme.default.css">
    <script type="text/javascript" src="assets/js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="assets/js/jquery.tablesorter.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
<div class="indexPage">
        <div class="header">
                <div class="searchContainer">
                    <form action="search.php" method="GET">
                        <input class="searchBox" type="text" name="term">
                        <input class="searchButton" type="submit" value="Search">
                    </form>
                </div>
        </div>
    </div>
    <div class="resultsContainer">
        <table id="myTable" class="tablesorter">
            <thead>    
                <tr>
                    <th>Movie Title</th>
                    <th>Genres</th>
                    <th>Release Date</th>
                    <th>Favorite?</th>
                    <div class="demo">
    
                </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($json_data['results']); $i++){ 
                    $id = $json_data['results'][$i]['id'];
                    echo '<tr>';
                    echo "<th>";
                    @print_r($json_data['results'][$i]['original_title']);
                    echo "</th>";
                    echo "<th>"; 
                    foreach(@$json_data['results'][$i]['genre_ids'] as $genre){
                        $SearchCases->genreCheck($genre);
                    }
                    echo "</th>";
                    echo "<th>";
                    @print_r($json_data['results'][$i]['release_date']);
                    echo "</th>";
                    echo "<th>";
                    
                    echo "<button id=\"favbtn\" value=\"$id\">fav</button>";
                    echo "</th>";
                    echo '</tr>';
                
                    //echo "<button type='button' onclick='$this->favoriteButton($id);'>Favorite Movie!</button>
                
            }
            echo '</tbody>';
            echo "</table>";  
            ?>
            </tbody>
    </div>
</body>
</html>