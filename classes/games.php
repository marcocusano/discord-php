<?php

    class DISCORD_GAMES {

        function launch($gameName) { global $discord;
            $game = __DISCORD_ROOT__ . "/games/$gameName.php";
            if (file_exists($game)) {
                include($game);
            } else {
                ?><h1>404: Game not found or not installed correctly</h1><?
            }
        }

    }

?>
