<?php

	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__.'/../src/RockPaperScissors.php';

	use Symfony\Component\Debug\Debug;
	Debug::enable();
	session_start();
	if(empty($_SESSION['choices']))
	{
		$_SESSION['choices'] = array();
	}

	$app = new Silex\Application();
$app['debug'] = true;
	$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

	$app->get('/', function() use ($app){
		$_SESSION['choices'] = array();
		return $app['twig']->render('playerOne.html.twig');
	});

	$app->post('/player2', function() use ($app){
		array_push($_SESSION['choices'], $_POST['player1']);
		return $app['twig']->render('playerTwo.html.twig');
	});

	$app->post('/results', function() use ($app){
		array_push($_SESSION['choices'], $_POST['player2']);
		$rps = new RockPaperScissors($_SESSION['choices'][0], $_SESSION['choices'][1]);
		$result = $rps->playGame();
		return $app['twig']->render('game_result.html.twig', array('result' => $result));
	});


	return $app;

?>
