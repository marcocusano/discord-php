<?php

    class DISCORD_GATEWAY {

        function get() { global $discord;
            return $discord->requests->get($discord->keys["api"]["gateway"]);
        }

        function getBot() { global $discord;
            return $discord->requests->get($discord->keys["api"]["gateway"] . "/bot");
        }

        

    }

?>
