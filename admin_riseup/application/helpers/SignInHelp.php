<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['User_Id'])) {
            return true;
        } else {
            return false;
        }
    }
