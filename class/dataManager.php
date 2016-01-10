<?php
session_start();
require 'db.inc.php';
require 'user.inc.php';
require 'PasswordHash.php';
date_default_timezone_set('Asia/Calcutta');
class dataManager {
    
    public $db_conn;
    public $user_id;
    private $host = MYSQL_HOST ;
    private $db_name = MYSQL_DB;
    
    function __construct() {
        $this->start = mktime(23,0,0,1,10,2016);
        try {
        $this->db_conn = new PDO("mysql:host=$this->host;dbname=$this->db_name;",MYSQL_USER,MYSQL_PASSWORD);
        }  catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    function started(){
        if(time()<$this->start){
            return false;
        }
        else
            return true;
    }
    
    function loginUser($username,$password) {
        $pwdHasher = new PasswordHash(8, FALSE);
        
        $query = $this->db_conn->prepare('SELECT * FROM users WHERE username = ?');
        $values = array($username);
        $query->execute($values);
        
        $obj = $query->fetch(PDO::FETCH_OBJ);
        
        if($pwdHasher->CheckPassword($password,$obj->password)) {
        $this->user_id = $obj->user_id;
        setcookie('treasure_logged',1,time()+360000);									//COOKIE variables initialisation
        setcookie('treasure_username',$obj->username,time()+360000);
        setcookie('treasure_name',$obj->full_name,time()+360000);
        setcookie('treasure_user_id',$this->user_id,time()+360000);
        setcookie('treasure_user_role',$obj->role,time()+360000);
       
        $_SESSION['treasure_logged'] = 1;
        $_SESSION['treasure_username'] = $obj->username;
        $_SESSION['treasure_name'] = $obj->full_name;
        $_SESSION['treasure_user_id'] = $this->user_id;
        $_SESSION['treasure_user_role'] = $obj->role;
        
        return 1;
        }else return 0;
               
    }
    
    function isLogged() {
        if(T_LOGGED==1) return true;
        else return false;
    }
    
    function logoutUSER() {
        setcookie('treasure_logged',0,time()-3600);	     //COOKIE variables initialisation
        setcookie('treasure_username','',time()-3600);
        setcookie('treasure_name','',time()-3600);
        setcookie('treasure_user_id','',time()-3600);
        setcookie('treasure_user_role','',time()-3600);
        session_destroy();
        
    }
    
    function registerUser($username,$password,$name,$college,$year,$email,$contact,$role) {
        try {
        $pwdHasher = new PasswordHash(8, FALSE);
        $hash = $pwdHasher->HashPassword($password);
        $query = $this->db_conn->prepare('INSERT INTO users (username,password,full_name,college,year,email,contact,role) VALUES (?,?,?,?,?,?,?,?)');
        $values = array($username,$hash,$name,$college,$year,$email,$contact,$role);
        //var_dump($values);
        $query->execute($values);
        
        $query2 = $this->db_conn->prepare('INSERT INTO progress (user_id,level) VALUES (?,1)');
        $values2 = array($this->db_conn->lastInsertId());
        $query2->execute($values2);
        return 1;
        }catch(PDOException $e) {
            return 0;
        }
    }
    function updateUser($password,$name,$college,$year,$email,$contact,$changePASS) {
        try {
        if($password !=""||$changePASS==true) { 
        $pwdHasher = new PasswordHash(8, FALSE);
        $hash = $pwdHasher->HashPassword($password);
        $query = $this->db_conn->prepare('UPDATE users SET password = ?,full_name = ?,college = ?,year = ?,email = ?,contact = ? WHERE user_id = ?');
        $values = array($hash,$name,$college,$year,$email,$contact,T_USER_ID);
        //var_dump($values);
        $query->execute($values);
        
        return 1;
        }else{
        $query = $this->db_conn->prepare('UPDATE users SET full_name = ?,college = ?,year = ?,email = ?,contact = ? WHERE user_id = ?');
        $values = array($name,$college,$year,$email,$contact,T_USER_ID);
        //var_dump($values);
        $query->execute($values);
        return 1;
        }
        
        }catch(PDOException $e) {
            return 0;
        }
    }
    function updateUserSpecific($password,$name,$college,$year,$email,$contact,$changePASS,$user_id) {
        try {
        if($password !=""||$changePASS==true) { 
        $pwdHasher = new PasswordHash(8, FALSE);
        $hash = $pwdHasher->HashPassword($password);
        $query = $this->db_conn->prepare('UPDATE users SET password = ?,full_name = ?,college = ?,year = ?,email = ?,contact = ? WHERE user_id = ?');
        $values = array($hash,$name,$college,$year,$email,$contact,$user_id);
        //var_dump($values);
        $query->execute($values);
        
        return 1;
        }else{
        $query = $this->db_conn->prepare('UPDATE users SET full_name = ?,college = ?,year = ?,email = ?,contact = ? WHERE user_id = ?');
        $values = array($name,$college,$year,$email,$contact,$user_id);
        //var_dump($values);
        $query->execute($values);
        return 1;
        }
        
        }catch(PDOException $e) {
            return 0;
        }
    }
    
    function getUser($user_id) {
        $query = $this->db_conn->prepare('SELECT * FROM users WHERE user_id = ?');
        $values = array($user_id);
        $query->execute($values);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    
    function checkDuplicateUser($username) {
        $query = $this->db_conn->prepare('SELECT COUNT(*) AS ct FROM users WHERE username = ?');
        $values = array($username);
        $query->execute($values);
        $obj = $query->fetch(PDO::FETCH_OBJ);
        //echo 'Object->ct :' . $obj->ct;
        if($obj->ct>= 1) return true;
        else false;
        
    }
    
    function checkAnswer($answer,$level) {
        $answer = strtolower($answer);
        $query = $this->db_conn->prepare('SELECT answer FROM answers WHERE question_id = ?');
        $values = array($level);
        $query->execute($values);
        $obj = $query->fetch(PDO::FETCH_OBJ);
        $deg = levenshtein($answer, $obj->answer);
        return $deg;
    }
    function getExplanation($level) {
        $query = $this->db_conn->prepare('SELECT explanation FROM answers WHERE question_id = ?');
        $values = array($level);
        $query->execute($values);
        $obj = $query->fetch(PDO::FETCH_OBJ);
        return $obj->explanation;
    }
    
       function updateProgress($user_id,$level) {
        $today = date("Y-m-d H:i:s");
        $query = $this->db_conn->prepare('UPDATE progress SET level = ?,latest_attempt = ? WHERE user_id = ?');
        $values = array($level,$today,$user_id);
        $query->execute($values);
        
    }
    
    function updateAttempt($user_id,$level) {
        $query = $this->db_conn->prepare('UPDATE progress SET attempts = attempts + 1 WHERE user_id = ?');
        $values = array($user_id);
        $query->execute($values);
        
        $query2 = $this->db_conn->prepare('UPDATE answers SET attempts = attempts + 1 WHERE question_id = ?');
        $values2 = array($level);
        $query2->execute($values2);
    }
    
    function getLevel($user_id) {
        $query = $this->db_conn->prepare('SELECT level FROM progress WHERE user_id = ?');
        $values = array($user_id);
        $query->execute($values);
        $obj = $query->fetch(PDO::FETCH_OBJ);
        return $obj->level;
    }
    
    function getPassed($level) {
        $query = $this->db_conn->prepare('SELECT passed FROM answers WHERE question_id = ?');
        $values = array($level);
        $query->execute($values);
        $obj = $query->fetch(PDO::FETCH_OBJ);
        return $obj->passed;
    }
    
    function updatePassed($level) {
        $query = $this->db_conn->prepare('UPDATE answers SET passed = passed + 1 WHERE question_id = ?');
        $values = array($level);
        $query->execute($values);
    }

    function postComment($level,$post) {
        try {
        $today = date("Y-m-d H:i:s"); 
        $query = $this->db_conn->prepare('INSERT INTO forum_posts (topic_id,posted_by,post,posted_on) VALUES (?,?,?,?)');
        $values = array($level,T_USER_ID,$post,$today);
        $query->execute($values);
        
        $query2 = $this->db_conn->prepare('UPDATE forum_topics SET post_count = post_count + 1 WHERE topic_id = ?');
        $values2 = array($level);
        $query2->execute($values2);
        return 1;
        }catch (PDOException $e) {
            return $e;
        }
    }

    function getComment($level,$page) {
        try {
        $this->db_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);    
        $start = T_FORUM_PAGE*($page-1);
        $end = T_FORUM_PAGE*$page - 1;
        $query = $this->db_conn->prepare('SELECT a.full_name as full_name,a.role as role,b.post_id as post_id,b.post as post,b.posted_on as posted_on FROM users a,forum_posts b WHERE b.topic_id = ? AND a.user_id = b.posted_by ORDER BY b.posted_on ASC');
        $values = array($level);
        //var_dump($values);
        $query->execute($values);
        //var_dump($query->fetch());
        return $query;
        }catch (PDOException $e) {
            var_dump($e);
        }
    }

    function getLeaderBoard() {
             $query = $this->db_conn->prepare('SELECT a.full_name as full_name,a.college as college,a.year as year,b.level as level,b.attempts as attempts FROM users a,progress b WHERE a.user_id = b.user_id AND a.role = 0 ORDER BY b.level DESC,b.latest_attempt ASC,b.attempts ASC');

        $query->execute();
        return $query;
    }

    function deletePost($postid) {
        $query = $this->db_conn->prepare('DELETE FROM forum_posts WHERE post_id = ?');
        $values = array($postid);
        $query->execute($values);
    }

    function clearCount($level) {
        $query = $this->db_conn->prepare('UPDATE forum_topics SET post_count = 0 WHERE topic_id = ?');
        $values = array($level);
        $query->execute($values);
    }
    function getCount($level) {
        $query = $this->db_conn->prepare('SELECT post_count FROM forum_topics WHERE topic_id = ?');
        $values = array($level);
        $query->execute($values);
        $obj = $query->fetch(PDO::FETCH_OBJ);
        return $obj->post_count;
    }
}

?>