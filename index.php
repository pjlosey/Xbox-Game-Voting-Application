<?php include("header.php"); ?>
<!-- Include the Header.php File  Comment is below as puts IE in quirks mode.-->

			<article>
				<h1>Vote For A New Xbox Game</h1>
				
				<!-- This table shows the games that are bing voted on -->
				<table>
					<caption>Add a Game or vote below. (Only 1 Vote or Add per Day.)</caption>
					<tbody>
						<tr>
							<th>Votes</th>
							<th>Game Title</th>
							<th>Vote</th>
						</tr>
						<!-- This loops though all the owned games -->
						<?php 
						$games = new games();
						//$games = sort2d($games, 3);
						$games_wanted = $games->get_games();
						foreach ($games_wanted as $game) {
							if ($game->status == 'wantit'){
							?>							
							<tr>
								<td><?=$game->votes;?></td>
								<td><?=$game->title;?></td>
								<td><a href="/?vote=<?=$game->id;?>">Vote</a></td>
							</tr>
						<? }} ?>
						<tr>
							<th>Votes</th>
							<th>Game Title</th>
							<th>Vote</th>
						</tr>
					</tbody>
				</table>
				
				<!-- Form for adding a Game / Voting on that game -->
				<form method="post" action="/">
					<label> Add a Game Title: <input name="game"></label>
					<button>Submit / Vote</button>
				</form>
				<p>*If you add a game it also counts as your vote for the day.</p>
			</article>
			
<!-- Include the Footer.php File -->
<?php include("footer.php"); ?>