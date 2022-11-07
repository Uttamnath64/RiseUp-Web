<?php

    class Controller {
        public function model($model) {
            date_default_timezone_set('Asia/Kolkata');
            require_once '../application/models/'. $model .'.php';

            return new $model();
        }

        function number_format_short( $n ) {
            $n_format = "";
                $suffix = '';
            if ($n > 0 && $n < 1000) {
                
                $n_format = floor($n);
                $suffix = '';

            } else if ($n >= 1000 && $n < 1000000) {
                
                $n_format = floor($n / 1000);
                $suffix = 'K';

            } else if ($n >= 1000000 && $n < 1000000000) {
                
                $n_format = floor($n / 1000000);
                $suffix = 'M';

            } else if ($n >= 1000000000 && $n < 1000000000000) {
                
                $n_format = floor($n / 1000000000);
                $suffix = 'B';

            } else if ($n >= 1000000000000) {
                
                $n_format = floor($n / 1000000000000);
                $suffix = 'T';

            }

            return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
        }

        function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0,1); 
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

        public function getDateF($value)
        {
            return date_create($value)->format("M d, Y");
        }

        public function isLoggedIn($data)
        {
            require_once "../application/helpers/SignInHelp.php";
            if ($data == 1) {
                if (isLoggedIn()) {
                    header("location: ".URLROOT."/feed/home");
                }
            }elseif($data == 2){
                if (!isLoggedIn()) {
                    header("location: ".URLROOT."/feed/signin");
                }
            }
        }
        public function view( $data = []) {
            require_once '../application/view/layouts/default/Main.php';
        }

        public function getRandUrl($size)
        {
            $main_str = "ZXCVBNMASDFGHJKLQWERTYUIOPzxcvbnmasdfghjklqwertyuiop_-1234567890";
            $len_main_str=strlen($main_str);
            $RandUrl = "";
            for ($i=0; $i < $size ; $i++) { 
                $RandUrl .= $main_str[rand(0 , $len_main_str-1)];
            }
            return $RandUrl;
        }

        public function getRandData($data_array,$size)
        {
            $data_array_size=count($data_array);
            $data_rand_array = array();
            for ($i=0; $i < $size ; $i++) { 
                $data_rand_array[$i] = $data_array[rand(0 , $data_array_size-1)];
            }
            return $data_rand_array;
        }

        public function imageMoveDatabase($tmp_name,$new_img_name)
        {
            if (move_uploaded_file($tmp_name,"E:/xampp/htdocs/riseup/public/images/".$new_img_name)) {
                return true;
            }else{
                return false;
            }
        }
        public function convart_Output($value)
        {
        $value = $value." \0 ";
        $data = "";
        $data .= "<div>";
        $btag = "";
        $pretag = "";
        if ($value != "") {
            for ($i=0; $i <= strlen($value)-1; $i++) { 
                if ($value[$i] == "*" && $value[$i+1] == "*") {
                    if ($btag == "") {
                        $data .= "<b>";
                        $btag = "1";
                    }else{
                        $data .= "</b>";
                        $btag = "";
                    }
                    $i =$i+1;
                }elseif ($value[$i] == "`" && $value[$i+1] == "`" && $value[$i+2] == "`") {
                    if ($pretag == "") {
                        $data .= '<pre class="lit-code-pre"><code>';
                        $pretag = "1";
                    }else{
                        $data .= "</code></pre>";
                        $pretag = "";
                    }
                    $i =$i+2;
                }elseif ($value[$i] == "h" && $value[$i+1] == "t" && $value[$i+2] == "t" && $value[$i+3] == "p" && $value[$i+4] == ":" && $value[$i+5] == "/" && $value[$i+6] == "/" || $value[$i] == "h" && $value[$i+1] == "t" && $value[$i+2] == "t" && $value[$i+3] == "p" && $value[$i+4] == "s" && $value[$i+5] == ":" && $value[$i+6] == "/" && $value[$i+7] == "/"){
                    $data .= '<a class="lit-article-a" href="';
                    $Url_data = "";
                    for ($j=$i; $j < strlen($value)-1; $j++) { 
                        if ($value[$j] == " " || $value[$j] == "\n") {
                            $i = $j;
                            $data .= '">'. $Url_data.'</a>';
                            break;
                        }elseif(!isset($value[$j])) {
                            $i = $j;
                            $data .= '">'. $Url_data.'</a>';
                            break;
                        }else{
                            $Url_data .= $value[$j];
                            $data .= $value[$j];
                        }
                    }
                }else{
                    if ($value[$i] == "<") {
                        $data .= "<span>&lt;</span>";
                    }elseif($value[$i] == ">"){
                        $data .= "<span>&gt;</span>";
                    }else{
                        $data .= $value[$i];
                    }
                }
            }
        }
        $data .= "</div>";
        return $data;
    }

    public function convart_ListOutput($value)
        {
        $value = $value." \0 ";
        $data = "";
        $btag = "";
        $pretag = "";
        if ($value != "") {
            for ($i=0; $i <= strlen($value)-1; $i++) { 
                if ($value[$i] == "*" && $value[$i+1] == "*") {
                    if ($btag == "") {
                        $data .= "";
                        $btag = "1";
                    }else{
                        $data .= "";
                        $btag = "";
                    }
                    $i =$i+1;
                }elseif ($value[$i] == "`" && $value[$i+1] == "`" && $value[$i+2] == "`") {
                    if ($pretag == "") {
                        $data .= '<pre class="lit-code-pre-list"><code>';
                        $pretag = "1";
                    }else{
                        $data .= "</code></pre>";
                        $pretag = "";
                    }
                    $i =$i+2;
                }else{
                    if ($value[$i] == "<") {
                        $data .= "<span>&lt;</span>";
                    }elseif($value[$i] == ">"){
                        $data .= "<span>&gt;</span>";
                    }else{
                        $data .= $value[$i];
                    }
                }
            }
        }
        return $data;
    }

    public function getChannelName($F_Name,$L_Name)
    {
        return $retVal = ($L_Name != ".") ? $F_Name." ".$L_Name : $L_Name ;
    }

    public function getUserIP()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            return $_SERVER['HTTP_X_FORWARDED'];
        }elseif (isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        }elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_FORWARDED_FOR'];
        }elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            return $_SERVER['HTTP_FORWARDED'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }else{
            return "UNKNOWN";
        }
    }

    public function unique_array($my_array, $key) { 
        $result = array(); 
        $i = 0; 
        $key_array = array(); 
        
        foreach($my_array as $val) { 
            if (!in_array($val->$key, $key_array)) { 
                $key_array[$i] = $val->$key; 
                $result[$i] = $val; 
            } 
            $i++; 
        } 
        return $result; 
    }
    }
