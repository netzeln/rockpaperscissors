<?php

	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__.'/../src/RockPaperScissors.php';


	session_start();
	if(empty($_SESSION['choices']))
	{
		$_SESSION['choices'] = array();
	}

	if(empty($_SESSION['players']))
	{
		$_SESSION['players'] = array();
	}

	$app = new Silex\Application();

	$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

	$app->get('/', function() use ($app){
		$_SESSION['choices'] = array();
		var_dump($_SESSION['choices']);
		return $app['twig']->render('game.html.twig');
	});

	$app->post('/newplayers', function() use ($app){
		$player_one = new Player($_POST['name1']);
		$player_two = new Player($_POST['name2']);
		array_push($_SESSION['choices'], $_POST['player1']);
		var_dump($_SESSION['choices']);
		return $app['twig']->render('game.html.twig');
	});

	$app->post('/player1', function() use ($app){
		array_push($_SESSION['choices'], $_POST['player1']);
		var_dump($_SESSION['choices']);
		return $app['twig']->render('game.html.twig');
	});
	$app->post('/player2', function() use ($app){
		array_push($_SESSION['choices'], $_POST['player2']);
		var_dump($_SESSION['choices']);
		return $app['twig']->render('game.html.twig');
	});


	$app->post('/results', function() use ($app){
		$rps = new RockPaperScissors($_SESSION['choices'][0], $_SESSION['choices'][1]);
		$result = $rps->playGame();
		var_dump($_SESSION['choices']);
		return $app['twig']->render('game.html.twig', array('result' => $result));
	});


	return $app;

?>
