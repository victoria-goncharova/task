<?php
class Blog{
	public $db_server = 'localhost';
	public $username = 'root';
	public $password = '';
	public $database = 'posts';
	public $db_table = 'posts';
function db_connect(){
	try {
		$conn = new PDO('mysql:host=localhost;dbname=posts', $this->username, $this->password);
		$conn->setAttribute(
		PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}	
}
function get_all_posts(){
	$conn = $this->db_connect();
	$res = $conn ->prepare('SELECT title FROM posts ORDER BY created_at DESC');
	$res ->execute();
	$i = 0;
	while($row = $res->fetch(PDO::FETCH_ASSOC)){
		foreach($row as $key => $val){
			$results[$i] = $val;
		}
		$i++;
	}
		
	return $results;
}
function print_all_posts(){
	$result = $this ->get_all_posts();
	foreach ($result as $title){
		echo '<h2>'.$title.'</h2>';
	}
}
function get_post(){
	$conn=$this->db_connect();
	$res = $conn->prepare('SELECT title, post, created_at FROM posts WHERE id=:id');
	$res ->bindParam (':id',$_GET['id'], PDO::PARAM_INT);
	$res ->execute();
	$results = $res->fetch(PDO::FETCH_ASSOC);
	return $results;
}

function print_post(){
	if (isset($_GET['id'])){
		$result=$this->get_post();
		foreach ($result as $key){
			echo '<p>'.$key.'</p>';
		}
	}
}
}
$blog = new Blog;
$blog ->print_all_posts();
$blog ->print_post();