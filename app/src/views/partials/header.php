<?php

use Helpers\UserHelper;

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap, FontAwesome, Custom Styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
	      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog Name</title>
</head>
<body class="d-flex flex-column min-vh-100">
<div id = "main_header" class="navbar">
	<a href="https://localhost"><img src="https://via.placeholder.com/150"/></a><span>Blog Name</span>
</div>
<div id = "navigation">
	<a href="http://localhost/">Ubersicht</a>
	<?php if(UserHelper::loggedIn()) { ?><a href="http://localhost/create_article">Neuer Eintrag</a><?php } ?>
	<a href="http://localhost/impressum">Impressum</a>
	
</div>