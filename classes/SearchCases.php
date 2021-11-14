<?php
    class SearchCases {

        public $term;

        public function __construct($term) {
            $this->term = $term;
        }

        public function getSearch($term){
            $searchTerm = strtolower($term);
            if($this->getGenre($searchTerm) != false){
                $searchId = $this->getGenre($searchTerm);
                $genreSearch = "https://api.themoviedb.org/3/discover/movie?api_key=&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_genres=$searchId&with_watch_monetization_types=flatrate";
                $movieSearch = file_get_contents($genreSearch, true);
            } else if (is_numeric($searchTerm)){
                $yearSearch = "https://api.themoviedb.org/3/discover/movie?api_key=&language=en-US&sort_by=popularity.asc&include_adult=false&include_video=false&page=1&primary_release_year=$searchTerm&with_watch_monetization_types=flatrate";
                $movieSearch = file_get_contents($yearSearch, true);
            } else {
                $keywordId = $this->getKeywordId($term);
                $movieUrl = "https://api.themoviedb.org/3/discover/movie?api_key=&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate&with_keywords=$keywordId";
                $movieSearch = file_get_contents($movieUrl, true);
            }

            $movieArray = array($movieSearch);
            $json_data = json_decode($movieSearch, true);

            return $json_data;
        }

        public function getGenre($term){
            switch($term){
                case "adventure":
                    return 12;
                case "fantasy":
                    return 14;
                case "animation":
                    return 16;
                case "drama":
                    return 18;
                case "horror":
                    return 27;
                case "action":
                    return 28;
                case "comedy":
                    return 35;
                case "history":
                    return 36;
                case "western":
                    return 37;
                case "thriller":
                    return 57;
                case "crime":
                    return 80;
                case "documentary":
                    return 99;
                case "science fiction":
                    return 878;
                case "mystery":
                    return 9648;
                case "music":
                    return 10402;
                case "romance":
                    return 10749;
                case "family":
                    return 10751;
                case "war":
                    return 10752;
                case "tv movie":
                    return 10770; 
                default:
                    return false;    
            }
        }

        public function getKeywordId($term){
            $keywordUrL = "https://api.themoviedb.org/3/search/keyword?api_key=&query=$$term";
            @$test = file_get_contents($keywordUrL, false, null, 30, 30);
            $idNumber = filter_var($test, FILTER_SANITIZE_NUMBER_FLOAT);
            return $idNumber;
        }

        public function genreCheck($genre){
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
        
        
        public function favoriteButton($id){
            echo "<script>alert('$id')</script>";
        }

        public function setFavorite($id){

            //if(isset($_COOKIE)){
            //    $i++;
            //} else {
            //setcookie("Fav Movie",$id, 2147483647);
            //}
        }
    }
?>