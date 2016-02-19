<?php

	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__.'/../src/RockPaperScissors.php';
	require_once __DIR__.'/../src/Player.php';


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
		// var_dump($_SESSION['choices']);
		return $app['twig']->render('game.html.twig');
	});

	$app->post('/newplayers', function() use ($app){
		$_SESSION['players'] = array();
		$player_one = new Player($_POST['name1']);
		$player_two = new Player($_POST['name2']);
		array_push($_SESSION['players'], $player_one);
		array_push($_SESSION['players'], $player_two);
		return $app['twig']->render('game.html.twig', array("player1" => $player_one->getName(), "player2" =>$player_two->getName(),"players" => $_SESSION['players']));
	});



	$app->post('/player1', function() use ($app){
		array_push($_SESSION['choices'], $_POST['player1']);
		// var_dump($_SESSION['choices']);
		$chosen = $_SESSION['choices'];
		$player_one = ($_SESSION['players'][0]);
		$player_two = ($_SESSION['players'][1]);
		return $app['twig']->render('game.html.twig', array("player1" => $player_one->getName(), "player2" =>$player_two->getName(), 'player1score'=> $player_one->getScore(), "player2score"=> $player_two->getScore(),"players" => $_SESSION['players'], "chosen"=>$chosen));
	});
	$app->post('/player2', function() use ($app){
		array_push($_SESSION['choices'], $_POST['player2']);
		// var_dump($_SESSION['choices']);
		$chosen = $_SESSION['choices'];
		$player_one = ($_SESSION['players'][0]);
		$player_two = ($_SESSION['players'][1]);
		return $app['twig']->render('game.html.twig' , array("player1" => $player_one->getName(), "player2" =>$player_two->getName(), 'player1score'=> $player_one->getScore(), "player2score"=> $player_two->getScore(),"players" => $_SESSION['players'], "chosen"=>$chosen));
	});


	$app->post('/results', function() use ($app){
		$rps = new RockPaperScissors($_SESSION['choices'][0], $_SESSION['choices'][1]);
		$result = $rps->playGame();
		$player_one = ($_SESSION['players'][0]);
		$player_two = ($_SESSION['players'][1]);
		if ($result == "Player 1"){
			$player_one->addPoint();
		}
		if ($result == "Player 2"){
			$player_two->addPoint();
		}
		// var_dump($_SESSION['choices']);
		return $app['twig']->render('game.html.twig', array('result' => $result, 'player1score'=> $player_one->getScore(), "player2score"=> $player_two->getScore(),"players" => $_SESSION['players'], "player1" => $player_one->getName(), "player2" =>$player_two->getName()));
	});

	$app->get('/newgame', function() use ($app){
		$_SESSION['choices'] = array();
		$player_one = ($_SESSION['players'][0]);
		$player_two = ($_SESSION['players'][1]);
		// var_dump($_SESSION['choices']);
		//
		// echo($player_one->getName());
		return $app['twig']->render('game.html.twig', array('result' => $result, 'player1score'=> $player_one->getScore(), "player2score"=> $player_two->getScore(),"players" => $_SESSION['players'], "player1" => $player_one->getName(), "player2" =>$player_two->getName()));
	});

	$app->post('/reset_all', function() use ($app){
		$_SESSION['choices'] = array();
		$_SESSION['players'] = array();
		// var_dump($_SESSION['choices']); var_dump($_SESSION['players']);
		return $app['twig']->render('game.html.twig');
	});

	return $app;

?>
