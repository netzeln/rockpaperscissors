<?php
	 class RockPaperScissors
		{
			private $playerOne;
			private $playerTwo;

			function __construct($playerOne, $playerTwo)
			{
				$this->playerOne = $playerOne;
				$this->playerTwo = $playerTwo;

			}

			function getPlayerOne()
			{
				return $this->playerOne;
			}

			function setPlayerOne($choice)
			{
				$this->playerOne = $choice;
			}

			function getPlayerTwo()
			{
				return $this->playerTwo;
			}

			function setPlayerTwo($choice)
			{
				$this->playerTwo = $choice;
			}

			function playGame ()
			{

				if ($this->getPlayerOne() == "rock" && ($this->getPlayerTwo() == "scissors" ||$this->getPlayerTwo()== "lizard") || $this->getPlayerOne() == "paper" && ($this->getPlayerTwo() == "rock" || $this->getPlayerTwo() == "spock")|| $this->getPlayerOne() == "scissors" && ($this->getPlayerTwo() == "paper" || $this->getPlayerTwo() =="lizard") || $this->getPlayerone() == "spock" && ($this->getPlayerTwo() == "scissors" || $this->getPlayerTwo() == "rock") || $this->getPlayerOne() == "lizard" && ($this->getPlayerTwo() == "spock" || $this->getPlayerTwo() == "paper"))
				{
					return "Player 1";
				}
				elseif ($this->getPlayerOne() == $this->getPlayerTwo())
				{
					return "It is a tie";
				}
				else
				{
					return "Player 2";
				}

			}


	}
 ?>
