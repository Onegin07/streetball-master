<?php

// Общие настройки

	$cookie_player_id = null; // id игрока в куки

	// если существует куки, то берем id залогиненного игрока
	if(isset($_COOKIE["player_id"])) {
		$cookie_player_id = $_COOKIE["player_id"];
	}

?>