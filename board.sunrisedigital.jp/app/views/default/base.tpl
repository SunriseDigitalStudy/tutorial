<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
	{block css}{/block}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	{block js}{/block}
	<title>Board {block title}{/block}</title>
</head>
<body>
	<header class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><i class="icon-comments-alt text-warning"></i>&nbsp;Board</a>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
		{block main_contents}{/block}
		</div>
	</section>
</body>
</html>