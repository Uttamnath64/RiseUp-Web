<?php
class Feed extends Controller {
    public function __construct() {
        //$this->Home();
    }

    public function Dashboard() {
        $this->isLoggedIn(2);
        $this->home = $this->model('home');
        $data = [
            'File' => 'Home.php',
            'Home_Data' => $this->home->getHomeAllData()
        ];

        $this->view($data);
    }
    public function Search() {
        $this->Search = $this->model('Search');
        $data = [
            'File' => 'Articles.php',
            'Articles' => $this->Search->mainSearchBar()
        ];

        $this->view($data);
    }
    public function Articles() {
        $this->isLoggedIn(2);
        $this->Articles = $this->model('Articles');
        $data = [
            'File' => 'Articles.php',
            'Articles' => $this->Articles->getArticlesList()
        ];

        $this->view($data);
    }
    public function Article($data) {
        $this->isLoggedIn(2);
        $this->Article = $this->model('Article');
        $data = [
            'File' => 'Article.php',
            'Article' => $this->Article->getArticleData($data),
            'Category' => $this->Article->getCategory()
        ];

        $this->view($data);
    }
    public function Customisation() {
        $this->isLoggedIn(2);
        $this->Customisation = $this->model('Customisation');
        $data = [
            'File' => 'customisation.php',
            'Data' => $this->Customisation->getCountryList(),
            'Customisation_Data' => $this->Customisation->getChannelData()
        ];

        $this->view($data);
    }
    public function Analytics() {
        $this->isLoggedIn(2);
        $this->Analytics = $this->model('Analytics');
        $data = [
            'File' => 'Analytics.php',
            'Analytics' => $this->Analytics->getAllAnalytics()
        ];

        $this->view($data);
    }

    public function Comments() {
        $this->isLoggedIn(2);
        $this->Comments = $this->model('Comments');
        $data = [
            'File' => 'Comments.php',
            'Comments' => $this->Comments->getAllComments()
        ];

        $this->view($data);
    }
    public function theme() {
        if ($_SESSION['Theme'] == 1) {
            $_SESSION['Theme'] = 0;
        }else{
            $_SESSION['Theme'] = 1;
        }
        header("location: /feed/Dashboard");
    }
    public function signin() {
        $this->isLoggedIn(1);
        $data = [
            'File' => 'SignIn.php'
        ];

        $this->view($data);
    }
}
