<?php
	 class RockPaperScissors
		{
			private $name;
			private $score;

			function __construct($name,)
			{
				$this->name = $name;
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

			function setScore($score)
			{
				$this->score = $score;
			}

			function getScore()
			{
				return $this->score;
			}

			function playGame ()
			{


			}


	}
 ?>
