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
            $keywordUrL = "https://api.themoviedb.org/3/search/keyword?api_key=136469f073307015b7f82e70f160e679&query=$$term";
            @$test = file_get_contents($keywordUrL, false, null, 30, 30);
            $idNumber = filter_var($test, FILTER_SANITIZE_NUMBER_FLOAT);
            return $idNumber;
        }
    }
?>