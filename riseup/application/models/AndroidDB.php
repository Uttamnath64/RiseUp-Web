<?php
class AndroidDB 
{
	
	function __construct()
	{
		$this->Controller = new Controller;
		$this->db = new Database;
	}
	public function getCountryListDB()
   {
	   	$this->db->query('SELECT * FROM countries');
	   	return $this->db->resultSet();
   }

  public function register($accountData) {
        $this->db->query("UPDATE user_account SET F_Name = :F_Name, L_Name = :L_Name, Country_Id = :Country, Mobile_Number = :Mobile_Number, Email = :Email, Gender = :Gender, DOB = :DOB, Channel_Logo = :Image, Password = :Password WHERE user_account.Url = :Url ");
        $this->db->bind(':Url', $accountData['Url']);
        $this->db->bind(':F_Name', $accountData['F_Name']);
        $this->db->bind(':L_Name', $accountData['L_Name']);
        $this->db->bind(':Country', $accountData['Country']);
        $this->db->bind(':Mobile_Number', $accountData['Mobile_Number']);
        $this->db->bind(':Email', $accountData['Email']);
        $this->db->bind(':Gender', $accountData['Gender']);
        $this->db->bind(':DOB', $accountData['DOB']);
        $this->db->bind(':Image', $accountData['Image']);
        $this->db->bind(':Password', $accountData['Password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        } 
    }
    public function findUserByMNumber($mobile) {

        $this->db->query('SELECT * FROM user_account WHERE Mobile_Number = :Mobile_Number');
        $this->db->bind(':Mobile_Number', $mobile);
        if(count($this->db->resultSet()) > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function demo($value)
    {
    	$mobile = implode (" ",$value);
    	$this->db->query('INSERT into test(test) VALUES(:Mobile_Number)');
        $this->db->bind(':Mobile_Number', $mobile);
        if ($this->db->execute()) {
            echo "working";
        } else {
            echo "not working";
        }
    }
    public function findUserByUrlAndInsert($Url,$Country) {

        $this->db->query('SELECT * FROM user_account WHERE Url = :Url');
        $this->db->bind(':Url', $Url);
        if(count($this->db->resultSet()) > 0) {
            return true;
        } else {
            $this->db->query('INSERT INTO user_account (Url,Country_Id)VALUES (:Url, :Country)');
            $this->db->bind(':Url', $Url);
            $this->db->bind(':Country', $Country['Country']);
            if ($this->db->execute()) {
            	return false;
	        } else {
        		$success_msg['success'] = 0;
				$success_msg['success_msg'] = "Something went wrong!";
				echo json_encode($success_msg);
	        }
        }
    }
  	public function checkLogin($data) 
  	{
        $this->db->query('SELECT * FROM user_account WHERE Mobile_Number = :Mobile_Number');

        $this->db->bind(':Mobile_Number', $data['Mobile_Number']);
        $getdata = $this->db->resultSet();
        if(count($getdata) > 0) {
            $getdata = $this->db->single();
            $Password = $getdata->Password;
            if (md5($data['Password'])===$Password) {
            	$success_msg['success'] = 1;
            	$success_msg['URL'] = $getdata->Url;
				$success_msg['success_msg'] = "Successfully";
            }else{
            	$success_msg['success'] = 0;
				$success_msg['success_msg'] = "Password invalid!";
            }
        } else {
        	$success_msg['success'] = 0;
			$success_msg['success_msg'] = "Mobile number not exist!";
        }
        return $success_msg;
    }

    public function getHomeArticleDataDB()
    {
        $this->db->query('SELECT user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image, post.Article, post.Date_Time FROM post INNER JOIN user_account ON user_account.Url = post.Channel_Url WHERE post.Visibility = "PU"');
        $home_data = $this->db->resultSet();

        
        $home_data = $this->Controller->getRandData($home_data,count($home_data));
        
        foreach ($home_data as $key => $value) {

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
            $this->db->bind(':Url', $value->Url);
            $views_data = count($this->db->resultSet());

            $data[$key]['Url'] = $value->Url;
            $data[$key]['Channel_Name'] = $this->Controller->getChannelName($value
                                ->F_Name, $value->L_Name);
            $data[$key]['Image_Url'] = '/images/'.$value->Image;
            $data[$key]['Title'] = $value->Title;
            $data[$key]['Channel_Logo'] =  '/images/'.$value->Channel_Logo;
            $data[$key]['Views'] = $this->Controller->number_format_short($views_data);
            $data[$key]['Date_Time'] = $this->Controller->time_elapsed_string($value->Date_Time);
            $data[$key]['Description'] = $value->Article;
        }

        if (isset($data)) {
                    $success_msg['Data'] = $data;
        $success_msg['success'] = 1;
        $success_msg['success_msg'] = "Data Get!";
        }else{
        $success_msg['success'] = 0;
        $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }

    public function getArticleViewDataDB($value)
    {
        $this->db->query('SELECT * FROM post WHERE Url = :Url');
            $this->db->bind(':Url', trim($value[0]));

            if (count($this->db->resultSet()) <= 0) {
                die("data not found");
            }

            $Post_sql_data = $this->db->single();

            if ($Post_sql_data->Visibility == "PR") {
                die("Post is Private");
            }

            // for views
            if (isset($value[1])) {
            
                $this->db->query('INSERT INTO views (User_Url, Post_Url, IP_Address,Channel_Url,Source_Type) VALUES(:User_Url, :Post_Url, :IP, :Channel_Url, :Source_Type)');
                $this->db->bind(':User_Url', trim($value[1]));
                $this->db->bind(':Post_Url', trim($Post_sql_data->Url));
                $this->db->bind(':Channel_Url', trim($Post_sql_data->Channel_Url));
                $this->db->bind(':Source_Type', "Android Application");
                $this->db->bind(':IP', "0");
                $this->db->execute();
            }else{
                $this->db->query('INSERT INTO views (Post_Url, IP_Address, Channel_Url,Source_Type) VALUES(:Post_Url, :IP, :Channel_Url, :Source_Type)');
                $this->db->bind(':Post_Url', trim($Post_sql_data->Url));
                $this->db->bind(':Channel_Url', trim($Post_sql_data->Channel_Url));
                $this->db->bind(':Source_Type', "Android Application");
                $this->db->bind(':IP', "0");
                $this->db->execute();
            }

            // channel data get
            
            $this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Channel_Url');
            $this->db->bind(':Channel_Url', $Post_sql_data->Channel_Url);
            $Channel_sql_data = $this->db->single();

            //category  data get

            $this->db->query('SELECT Category_Name FROM category WHERE Id = :Id');
            $this->db->bind(':Id', $Post_sql_data->Category_Id);
            $Category_sql_data = $this->db->single();

            //joiner data get

            $this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url');
            $this->db->bind(':Url', $Channel_sql_data->Url);
            $joiner_sql_data = count($this->db->resultSet());

            //post views data get

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Post_Url');
            $this->db->bind(':Post_Url', $Post_sql_data->Url);
            $P_views_sql_data = count($this->db->resultSet());

            //count like of post

            $this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
            $this->db->bind(':Post_Url', $Post_sql_data->Url);
            $P_Count_Like = count($this->db->resultSet());

            //count dislike of post

            $this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
            $this->db->bind(':Post_Url', $Post_sql_data->Url);
            $P_Count_Dislike = count($this->db->resultSet());

            // check like and dislike
            $LikeAndDislike = '';
            $ArticleBookmark = '';
            $ChannelJoined = '';
            if(isset($value[1])){
            $this->db->query('SELECT Like_Dislike FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
            $this->db->bind(':Post_Url',$Post_sql_data->Url);
            $this->db->bind(':User_Url',$value[1]);

            $LikeAndDislike = count($this->db->resultSet());

            if ($LikeAndDislike != 0) {
                $LikeAndDislike = $this->db->single();
                if($LikeAndDislike->Like_Dislike == 1){
                    $LikeAndDislike = 'LIKE';
                }else{
                    $LikeAndDislike = 'DISLIKE';
                }
            }else{
                $LikeAndDislike = 'UNSET';
            }
            // for chack bookmark
            $this->db->query('SELECT Id FROM bookmark WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
            $this->db->bind(':Post_Url',$Post_sql_data->Url);
            $this->db->bind(':User_Url',$value[1]);

            $ArticleBookmark = count($this->db->resultSet());

            if ($ArticleBookmark != 0) {
                $ArticleBookmark = 'BOOKMARK';
            }else{
                $ArticleBookmark = '';
            }

            // for chack channel joined
            $this->db->query('SELECT Id FROM joiner WHERE User_Url = :User_Url AND Channel_Url = :Channel_Url');
            $this->db->bind(':Channel_Url',$Channel_sql_data->Url);
            $this->db->bind(':User_Url',$value[1]);

            $ChannelJoined = count($this->db->resultSet());

            if ($ChannelJoined != 0) {
                $ChannelJoined = 'JOIN';
            }else{
                $ChannelJoined = '';
            }
            }

            
            $PostData = [

                    //Post data 

                    'Post_Url' => $Post_sql_data->Url,
                    'Post_Title' => $Post_sql_data->Title,
                    'Post_Article' =>$this->Controller->convart_Output($Post_sql_data->Article),
                    'Post_Visibility' => $Post_sql_data->Visibility,
                    'Post_Image' => $Post_sql_data->Image,
                    'Post_Comments' => $Post_sql_data->Comments,
                    'Post_Paid_Promotion' => trim($Post_sql_data->Paid_Promotion),
                    'Post_Date_Time' => $this->Controller->getDateF($Post_sql_data->Date_Time)." (".$this->Controller->time_elapsed_string($Post_sql_data->Date_Time).")",
                    'LikeAndDislike' => $LikeAndDislike,
                    'ArticleBookmark' => $ArticleBookmark,
                    'ChannelJoined' => $ChannelJoined,

                    //category data

                    'Post_Category_Name' => $Category_sql_data->Category_Name,
                    'Post_Category_Id' => $Post_sql_data->Category_Id,

                    //channel data

                    'Channel_Url' => $Channel_sql_data->Url,
                    'Channel_Name' => ($Channel_sql_data->L_Name == ".") ? $Channel_sql_data->F_Name : $Channel_sql_data->F_Name." ".$Channel_sql_data->L_Name,
                    'Channel_Logo' => $Channel_sql_data->Channel_Logo,
                    
                    //joiner data

                    'Channel_Joiner' => $this->Controller->number_format_short($joiner_sql_data),

                    //views data

                    'Post_Views' => $P_views_sql_data,


                    // like_dislike data

                    'Post_Like' => $P_Count_Like,
                    'Post_Dislike' => $P_Count_Dislike,

                    'success' => 1,
                    'success_msg' => "Get Data!"

                ];
            return $PostData;
    }

public function likeAndDislikeDB($data)
        {
            $this->db->query('SELECT Channel_Url FROM post WHERE Url = :Url');
            $this->db->bind(':Url', $data[1]);
            $getvar = $this->db->single();
            $temp_channel_Url = $getvar->Channel_Url;
            if(!isset($data[2])){
                $return_data['Like'] = 0;
                $return_data['Dislike'] = 0;
                $return_data['msg'] = '';
                $return_data = json_encode($return_data);
                die($return_data);
            }elseif ($data[0] == 1) {
                $this->db->query('SELECT Like_Dislike FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
                $this->db->bind(':Post_Url',$data[1]);
                $this->db->bind(':User_Url',$data[2]);

                $Sql_Data_size = count($this->db->resultSet());
                if ($Sql_Data_size == 0) {
                    $this->db->query('INSERT INTO `like_dislike`(`Post_Url`, `Channel_Url`, `Like_Dislike`, `User_Url`) VALUES (:Post_Url,:Channel_Url,:Like_Dislike,:User_Url)');
                    $this->db->bind(':Like_Dislike', 1);
                    $this->db->bind(':Post_Url', $data[1]);
                    $this->db->bind(':Channel_Url', $temp_channel_Url);
                    $this->db->bind(':User_Url', $data[2]);
                    if ($this->db->execute()) {
                        //get like
                        $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
                        $this->db->bind(':Post_Url',$data[1]);
                        $return_data['Like'] = count($this->db->resultSet());
                        //get dislike
                        $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
                        $this->db->bind(':Post_Url',$data[1]);
                        $return_data['Dislike'] = count($this->db->resultSet());

                        $return_data['msg'] = 'LIKE';

                        $return_data['success'] = 1;
                        $return_data['success_msg'] = "Article liked!";
                        $return_data = json_encode($return_data);
                        die($return_data);
                    }
                }else{
                    $Sql_Data = $this->db->single();
                    if ($Sql_Data->Like_Dislike == 0) {
                        $this->db->query('UPDATE like_dislike SET Like_Dislike = :Like_Dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
                        $this->db->bind(':Post_Url',$data[1]);
                        $this->db->bind(':Like_Dislike',1);
                        $this->db->bind(':User_Url',$data[2]);
                        if ($this->db->execute()) {
                            //get like
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);

                            $return_data['Like'] = count($this->db->resultSet());
                            //get dislike
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);
                            $return_data['Dislike'] = count($this->db->resultSet());

                            $return_data['msg'] = 'LIKENOW';
                            $return_data['success'] = 1;
                            $return_data['success_msg'] = "Article liked!";
                            $return_data = json_encode($return_data);
                            die($return_data);
                        }
                    }else{
                        $this->db->query('DELETE FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
                        $this->db->bind(':Post_Url',$data[1]);
                        $this->db->bind(':User_Url',$data[2]);
                        if ($this->db->execute()) {
                            //get like
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);
                            $return_data['Like'] = count($this->db->resultSet());
                            //get dislike
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);
                            $return_data['Dislike'] = count($this->db->resultSet());

                            $return_data['msg'] = 'UNSET1';
                            $return_data['success'] = 1;
                            $return_data['success_msg'] = "Article remove vote!";
                            $return_data = json_encode($return_data);
                            die($return_data);
                        }
                    }
                }
            }else{
                $this->db->query('SELECT Like_Dislike FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url');
                $this->db->bind(':Post_Url',$data[1]);
                $this->db->bind(':User_Url',$data[2]);

                $Sql_Data_size = count($this->db->resultSet());
                if ($Sql_Data_size == 0) {
                    $this->db->query('INSERT INTO like_dislike(Post_Url, Channel_Url, Like_Dislike, User_Url) VALUES(:Post_Url, :Channel_Url, :Like_Dislike, :User_Url)');
                    $this->db->bind(':Like_Dislike', 0);
                    $this->db->bind(':Post_Url', $data[1]);
                    $this->db->bind(':Channel_Url', $temp_channel_Url);
                    $this->db->bind(':User_Url', $data[2]);
                    if ($this->db->execute()) {
                        //get like
                        $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
                        $this->db->bind(':Post_Url',$data[1]);
                        $return_data['Like'] = count($this->db->resultSet());
                        //get dislike
                        $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
                        $this->db->bind(':Post_Url',$data[1]);
                        $return_data['Dislike'] = count($this->db->resultSet());

                        $return_data['msg'] = 'DISLIKE';
                        $return_data['success'] = 1;
                        $return_data['success_msg'] = "Article Dislike!";
                        $return_data = json_encode($return_data);
                        die($return_data);
                    }
                }else{
                    $Sql_Data = $this->db->single();
                    if ($Sql_Data->Like_Dislike == 1) {
                        $this->db->query('UPDATE like_dislike SET Like_Dislike = :Like_Dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
                        $this->db->bind(':Post_Url',$data[1]);
                        $this->db->bind(':Like_Dislike',0);
                        $this->db->bind(':User_Url',$data[2]);
                        if ($this->db->execute()) {
                            //get like
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);
                            $return_data['Like'] = count($this->db->resultSet());
                            //get dislike
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);
                            $return_data['Dislike'] = count($this->db->resultSet());

                            $return_data['msg'] = 'DISLIKENOW';
                            $return_data['success'] = 1;
                            $return_data['success_msg'] = "Article Dislike!";
                            $return_data = json_encode($return_data);
                            die($return_data);
                        }
                    }else{
                        $this->db->query('DELETE FROM like_dislike WHERE User_Url = :User_Url AND Post_Url = :Post_Url ');
                        $this->db->bind(':Post_Url',$data[1]);
                        $this->db->bind(':User_Url',$data[2]);
                        if ($this->db->execute()) {
                            //get like
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 1 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);
                            $return_data['Like'] = count($this->db->resultSet());
                            //get dislike
                            $this->db->query('SELECT Id FROM like_dislike  WHERE Like_Dislike = 0 AND Post_Url = :Post_Url');
                            $this->db->bind(':Post_Url',$data[1]);
                            $return_data['Dislike'] = count($this->db->resultSet());

                            $return_data['msg'] = 'UNSET';
                            $return_data['success'] = 1;
                            $return_data['success_msg'] = "Article remove vote!";
                            $return_data = json_encode($return_data);
                            die($return_data);
                        }
                    }
                }
            }
        }

        public function articlsBookmarDB($data)
        {
            if(!isset($data[1])){
                $return_data['msg'] = '';
                $return_data = json_encode($return_data);
                die($return_data);
            }else{
                $this->db->query('SELECT Id FROM bookmark WHERE Post_Url = :Post_Url AND User_Url = :User_Url');
                $this->db->bind(':Post_Url',$data[0]);
                $this->db->bind(':User_Url',$data[1]);
                $NumOfRow = count($this->db->resultSet());

                if ($NumOfRow == 0) {
                    $this->db->query('INSERT INTO bookmark (Post_Url, User_Url) VALUES (:Post_Url, :User_Url)');
                    $this->db->bind(':Post_Url',$data[0]);
                    $this->db->bind(':User_Url',$data[1]);
                    if ($this->db->execute()) {

                        $return_data['msg'] = 'BOOKMARK';
                        $return_data['success'] = 1;
                        $return_data['success_msg'] = "Article Bookmark!";
                        $return_data = json_encode($return_data);
                        die($return_data);
                    }
                }else {
                    $this->db->query('DELETE FROM bookmark WHERE Post_Url = :Post_Url AND User_Url = :User_Url');
                    $this->db->bind(':Post_Url',$data[0]);
                    $this->db->bind(':User_Url',$data[1]);
                    if ($this->db->execute()) {

                        $return_data['msg'] = 'REMOVE';
                        $return_data['success'] = 1;
                        $return_data['success_msg'] = "Article remove Bookmark!";
                        //retourn data
                        $return_data = json_encode($return_data);
                        die($return_data);
                    }
                }
            }
        }

        public function channelJoinAndLeftDB($data)
        {
            if(!isset($data[1])){
                $return_data = json_encode($return_data);
                die($return_data);
            }else{
                $this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Channel_Url AND User_Url = :User_Url');
                $this->db->bind(':Channel_Url',$data[0]);
                $this->db->bind(':User_Url',$data[1]);
                $NumOfRow = count($this->db->resultSet());

                if ($NumOfRow == 0) {
                    $this->db->query('INSERT INTO joiner (Channel_Url, User_Url) VALUES (:Channel_Url, :User_Url)');
                    $this->db->bind(':Channel_Url',$data[0]);
                    $this->db->bind(':User_Url',$data[1]);
                    if ($this->db->execute()) {
                        //get channel joiner
                        $this->db->query('SELECT Id FROM joiner  WHERE  Channel_Url = :Channel_Url');
                        $this->db->bind(':Channel_Url',$data[0]);
                        $return_data['Joiner'] = count($this->db->resultSet());

                        $return_data['msg'] = 'JOIN';
                        $return_data['success'] = 1;
                        $return_data['success_msg'] = "Joined to Channel!";
                        //retourn data
                        $return_data = json_encode($return_data);
                        die($return_data);
                    }
                }else {
                    $this->db->query('DELETE FROM joiner WHERE Channel_Url = :Channel_Url AND User_Url = :User_Url');
                    $this->db->bind(':Channel_Url',$data[0]);
                    $this->db->bind(':User_Url',$data[1]);
                    if ($this->db->execute()) {
                        //get channel joiner
                        $this->db->query('SELECT Id FROM joiner  WHERE  Channel_Url = :Channel_Url');
                        $this->db->bind(':Channel_Url',$data[0]);
                        $return_data['Joiner'] = count($this->db->resultSet());

                        $return_data['msg'] = 'LEFT';
                        $return_data['success'] = 1;
                        $return_data['success_msg'] = "Left to Channel";
                        //retourn data
                        $return_data = json_encode($return_data);
                        die($return_data);
                    }
                }
            }
        }

  
    public function getArticleContentDB($url)
    {
        $this->db->query('SELECT * FROM post WHERE Url = :Url');
        $this->db->bind(':Url', trim($url));
        $Post_sql_data = $this->db->single();
        $data = [
            'Post_Article' =>$this->Controller->convart_Output($Post_sql_data->Article)
        ];
        include "../application/view/layouts/default/AndroidArticleView.php";
    }

    public function getChannelDataDB($value)
    {

        $this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo,Description FROM user_account WHERE Url = :Url');
        $this->db->bind(':Url', trim($value[0]));
        $Channel = $this->db->single();

        $this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url');
        $this->db->bind(':Url', trim($value[0]));
        $Joiner = count($this->db->resultSet());

        $this->db->query('SELECT Id FROM joiner WHERE User_Url = :User_Url AND Channel_Url = :Channel_Url');
            $this->db->bind(':Channel_Url',$value[0]);
            $this->db->bind(':User_Url',$value[1]);

            $ChannelJoined = count($this->db->resultSet());

            if ($ChannelJoined != 0) {
                $ChannelJoined = 'JOIN';
            }else{
                $ChannelJoined = '';
            }

        $this->db->query('SELECT user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image, post.Article, post.Date_Time FROM post INNER JOIN user_account ON user_account.Url = post.Channel_Url WHERE post.Visibility = "PU" AND post.Channel_Url = :Url');
        $this->db->bind(':Url', trim($value[0]));
        $home_data = $this->db->resultSet();
        foreach ($home_data as $key => $value) {

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
            $this->db->bind(':Url', $value->Url);
            $views_data = count($this->db->resultSet());

            $data[$key]['Url'] = $value->Url;
            $data[$key]['Channel_Name'] = $this->Controller->getChannelName($value->F_Name, $value->L_Name);
            $data[$key]['Image_Url'] = '/images/'.$value->Image;
            $data[$key]['Title'] = $value->Title;
            $data[$key]['Channel_Logo'] =  '/images/'.$value->Channel_Logo;
            $data[$key]['Views'] = $this->Controller->number_format_short($views_data);
            $data[$key]['Date_Time'] = $this->Controller->time_elapsed_string($value->Date_Time);
            $data[$key]['Description'] = $value->Article;
        }

        if (isset($data)) {
            $success_msg['Data'] = $data;
            $success_msg['Url'] = $Channel->Url;
            $success_msg['Channel_Name'] = $this->Controller->getChannelName($Channel->F_Name, $Channel->L_Name);
            $success_msg['Description'] = $Channel->Description;
            $success_msg['Channel_Logo'] = $Channel->Channel_Logo;
            $success_msg['ChannelJoined'] = $ChannelJoined;
            $success_msg['Joiner'] = $this->Controller->number_format_short($Joiner);
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }

    public function ProfileDataDB($value)
    {
        $this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo,Description FROM user_account WHERE Url = :Url');
        $this->db->bind(':Url', $value);
        $Channel = $this->db->single(); 

        $this->db->query('SELECT Url FROM Post WHERE Channel_Url = :Channel_Url');
        $this->db->bind(':Channel_Url', $value);
        $Channel_post = count($this->db->resultSet());

        $this->db->query('SELECT Id FROM like_dislike WHERE Like_Dislike = 1 AND Channel_Url = :Channel_Url');
        $this->db->bind(':Channel_Url', $value);
        $Count_Like = count($this->db->resultSet());

        $this->db->query('SELECT Id FROM joiner WHERE Channel_Url = :Url');
        $this->db->bind(':Url', $value);
        $Joiner = count($this->db->resultSet());

        $success_msg['Url'] = $Channel->Url;
        $success_msg['Channel_Name'] = $this->Controller->getChannelName($Channel->F_Name, $Channel->L_Name);
        $success_msg['Channel_Logo'] = $Channel->Channel_Logo;
        $success_msg['Description'] = $Channel->Description;
        $success_msg['Joiner'] = $this->Controller->number_format_short($Joiner);
        $success_msg['Articles'] = $this->Controller->number_format_short($Channel_post);
        $success_msg['Likes'] = $this->Controller->number_format_short($Count_Like);
        $success_msg['success'] = 1;
        $success_msg['success_msg'] = "Data Get!";
 
        return $success_msg;
    }


public function getAchievementList($val)
    {
        //achievement_data

        $this->db->query('SELECT * FROM achievement');
        $All_Achievement = $this->db->resultSet();
        foreach ($All_Achievement as $key => $value) {
            $A_Comuplite = 0;
            $this->db->query('SELECT Achievement_Id FROM achievement_data WHERE Channel_Url = :Url AND Achievement_Id = :Id');
            $this->db->bind(':Url', $val);
            $this->db->bind(':Id', $value->Id);
            $_SESSION['User_Id'] = $val;
            $A_C_Data = count($this->db->resultSet());
            if ($A_C_Data != 0) {
                    $A_Comuplite = 1;
            }
            if($A_Comuplite == 0){
                $Enable = 0;
                eval($value->Logical_Part);

                if($Enable == 1){
                   $status = 3;
                }else{
                    $status = 1;
                }
            }else{
                $status = 2;
            }
            $data[$key]['Id'] = $value->Id;
            $data[$key]['Achievement_Name'] = $value->Achievement_Name;
            $data[$key]['Description'] = $value->Description;
            $data[$key]['Status'] = $status;
            
        }
        
        if (isset($data)) {
            $success_msg['Data'] = $data;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }


public function getLibraryHistoryDB($val)
    {
        // history data
        $this->db->query('SELECT views.C_Date, user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image, post.Article FROM (( user_account INNER JOIN views ON user_account.Url = views.Channel_Url ) INNER JOIN post ON post.Url = views.Post_Url) WHERE (post.Visibility = "PU" OR post.Visibility = "PR") AND views.User_Url  = :Url  ORDER BY views.C_Date DESC');
        $this->db->bind(':Url', trim($val));
        $history_data = $this->db->resultSet();

        foreach ($history_data as $key => $value) {

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
            $this->db->bind(':Url', $value->Url);
            $views_data = count($this->db->resultSet());

            $data[$key]['Url'] = $value->Url;
            $data[$key]['Channel_Name'] = $this->Controller->getChannelName($value->F_Name, $value->L_Name);
            $data[$key]['Image_Url'] = '/images/'.$value->Image;
            $data[$key]['Title'] = $value->Title;
            $data[$key]['Channel_Logo'] =  '/images/'.$value->Channel_Logo;
            $data[$key]['Views'] = $this->Controller->number_format_short($views_data);
            $data[$key]['Date_Time'] = $this->Controller->time_elapsed_string($value->C_Date);
            $data[$key]['Description'] = $value->Article;
        }

        if (isset($data)) {
            $success_msg['Data'] = $data;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }

    public function getLibraryArticleDB($val)
    {
        // channel article data
        $this->db->query('SELECT post.Url, post.Title, post.Image, post.Date_Time, post.Article FROM post WHERE post.Channel_Url = :Url ORDER BY post.Date_Time DESC');
        $this->db->bind(':Url', trim($val));
        $article_data = $this->db->resultSet();


        // channel data
        $this->db->query('SELECT F_Name,L_Name,Channel_Logo FROM user_account  WHERE Url = :Url');
        $this->db->bind(':Url', trim($val));
        $channel_sql_data = $this->db->single();
        
      
        foreach ($article_data as $key => $value) {

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
            $this->db->bind(':Url', $value->Url);
            $views_data = count($this->db->resultSet());

            $data[$key]['Url'] = $value->Url;
            $data[$key]['Channel_Name'] = $this->Controller->getChannelName($channel_sql_data->F_Name, $channel_sql_data->L_Name);
            $data[$key]['Image_Url'] = '/images/'.$value->Image;
            $data[$key]['Title'] = $value->Title;
            $data[$key]['Channel_Logo'] =  '/images/'.$channel_sql_data->Channel_Logo;
            $data[$key]['Views'] = $this->Controller->number_format_short($views_data);
            $data[$key]['Date_Time'] = $this->Controller->time_elapsed_string($value->Date_Time);
            $data[$key]['Description'] = $value->Article;

        }

        if (isset($data)) {
            $success_msg['Data'] = $data;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }

public function getLibraryBookmarkDB($val)
    {
        // history data
        $this->db->query('SELECT bookmark.C_Date, user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image, post.Article FROM (( bookmark INNER JOIN user_account ON user_account.Url = bookmark.User_Url ) INNER JOIN post ON post.Url = bookmark.Post_Url) WHERE (post.Visibility = "PU" OR post.Visibility = "PR") AND bookmark.User_Url  = :Url');
        $this->db->bind(':Url', trim($val));
        $bookmark_data = $this->db->resultSet();
//echo "<pre>";
//print_r($history_data);
        $bookmark_view = "";
        foreach ($bookmark_data as $key => $value) {

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
            $this->db->bind(':Url', $value->Url);
            $views_data = count($this->db->resultSet());

            $data[$key]['Url'] = $value->Url;
            $data[$key]['Channel_Name'] = $this->Controller->getChannelName($value->F_Name, $value->L_Name);
            $data[$key]['Image_Url'] = '/images/'.$value->Image;
            $data[$key]['Title'] = $value->Title;
            $data[$key]['Channel_Logo'] =  '/images/'.$value->Channel_Logo;
            $data[$key]['Views'] = $this->Controller->number_format_short($views_data);
            $data[$key]['Date_Time'] = $this->Controller->time_elapsed_string($value->C_Date);
            $data[$key]['Description'] = $value->Article;

        }
        if (isset($data)) {
            $success_msg['Data'] = $data;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }

public function getLibraryLikedDB($val)
    {
        // history data
        $this->db->query('SELECT like_dislike.C_Date, user_account.Url AS Channel_Url, user_account.F_Name, user_account.L_Name, user_account.Channel_Logo, post.Url, post.Title, post.Visibility, post.Image, post.Article FROM (( like_dislike INNER JOIN user_account ON user_account.Url = like_dislike.Channel_Url ) INNER JOIN post ON post.Url = like_dislike.Post_Url) WHERE (post.Visibility = "PU" OR post.Visibility = "PR") AND like_dislike.Like_Dislike = 1 AND like_dislike.User_Url  = :Url');
        $this->db->bind(':Url', trim($val));
        $liked_data = $this->db->resultSet();

        $liked_view = "";
        foreach ($liked_data as $key => $value) {

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
            $this->db->bind(':Url', $value->Url);
            $views_data = count($this->db->resultSet());

            $data[$key]['Url'] = $value->Url;
            $data[$key]['Channel_Name'] = $this->Controller->getChannelName($value->F_Name, $value->L_Name);
            $data[$key]['Image_Url'] = '/images/'.$value->Image;
            $data[$key]['Title'] = $value->Title;
            $data[$key]['Channel_Logo'] =  '/images/'.$value->Channel_Logo;
            $data[$key]['Views'] = $this->Controller->number_format_short($views_data);
            $data[$key]['Date_Time'] = $this->Controller->time_elapsed_string($value->C_Date);
            $data[$key]['Description'] = $value->Article;

        }
        if (isset($data)) {
            $success_msg['Data'] = $data;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }


    public function getJoinedChannelDB($val)
    {
        $this->db->query('SELECT Channel_Url FROM joiner WHERE User_Url = :User_Url');
        $this->db->bind(':User_Url', $val);
        $joiner_data = $this->db->resultSet();

        foreach ($joiner_data as $key => $value) {
            $this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Channel_Url');
            $this->db->bind(':Channel_Url', $value->Channel_Url);
            $channel_data = $this->db->single();

            $this->db->query('SELECT Url,Image FROM post WHERE Visibility = "PU" and Channel_Url = :Url ORDER BY `post`.`Date_Time` DESC');
            $this->db->bind(':Url',$value->Channel_Url);
            $last_post = $this->db->single();

            $this->db->query('SELECT Id FROM joiner  WHERE Channel_Url = :Channel_Url');
            $this->db->bind(':Channel_Url', $value->Channel_Url);
            $joiner_data = count($this->db->resultSet());

            $data[$key]['Channel_Url'] = $value->Channel_Url;
            $data[$key]['Channel_Name'] = $this->Controller->getChannelName($channel_data->F_Name, $channel_data->L_Name);
            $data[$key]['Channel_Image'] = '/images/'.$channel_data->Channel_Logo;
            $data[$key]['Channel_Joiner'] = $joiner_data;
            $data[$key]['Article_Image'] =  '/images/'.$last_post->Image;
            $data[$key]['Article_Url'] = $last_post->Url;

        }

        if (isset($data)) {
            $success_msg['Data'] = $data;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }

public function getSearchResultDB($data)
    {

        $this->db->query('SELECT * FROM post WHERE (Title LIKE :Search OR Article LIKE :Search OR Url LIKE :Search OR Image LIKE :Search OR Channel_Url LIKE :Search) AND (Visibility = :Visibility) ');
        $this->db->bind(':Search',"%".$data."%");
        $this->db->bind(':Visibility', "PU");
        $Sql_Data = $this->db->resultSet();

        foreach ($Sql_Data as $key => $value) {
            $this->db->query('SELECT F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Url ');
            $this->db->bind(':Url',$value->Channel_Url);
            $user_data = $this->db->single();

            $this->db->query('SELECT Id FROM views WHERE Post_Url = :Url');
            $this->db->bind(':Url',$value->Url);
            $Views = count($this->db->resultSet());

            $Main_Data[$key]['Search_Url'] = $value->Url;
            $Main_Data[$key]['Search_Image'] = '/images/'.$value->Image;
            $Main_Data[$key]['Search_Title'] = $value->Title;
            $Main_Data[$key]['Search_Description'] = $value->Article;
            $Main_Data[$key]['Search_Channel_Image'] = '/images/'.$user_data->Channel_Logo;
            $Main_Data[$key]['Search_Channel_Name'] = $this->Controller->getChannelName($user_data->F_Name, $user_data->L_Name);
            $Main_Data[$key]['Search_Views'] = $Views;

        }
        
        if (isset($Main_Data)) {
            $success_msg['Data'] = $Main_Data;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data Get!";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Data Not Found!";
        }
        return $success_msg;
    }

    public function getCategoryListDB()
   {
        $this->db->query('SELECT * FROM category');

        $success_msg['Data'] = $this->db->resultSet();
        $success_msg['success'] = 1;
        $success_msg['success_msg'] = "Data Not Found!";
        
        return $success_msg;

   }

   public function createArticleDB($PostData,$User_Url)
        {
            if (!empty($PostData["Tags"])) {
                foreach ($PostData["Tags"] as $key => $value) {
                    $this->insertTags($PostData['Url'],$value);
                }
            }
            if($PostData['Visibility'] =='PU'){
                $this->db->query("UPDATE post SET Title = :Title, Article = :Blog, Visibility = :Visibility, Image = :Image, Comments = :Comments, Paid_Promotion = :Paid_Promotion, Channel_Url = :Channel_Url, Category_Id = :Category, Date_Time = :Date_Time  WHERE post.Url = :Url ");

                $this->db->bind(':Url', $PostData['Url']);
                $this->db->bind(':Title', $PostData['Title']);
                $this->db->bind(':Blog', $PostData['Blog']);
                $this->db->bind(':Visibility', $PostData['Visibility']);
                $this->db->bind(':Image', $PostData['Image']);
                $this->db->bind(':Comments', $PostData['Comments']);
                $this->db->bind(':Date_Time', date('Y-m-d H:i:s'));
                $this->db->bind(':Paid_Promotion', $PostData['Paid_Promotion']);
                $this->db->bind(':Channel_Url', $User_Url);
                $this->db->bind(':Category', $PostData['Category']);        

                if (!$this->db->execute()) {
                    $success_msg['success'] = 0;
                    $success_msg['success_msg'] = "Something went wrong!";
                    return $success_msg;
                }

                $this->db->query('INSERT INTO notification (Post_Url,Channel_Url)VALUES (:Post_Url,:Channel_Url)');
                $this->db->bind(':Channel_Url', $User_Url);
                $this->db->bind(':Post_Url', $PostData['Url']);

                if (!$this->db->execute()) {
                    $success_msg['success'] = 0;
                    $success_msg['success_msg'] = "Something went wrong!";
                    return $success_msg;
                }

            }else{

                $this->db->query("UPDATE post SET Title = :Title, Blog = :Blog, Visibility = :Visibility, Image = :Image, Comments = :Comments, Paid_Promotion = :Paid_Promotion, Channel_Url = :Channel_Url, Category_Id = :Category WHERE post.Url = :Url ");
                $this->db->bind(':Url', $PostData['Url']);
                $this->db->bind(':Title', $PostData['Title']);
                $this->db->bind(':Blog', $PostData['Blog']);
                $this->db->bind(':Visibility', $PostData['Visibility']);
                $this->db->bind(':Image', $PostData['Image']);
                $this->db->bind(':Comments', $PostData['Comments']);
                $this->db->bind(':Paid_Promotion', $PostData['Paid_Promotion']);
                $this->db->bind(':Channel_Url', $User_Url);
                $this->db->bind(':Category', $PostData['Category']);        

                if (!$this->db->execute()) {
                    $success_msg['success'] = 0;
                    $success_msg['success_msg'] = "Something went wrong!";
                    return $success_msg;
                }
            }
            
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Article Created!";
            return $success_msg;
        }

    public function insertTags($Post_Url,$Tag)
    {
        $this->db->query('INSERT INTO tags (Post_Url,Tag)VALUES (:Post_Url,:Tag)');
        $this->db->bind(':Post_Url', $Post_Url);
        $this->db->bind(':Tag', $Tag);

        if (!$this->db->execute()) {
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Something went wrong!";
            return $success_msg;
        }
    }

    public function findUserByUrlAndInsertArticle($Url,$PostData,$data)
    {
        $this->db->query('SELECT * FROM user_account WHERE Url = :Url');
        $this->db->bind(':Url', $Url);
        if(count($this->db->resultSet()) > 0) {
            return true;
        } else {
            $this->db->query('INSERT INTO post (Url, Channel_Url, Category_Id)VALUES ( :Url, :Channel_Url, :Category_Id )');

            $this->db->bind(':Url', $Url);
            $this->db->bind(':Channel_Url', $data);
            $this->db->bind(':Category_Id', $PostData['Category']);
            if ($this->db->execute()) {
                return false;
            } else {
                $success_msg['success'] = 0;
                $success_msg['success_msg'] = "Something went wrong!";
                return $success_msg;
            }
        }
    }

    public function getAchievementViewDB($val,$id)
    {
        $this->db->query('SELECT * FROM achievement WHERE Id = :Id');
        $this->db->bind(":Id",$id);
        $All_Achievement = $this->db->single();

        $A_Comuplite = 0;

        $this->db->query('SELECT Achievement_Id FROM achievement_data WHERE Channel_Url = :Url AND Achievement_Id = :Id');
        $this->db->bind(':Url', $val);
        $this->db->bind(':Id', $id);

        $data = $this->db->single();


        $_SESSION['User_Id'] = $val;
        $A_C_Data = count($this->db->resultSet());
        if ($A_C_Data != 0) {
                $A_Comuplite = 1;
        }
        if($A_Comuplite == 0){
            $Enable = 0;
            eval($All_Achievement->Logical_Part);

            if($Enable == 1){
               $status = 3;
            }else{
                $status = 1;
            }
        }else{
            $status = 2;
        }

        $success_msg['Id'] = $All_Achievement->Id;
        $success_msg['Points'] = $All_Achievement->Points;
        $success_msg['Achievement_Name'] = $All_Achievement->Achievement_Name;
        $success_msg['Description'] = $All_Achievement->Description;
        $success_msg['Status'] = $status;
        $success_msg['success'] = 1;
        $success_msg['success_msg'] = "Data Get!";
        return $success_msg;
    }

    public function setAchievementDataDB($val)
    {
        $this->db->query('SELECT Id FROM achievement WHERE Id = :Id');
        $this->db->bind(':Id', trim($val[0]));
        if (count($this->db->resultSet()) > 0) {
            $this->db->query('SELECT Id FROM achievement_data WHERE Achievement_Id  = :Id');
            $this->db->bind(':Id', $val[0]);
            if (count($this->db->resultSet()) <= 1) {
                $this->db->query('INSERT INTO achievement_data (Channel_Url,Achievement_Id) VALUES (:Url,:Id)');
            $this->db->bind(':Id', $val[0]);
            $this->db->bind(':Url', $val[1]);
            if ($this->db->execute()) {
                $success_msg['success'] = 1;
                $success_msg['success_msg'] = "Achievement collected!";
            }
            }else{
                $success_msg['success'] = 1;
                $success_msg['success_msg'] = "Achievement already collected!";
            }
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Achievement not exist!";
        }
        return $success_msg;
    }



    public function addReport($data)
    {
        $this->db->query('INSERT INTO report (Channel_Url, Post_Url, User_Url, Report) VALUES (:Channel_Url, :Post_Url, :User_Url, :Report)');
        $this->db->bind(':Report',$data[0]);
        $this->db->bind(':Post_Url',$data[1]);
        $this->db->bind(':Channel_Url',$data[2]);
        $this->db->bind(':User_Url',$data[3]);
        if ($this->db->execute()) {
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "REPORTED";
        }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Something went wrong!";
        }
        return $success_msg;
    }

    public function getAllCommentsByPost($data)
    {
       
        $this->db->query('SELECT Comments FROM post WHERE Url = :Url');
        $this->db->bind(':Url', $data[0]);
        $Cdata = $this->db->single();
        if ($Cdata->Comments == 1) {
            $this->db->query('SELECT User_Url, C_Date, Comments FROM comments WHERE Post_Url = :Post_Url ORDER BY C_Date DESC');
            $this->db->bind(':Post_Url', $data[0]);
            $Comments = $this->db->resultSet();

            foreach ($Comments as $key => $value) {

                $this->db->query('SELECT Url,F_Name,L_Name,Channel_Logo FROM user_account WHERE Url = :Url');
                $this->db->bind(':Url', $value->User_Url);
                $user_data = $this->db->single();
                $CommentList[$key]["Channel_Url"] = $value->User_Url;
                $CommentList[$key]["Channel_Logo"] = $user_data->Channel_Logo;
                $CommentList[$key]["Channel_Name"] = $this->Controller->getChannelName($user_data->F_Name,$user_data->L_Name);
                $CommentList[$key]["Comment_Date"] = " • ".$this->Controller->time_elapsed_string($value->C_Date);
                $CommentList[$key]["Comment"] = $value->Comments;
                
            }
            if (isset($CommentList)) {
                return $CommentList;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    public function AddCommentDB($data)
    {
        $this->db->query('SELECT Channel_Url FROM post WHERE Url = :Url');
        $this->db->bind(':Url', trim($data[0]));

        $Post_data = $this->db->single();

        $this->db->query('INSERT INTO comments (Channel_Url, Post_Url, User_Url, Comments) VALUES (:Channel_Url, :Post_Url, :User_Url, :Comments)');
        $this->db->bind(':Comments',$data[1]);
        $this->db->bind(':Post_Url',$data[0]);
        $this->db->bind(':Channel_Url',$Post_data->Channel_Url);
        $this->db->bind(':User_Url',$data[2]);
        if ($this->db->execute()) {
            $success_msg['Data'] = $this->getAllCommentsByPost($data);;
            $success_msg['success'] = 1;
            $success_msg['success_msg'] = "Data not found!";
         }else{
            $success_msg['success'] = 0;
            $success_msg['success_msg'] = "Something went wrong!";
         }
         return $success_msg;
    }

    public function getCommentDB($val)
    {

        $this->db->query('SELECT Channel_Logo FROM user_account WHERE Url = :Channel_Url');
        $this->db->bind(':Channel_Url', $val[1]);
        $Channel_data = $this->db->single();

         $Comment = $this->getAllCommentsByPost($val);

         if ($Comment == '') {
            $success_msg['success'] = 0;
            $success_msg['User_Img'] = $Channel_data->Channel_Logo;
            $success_msg['success_msg'] = "Data not found!";
         }else{
            $success_msg['Data'] = $Comment;
            $success_msg['success'] = 1;
            $success_msg['User_Img'] = $Channel_data->Channel_Logo;
            $success_msg['success_msg'] = "Data not found!";
         }
         return $success_msg;
    }

}
?>