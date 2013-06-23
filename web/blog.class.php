<?php
class Blog{
	private $db_server = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'posts';
function db_connect(){
	try {
		$conn = new PDO("mysql:host=$this->db_server;dbname=$this->database", $this->username, $this->password);
		$conn -> setAttribute(
		PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOException $e) {
		echo 'ERROR: ' . $e -> getMessage();
	}	
}
function get_all_posts(){
	$conn = $this-> db_connect();
	$res = $conn -> prepare('SELECT title FROM posts ORDER BY created_at DESC');
	$res -> execute();
	$i = 0;
	while($row = $res -> fetch(PDO::FETCH_ASSOC)){
		foreach($row as $key => $val){
			$results[$i] = $val;
		}
		$i++;
	}
	return $results;
}
function print_all_posts(){
	$result = $this -> get_all_posts();
	foreach ($result as $title){
		echo '<h2>'.$title.'</h2>';
	}
}
function print_post(){
	$conn = $this -> db_connect();
	$res = $conn -> prepare('SELECT title, post, created_at FROM posts WHERE id=:id');
	$res -> execute(array(':id'=>$_GET['id']));
	$results = $res -> fetch(PDO::FETCH_ASSOC);
	if ($results != null) {
		foreach ($results as $key){
			echo '<p>'.$key.'</p>';
		}	
	}
	else {
		header("HTTP/1.0 404 Not Found");
		exit; 
	}
}
function add_post (){
	$conn = $this -> db_connect();
	$res = $conn -> prepare('INSERT INTO posts(title,post,created_at) VALUES (:title, :post, :created_at)' );
	$created_at = date(YmdHms);
	$res ->  execute(array(':title' => $_POST['title'], ':post' => $_POST['post'],':created_at' => $created_at));
}

function get_title(){
	$conn = $this -> db_connect();
	$res = $conn -> prepare('SELECT title FROM posts WHERE id=:id');
	$res -> execute(array(':id' => $_GET['id']));
		for($i=0; $row = $res -> fetch(); $i++){
			echo $row['title'];
		}
}
function get_text(){
	$conn = $this -> db_connect();
	$res = $conn -> prepare('SELECT post FROM posts WHERE id=:id');
	$res -> execute(array(':id'=>$_GET['id']));
	for($i=0; $row = $res -> fetch(); $i++){
        echo $row['post'];
    }
}
function update_post(){
	$conn = $this -> db_connect();
	$res = $conn -> prepare('UPDATE posts SET title=:title, post=:post WHERE id=:id');
	$res -> execute(array(':id'=>$_GET['id'],':title'=>$_POST['title'],':post'=>$_POST['post']));
	}
}