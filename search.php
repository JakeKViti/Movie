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
    echo '<table id="myTable" class="tablesorter">';
    $SearchCases->getResults($jsonData);
    echo "</table>";
?>

