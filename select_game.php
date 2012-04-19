<?php include("header.php"); ?>
<!-- Include the Header.php File  Comment is below as puts IE in quirks mode.-->

			<article>
				<h1>Select The Winning Game.</h1>
				
				<!-- This table shows the games that were voted on -->
				<table>
					<caption>Select the game winner for this week.</caption>
					<tbody>
						<tr>
							<th>Votes</th>
							<th>Game Title</th>
							<th>Select Winner</th>
						</tr>
						<!-- This loops though all the games that can be voted on -->
						<?php 
						$games = new games();
						$games_owned = $games->get_games();
						
						foreach ($games_owned as $game) {
							if ($game->status == 'wantit'){
							?>							
							<tr>
								<td><?=$game->votes;?></td>
								<td><?=$game->title;?></td>
								<td><a href="/?gotit=<?=$game->id;?>">Select as winner</a></td>
							</tr>
						<? }} ?>

						<tr>
							<th>Votes</th>
							<th>Game Title</th>
							<th>Select Winner</th>
						</tr>
					</tbody>
				</table>
				
			</article>
			
<!-- Include the Footer.php File -->
<?php include("footer.php"); ?>