<?php
	 class Player
		{
			private $name;
			private $score;

			function __construct($name)
			{
				$this->name = $name;
				$this->choice = "";
				$this->score = 0;

			}



			function setName($name)
			{
				$this->name = $name;
			}

			function getName()
			{
				return $this->name;
			}

			function setChoice($choice)
			{
				$this->choice = $choice;
			}

			function getChoice()
			{
				return $this->choice;
			}

			function setScore($score)
			{
				$this->score = $score;
			}

			function getScore()
			{
				return $this->score;
			}

			function addPoint()
			{
					$this->score = $this->score + 1;

			}


	}
 ?>
