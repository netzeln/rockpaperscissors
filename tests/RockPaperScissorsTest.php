<?php

    require_once "src/RockPaperScissors.php";

    class RockPaperScissorsTest extends PHPUnit_Framework_TestCase
    {

        function test_playGame_rock_scissors()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors("rock", "scissors");

            //Act
            $result = $test_RockPaperScissors->playGame();

            //Assert
            $this->assertEquals("Player 1", $result);
        }

				function test_playGame_paper_rock()
        {
            //Arrange
            $test_RockPaperScissors = new RockPaperScissors("paper", "rock");

            //Act
            $result = $test_RockPaperScissors->playGame();

            //Assert
            $this->assertEquals("Player 1", $result);
        }

				function test_playGame_scissors_paper()
				{
						//Arrange
						$test_RockPaperScissors = new RockPaperScissors("scissors", "paper");

						//Act
						$result = $test_RockPaperScissors->playGame();

						//Assert
						$this->assertEquals("Player 1", $result);
				}

				function test_playGame_tie()
				{
					//Arrange
					$test_RockPaperScissors = new RockPaperScissors("rock", "rock");

					//Act
					$result = $test_RockPaperScissors->playGame();

					//Assert
					$this->assertEquals('It is a tie', $result);
				}

				function test_playGame_player2Wins()
				{
					//Arrange
					$test_RockPaperScissors = new RockPaperScissors("scissors", "rock");

					//Act
					$result = $test_RockPaperScissors->playGame();

					//Assert
					$this->assertEquals('Player 2', $result);

				}
    }

?>
