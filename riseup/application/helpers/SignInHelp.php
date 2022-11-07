<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['User_Id'])) {
            return true;
        } else {
            return false;
        }
    }
    function getdata() {
        require_once '../application/controllers/SignInAndUp.php';
        $SignInAndUp = new SignInAndUp();
        return $SignInAndUp->getUserData();
    }
