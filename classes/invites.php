<?php

    class DISCORD_INVITES {

        // Create Guild invite
        function create($guildID, $params) { global $discord; return $discord->guilds->createInvite($guildID, $params); }

        // Get Invite
        function get($invite) { global $discord;
            if ($invite) {
                return $discord->requests->get($discord->keys["api"]["invites"] . "/$invite");
            } else {
                return 0;
            }
        }

        // Delete Invite
        function delete($invite) { global $discord;
            if ($invite) {
                return $discord->requests->delete($discord->keys["api"]["invites"] . "/$invite");
            } else {
                return 0;
            }
        }

    }

?>
