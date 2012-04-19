<?php include("class_games.php"); ?>
<?php
session_start();

$games = new games();

// If ?vote exist run addVote
if($_GET['vote']) {	$games->add_vote($_GET['vote']);}

// If ?gotit set game to owned
if($_GET['gotit']) {	$games->set_gotit($_GET['gotit']); }

// If ?cleargames will clear all games
if($_GET['cleargames']) {	$games->clear_games(); }

// If ?addgame will add a game
if($_POST['game']) {	$games->add_game($_POST['game']); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Xbox Game Voting Application</title>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="robots" content="index,follow,noarchive">
<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

	<div id="a">
		<header>
			<a href="/" title="Go to Homepage"><strong>Xbox Game Voting Application</strong></a>
			<p>Code Challenge Project, By PJ Losey</p>
		</header>
		<?php if($_SESSION['message']) { ?>
		<p class="highlight-1"><strong>Alert:</strong><?=$_SESSION['message'];?></p>
		<?php unset($_SESSION['message']); ?>
		<?php } ?>

		<div id="b">