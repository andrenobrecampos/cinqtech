<?php
    /*
     * App Core Class
     * Creates URL & Loads Core Controller
     * URL FORMAT - /controller/method/params
     */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->getUrl();

            // Look in controllers for first value
            if (file_exists('../app/controllers/' . ucwords($url[0]). '.php')) {
                // If exists, set as controller.
                $this->currentController = ucwords($url[0]);
                // Unset 0 index.
                unset($url[0]);
            }
            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate Controller class.
            $this->currentController = new $this->currentController;
        }

        public function getUrl() {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }