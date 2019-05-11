<?php

    class DISCORD_USERS {

        // Get User DMs
        function dms($token = null) { global $discord;
            if ($token) {
                return $discord->requests->custom($discord->keys["api"]["users"] . "/@me/channels", "GET", null, null, "Bearer", $token);         
            } else {
                return $discord->requests->get($discord->keys["api"]["users"] . "/@me/channels");
            }
        }
            function channels($userID = null, $token = null) { global $discord; return $discord->users->dms($userID, $token); }

        // Modify Current User
        function edit($params) { global $discord;
            if ($params) {
                return $discord->requests->patch($discord->keys["api"]["users"] . "/@me");
            } else {
                return 0;
            }
        }

        // Get User
        function get($userID = null, $token = null) { global $discord;
            if ($token) {
                return $discord->requests->custom($discord->keys["api"]["users"] . "/@me", "GET", null, null, "Bearer", $token);
            } else if (is_numeric($userID)) {
                return $discord->requests->get($discord->keys["api"]["users"] . "/$userID");
            } else {
                return $discord->requests->get($discord->keys["api"]["users"] . "/@me");
            }
        }

        // Get User Guilds
        function guilds($token = null) { global $discord;
            if ($token) {
                return $discord->requests->custom($discord->keys["api"]["users"] . "/@me/guilds", "GET", null, null, "Bearer", $token);         
            } else {
                return $discord->requests->get($discord->keys["api"]["users"] . "/@me/guilds");
            }
        }

        // Leave Guild
        function leaveGuild($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->delete($discord->keys["api"]["users"] . "/@me/guilds/$guildID");
            } else {
                return 0;
            }
        }

        // Get Current User
        function me() { global $discord; return $discord->users->get(); }

    }

?>
