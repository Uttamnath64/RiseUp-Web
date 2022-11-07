<?php
class Feed extends Controller {
    public function __construct() {
        //$this->Home();
    }

    public function Home() {
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
            'File' => 'home.php',
            'Home_Data' => $this->Search->mainSearchBar()
        ];

        $this->view($data);
    }
    public function theme() {
        if ($_SESSION['Theme'] == 1) {
            $_SESSION['Theme'] = 0;
        }else{
            $_SESSION['Theme'] = 1;
        }
        header("location: /feed/home");
    }
    public function achievement()
    {
        $this->isLoggedIn(2);
        $this->achievement = $this->model('achievement');
        $data = [
            'File' => 'achievement.php',
            'Achievement_Data' => $this->achievement->getAchievementAllData()
        ];

        $this->view($data);
    }
    public function signin() {
        $this->isLoggedIn(1);
        $data = [
            'File' => 'SignIn.php'
        ];

        $this->view($data);
    }
    public function signup() {
        $this->isLoggedIn(1);
        $this->SignInAndSignUp = $this->model('SignInAndSignUp');
        $data = [
            'File' => 'SignUp.php',
            'Data' => $this->SignInAndSignUp->getCountryList()
        ];
        $this->view($data);
    }
    public function CreateArticle(){
        $this->isLoggedIn(2);
        $this->Post = $this->model('PostData');
        $data = [
            'File' => 'Post_Create.php',
            'Category' => $this->Post->getCategory()
        ];
        $this->view($data);
    }
    public function library($data){
        $this->isLoggedIn(2);
        $this->library = $this->model('library');
        $data = [
            'File' => 'library.php',
            'librarydata' => $this->library->getLibraryAllDataView($data)
        ];
        $this->view($data);
    }
    public function joined($data){
        $this->isLoggedIn(2);
        $this->joined = $this->model('joined');
        $data = [
            'File' => 'joined.php',
            'Joined_Data' => $this->joined->getJoinedAllDataView($data)
        ];
        $this->view($data);
    }
    public function notification($data){
        $this->isLoggedIn(2);
        $this->library = $this->model('notification');
        $data = [
            'File' => 'notification.php',
            'Notification_Data' => $this->library->getJoinedAllDataView($data)
        ];
        $this->view($data);
    }
    public function article($data){
        $this->Post = $this->model('PostData');
        $data = [
            'File' => 'post.php',
            'Comments_List' => $this->Post->getAllCommentsByPost($data),
            'postdata' => $this->Post->getPostAllData($data)
        ];
        $this->view($data);
    }

    public function channel($data){
        $this->Channel = $this->model('Channel');
        $data = [
            'File' => 'Channel.php',
            'ChannelData' => $this->Channel->getChannelAllDataView($data)
        ];
        $this->view($data);
    }
}
