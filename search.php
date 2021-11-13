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
    include("classes/SearchCases.php");
    $SearchCases = new SearchCases($_GET['term']);
    $jsonData = $SearchCases->getSearch($_GET['term']);
    print_r($jsonData['results'][0]);
?>

