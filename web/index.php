<!DOCTYPE html>
<html lang="en">
<head>
	<title>Abi Napier Homepage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/basic.js"></script>
</head>
<body>
	<header>
		<nav>
			<?php 
		        include $_SERVER['DOCUMENT_ROOT'] . '/common/nav.php';
		    ?>
		</nav>
		<h1><span>Abi</span><span>Napier</span></h1>
		<img src="images/me.jpg" alt="abi napier">
	</header>
	<main>
		<p><span>Hey there, I’m Abi.</span>
		I like making pretty things that make your life easier (aka. simple and beautiful sites and software). Being a developer wasn’t ever in my plan, but being a designer was, so it’s a little funny that my technical background is much more developer than designer. When I’m not programming away I’m probably making cookies, or burning off those cookies on a run. Thanks for checking out my work!
		</p>
		<button onclick="goto('assignments.php')">Assignments</button>
	</main>
	<footer>
		<?php 
	        include $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php';
	    ?>
	</footer>

	<script type="text/javascript">
		addActiveClass(1);
	</script>

</body>
</html>