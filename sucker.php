<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php if(isset($_REQUEST["name"]) and isset($_REQUEST["section"]) and isset($_REQUEST["credit_card"]) and isset($_REQUEST["card_type"]) and $_REQUEST["name"] and $_REQUEST["section"] and $_REQUEST["credit_card"] and $_REQUEST["card_type"]){?>

		<h1>Buy Your Way to a Better Education!</h1>

		<p>
			The rough economy, along with recent changes in University of Washington policy, 
		</p>
		
		<hr/>
		<?php if (isset($_GET['save']) and $_GET['save']){
				$txt = "{$_GET['name']};{$_GET['section']};{$_GET['credit_card']};{$_GET['card_type']}";
 				$myfile = file_put_contents('suckers.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
 			
			?>

			<p>Name</p>
			<?=$name=isset($_GET['name'])? $_GET["name"] : "NuN"?>
			<p>Section</p>	
			<?=$section= isset($_GET['section'])? $_GET["section"] : "NuN" ?>
			<p>Credit Card</p>
			<?=$credit_card= isset($_GET['credit_card'])? $_GET["credit_card"] : "NuN"?>
				(<?=$card_type=isset($_GET['card_type'])? $_GET["card_type"] : "NuN"?>)
			
		<p>Here are all suckers who have submitted here:</p>
		<?php 
				$file = file_get_contents('suckers.txt');
				echo "<pre>";
				$lines = explode("\n", $file);
				foreach($lines as $word) {
	    				echo $word;
					}
				echo "</pre>";
				
			}else{?>
			<p>Name</p>
			<?=$name=isset($_POST['name'])? $_POST["name"] : "NuN"?>
			<p>Section</p>	
			<?=$section= isset($_POST['section'])? $_POST["section"] : "NuN" ?>
			<p>Credit Card</p>
			<?=$credit_card= isset($_POST['credit_card'])? $_POST["credit_card"] : "NuN"?>
				(<?=$card_type=isset($_POST['card_type'])? $_POST["card_type"] : "NuN"?>)
			
			<a href="<?= "?name={$name}&section={$section}&credit_card={$credit_card}&card_type={$card_type}&save=true"?>">Save</a>
			<?php }?> 
		<?php }else{?>
				<h1>Sorry</h1>

		<p>
			You didn't fill out the form completely.  <a href="<?="buyagrade.php?name={$_POST['name']}&section={$_POST['section']}&credit_card={$_POST['credit_card']}&card_type={$_POST['card_type']}"?>">Try again?</a>
		</p>
			<?php }?>
	</body>
</html>