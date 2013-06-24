<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	</head>
	<body>
	<?php 
		include 'blog.class.php';
		$blog = new Blog();
		$blog -> print_all_posts();
	?>
	</body>
</html>