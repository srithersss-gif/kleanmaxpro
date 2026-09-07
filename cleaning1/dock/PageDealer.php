<?php


trait PageDealer {
    public $current_page = '';
    public $url_params = NULL;
    public $page_title = 'Klean Max';

    //SPECIAL USECASES - Not mandatory
    public $page_bg = '';
    public $page_head_title = '';

    public $page_caption_small = '';
    public $page_caption_main = '';

    public $meta_author = 'Klean Max';
    public $meta_title = '#';
    public $meta_description = "Klean Max";
    public $meta_keywords = 'Klean Max';

    public $page_url = '';
    public $previous_url = '';

    public function urlParam($key) {
        $parts = parse_url($this->page_url);

        if(isset($parts['query'])){
            parse_str($parts['query'], $query);
            return $query[$key];
        }
        return false;
    }

    public function pageKey(){
        switch ($this->current_page){
            case 'index.php':
                return 'HOME_';
                break;
            case 'about.php':
                return 'ABOUT_US_';
                break;
            case 'booking.php':
                return 'APPOINTMENT_';
                break;
        }
    }

    public function renderPageDetails(){

        $full_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http").'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $this->page_url = $full_url;
        $this->previous_url = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:$_SERVER['PHP_SELF'];

        $current = basename($_SERVER['PHP_SELF']);

        $parts = parse_url($full_url);

        if(isset($parts['query'])){
            parse_str($parts['query'], $query);
            $this->url_params = $query;
        }

        $this->current_page = $current;
        switch ($current) {
            case 'contact.php':
                $this->page_title = 'Klean Max';
                $this->meta_description = '';
                $this->meta_keywords = '';
                break;
            case 'gallery.php':
                $this->page_title = 'Klean Max';
                $this->meta_description = '';
                $this->meta_keywords = '';
                break;
            case 'index.php':
                $this->page_title = 'Klean Max';
                $this->meta_description = "";
                $this->meta_keywords = '';
                break;
            case 'about.php':
                $this->page_title = 'Klean Max';
                $this->meta_description = '';
                $this->meta_keywords = '';
                break;
        }

        //For dynamic page uses only
        if(isset($_GET['slug'])){
            $key = $_GET['slug'];
            switch ($key) {
                case 'happy-kids-entrance-landscape':
                    $this->page_title = 'Klean Max';
                    $this->meta_description = '';
                    $this->meta_keywords = '';
                    break;
            }
        }
    }
}