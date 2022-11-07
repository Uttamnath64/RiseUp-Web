<?php
  class Core {
    protected $currentController = 'Feed';
    protected $currentMethod = 'Home';
    protected $params = [];
    protected $url = [];

    public function __construct(){

      $this->getUrl();
      if(isset($this->url[0])){
      if(file_exists('../application/controllers/' . ucwords($this->url[0]). '.php')){
   
        $this->currentController = ucwords($this->url[0]);
        unset($this->url[0]);
      }
    }

      require_once '../application/controllers/'. $this->currentController . '.php';

      $this->currentController = new $this->currentController;

      if(isset($this->url[1])){

        if(method_exists($this->currentController, $this->url[1])){
          $this->currentMethod = $this->url[1];
          
          unset($this->url[1]);
        }
      }
      $this->params = $this->url ? array_values($this->url) : [];
      call_user_func_array([$this->currentController, $this->currentMethod], array($this->params));
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $this->url = rtrim($_GET['url'], '/');
        $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
        $this->url = explode('/', $this->url);
      }
    }
  }


?>