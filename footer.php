			<!-- Aside or Left Column -->
			<aside>
				<h1>Games Owned by the Nerdery</h1>
				<br />
				<!-- This table shows the games that are bing voted on -->
				<table>
					<tbody>
						<tr>
							<th>Game Title</th>
						</tr>
						
						<!-- This loops though all the owned games -->
						<?php 
						$games = new games();
						$games_owned = $games->get_games();
						
						foreach ($games_owned as $game) {
							if ($game->status == 'gotit'){
							?>							
							<tr>
								<td><?=$game->title;?></td>
							</tr>
						<? }} ?>
						<!-- End loop of owned games -->
						
						<tr>
							<th>Game Title</th>
						</tr>
					</tbody>
				</table>
		</aside>
		
		<!-- The Footer -->
		<footer>
			<p><a href="/">Home</a> | <a href="/select_game.php">Select Winning Game</a> | Hosted and Designed by <a href="http://pjlosey.com">PJLosey.com</a> | <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fxbox.pjlosey.com<?=$_SERVER['REQUEST_URI'];?>">W3C Valid</a></p>
		</footer>
	
	<!-- End Div B -->
	</div>

</div><!-- End Div A -->
</html>

