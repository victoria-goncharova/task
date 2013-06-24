<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Please enter username and password"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Oops, you are not allowed to view this page';
    exit;
} else {
    header('/add-post.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	</head>
	<body>
		<form action="" method="post">
			<p>Title:</p>
			<input type="text" name="title" value="">
			<p>Text:</p>
			<textarea type="text" name="post" rows="10" cols="45" value=""></textarea><br>
			<button id="submit" type="submit" value="">Submit</button>
		</form>
		<?php
			include 'blog.class.php';
			$blog = new Blog();
			if ( (!empty($_POST['title'])) && (!empty($_POST['post']))){
				$blog -> add_post();
				echo '<p>Your post has been added!</p>';
			}
			else{
				echo '<p>Please, fill out all form fields</p>';
			}
		?>
	</body>
</html>