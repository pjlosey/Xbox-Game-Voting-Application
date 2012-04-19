<?php 



class games {
	
	// This function gets all games
	public function get_games() {
		$key = "ba5e3539ef3c5381f710b1f8d1e7cd31";
		$client = new SoapClient("http://xbox.sierrabravo.net/v2/xbox.wsdl");
		$games = $client->getGames($key);

		return $games;
		//print_r( $games );
		
	}

	// This function adds a vote to the set game
	public function add_vote($id) {
		// Check if its Saturday or Sunday (If So Cant Vote)
		if (date('N') != 6 && date('N') != 7) {			
			// If Cookie Voted is set (Dont allow Voting)
			if (!isset($_COOKIE["voted"])) {
				setcookie("voted", "yes", mktime(23, 59, 59, date("m"), date("d"), date("y"))); 
				$key = "ba5e3539ef3c5381f710b1f8d1e7cd31";
				$client = new SoapClient("http://xbox.sierrabravo.net/v2/xbox.wsdl");
				$client->addVote($key, $id);
				$message = 'Thank you for Voting.';
				$_SESSION['message'] = $message;
			// Cookie was already set, send back message
			} else {
				$message = 'You have already added a game or voted today.';
				$_SESSION['message'] = $message;
			}
		// If its saturday or sunday send back message not letting vote.
		} else {
			$message = 'You may Not vote on Saturday or Sunday.';
			$_SESSION['message'] = $message;
		}
	}
	
	// This function adds a game with the set title
	public function add_game($title) {
		// Check if its Saturday or Sunday (If So Cant Vote)		
		if (date('N') != 6 && date('N') != 7) {			
			// If Cookie Voted is set (Dont allow Adding a Game)
			if (!isset($_COOKIE["voted"])) {
				$key = "ba5e3539ef3c5381f710b1f8d1e7cd31";
				$client = new SoapClient("http://xbox.sierrabravo.net/v2/xbox.wsdl");				
				
				// Check if game is is already owned or on the vote list, if not it will add the game to the list
				$games = new games();
				$games_owned = $games->get_games();
				$games_owned_count = 0;
				foreach ($games_owned as $game) {
					if($game->title == $title) { $games_owned_count = $games_owned_count+1; }
				}
				// If game is not on lists then add game to vote list
				if($games_owned_count == 0) {
					$client->addGame($key, $title);
					setcookie("voted", "yes", mktime(23, 59, 59, date("m"), date("d"), date("y"))); 
					$message = 'Your game was added and voted on.';
					$_SESSION['message'] = $message;
				// if game is on the list then send back a message
				} else {
					$message = 'That game is already on the vote list.';
					$_SESSION['message'] = $message;				
				}
			// User has already added a game, send back message
			} else {
				$message = 'You have already added a game or voted today.';
				$_SESSION['message'] = $message;
			}
		} else {
			$message = 'You may Not vote on Saturday or Sunday.';
			$_SESSION['message'] = $message;
		}
	}
	
	// This function changes the status of a game to gotit
	public function set_gotit($id) {
		$key = "ba5e3539ef3c5381f710b1f8d1e7cd31";
		$client = new SoapClient("http://xbox.sierrabravo.net/v2/xbox.wsdl");
		$client->setGotIt($key, $id);
		$message = 'The Game was added to the Owned List.';
		$_SESSION['message'] = $message;
	}

	// This function clears all games from the database with your key
	public function clear_games() {
		$key = "ba5e3539ef3c5381f710b1f8d1e7cd31";
		$client = new SoapClient("http://xbox.sierrabravo.net/v2/xbox.wsdl");
		$client->clearGames($key);
	}

}



?>