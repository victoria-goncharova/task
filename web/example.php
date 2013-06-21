<?php
include 'abtest.class.php';
session_start();
/*
 
 

$abtest1 = new ABTest('Background Color');
$abtest1->addOption('Pink Page');
$abtest1->addOption('Red Page');

$selected_option = $abtest1->selectOption();
*/


/*switch($selected_option){
	case 'Pink Page':
	$bgcolor = '#ff7777';
	break;
	
	case 'Red Page':
	$bgcolor = '#c22';
	break;
	
	case 'Blue Page':
	$bgcolor = '#2255ff';
	break;
}

// OR

$possible_bgcolors = array(
	'Pink Page' => '#ff7777',
	'Red Page' => '#c22',
	'Blue Page' => '#2255ff'
);
$bgcolor = $possible_bgcolors[$selected_option];

*/
/*
 
$abtest2 = new ABTest('Click Here Buttons');
$abtest2->addOption('Blue Button');
$abtest2->addOption('Red Button');
$abtest2->selectAll();
*/


$abtest3 = new ABTest('Contact Form');
$abtest3->addOption('Short',.333333);
$abtest3->addOption('Middle',.333333);
$abtest3->addOption('Long',.333333);
$form_length = $abtest3->selectOption();

if(!empty($_POST)){
	$variant_key = $_POST['abtest_variant'];
	$abtest3->markConversion($variant_key);
	$message_text = "<p>Conversion marked for <b>$variant_key</b></p>";
}



$abtest4 = new ABTest('Contact Form');
$testresults = $abtest4->getTestResults();
$is_configured = (count($testresults) > 0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ABTest Example</title>
<style type="text/css">
/* EXAMPLE 1 */
body{background-color:<?php echo $bgcolor;?>;}

.button{display:inline-block; padding:10px; color:#fff; cursor:pointer}
.button.red{background-color:#f00}
.button.blue{background-color:#00f}

pre{padding:10px; background:#fff; border-radius:5px}
</style>
</head>

<body>

<?php if(!$is_configured) echo '<p>It appears you aren\'t configured properly. Please open <a href="config.php">config.php</a>.</p>';?>

<!-- EXAMPLE 2 -->



<!-- EXAMPLE 3 -->
<?php echo $message_text;?>
<form action="" method="post">
	<input type="hidden" name="abtest_variant" value="<?php echo $abtest3->option_key;?>" />
	
	<div>
		<label>Name</label>
		<input type="text" name="name" />
	</div>
	<div>
		<label>Email</label>
		<input type="text" name="email" />
	</div>

<?php
switch($form_length){
case 'Middle':
echo '<div>
		<label>Phone</label>
		<input type="text" name="phone" />
	</div>';
break;
case 'Long':
echo '<div>
		<label>Phone</label>
		<input type="text" name="phone" />
	</div>';
echo '<div>
		<label>Address</label>
		<input type="text" name="address" />
	</div>';
break;
}

?>
	

	
	<div>
		<label>Comments</label>
		<textarea name="comments"></textarea>
	</div>
	
	<input type="submit" value="Send" />
</form>
<?php //session_destroy();?>

</body>
</html>