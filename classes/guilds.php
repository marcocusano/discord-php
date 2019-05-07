<?php

    class DISCORD_GUILDS {

        // Create Guild Ban
        function ban($guildID, $userID, $params = null) { global $discord;
            if (is_numeric($guildID) && is_numeric($userID)) {
                $params["isQuery"] = true;
                return $discord->requests->put($discord->keys["api"]["guilds"] . "/$guildID/bans/$userID", $params);
            } else {
                return 0;
            }
        }

        // Get Guild Bans
        function bans($guildID, $userID = null) { global $discord;
            if (is_numeric($guildID)) {
                if (is_numeric($userID)) {
                    return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/bans/$userID");
                } else {
                    return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/bans");
                }

            } else {
                return 0;
            }
        }

        // Get Guild Channels
        function channels($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/channels");
            } else {
                return 0;
            }
        }

        // Create Guild
        function create($params) { global $discord;
            if ($params) {
                return $discord->requests->post($discord->keys["api"]["guilds"], $params);
            } else {
                return 0;
            }
        }

        // Create Guild Channel
        function createChannel($guildID, $params) { global $discord;
            if (is_numeric($guildID) && $params) {
                return $discord->requests->post($discord->keys["api"]["guilds"] . "/$guildID/channels", $params);
            } else {
                return 0;
            }
        }

        // Create Guild Emoji

        // Create Guild Integration

        // Create Guild Role
        function createRole($guildID, $params) { global $discord;
            if (is_numeric($guildID) && $params) {
                return $discord->requests->post($discord->keys["api"]["guilds"] . "/$guildID/roles", $params);
            } else {
                return 0;
            }
        }

        // Delete Guild
        function delete($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->delete($discord->keys["api"]["guilds"] . "/$guildID");
            } else {
                return 0;
            }
        }

        // Delete Channel
        function deleteChannel($channelID) { global $discord; return $discord->channels->delete($channelID); }

        // Delete Guild Emoji
        function deleteEmoji($guildID, $emoji) { global $discord;
            if (is_numeric($guildID) && $emoji) {
                return $discord->requests->delete($discord->keys["api"]["guilds"] . "/$guildID/emojis/$emoji");
            } else {
                return 0;
            }
        }

        // Delete Guild Integration

        // Delete Guild Role
        function deleteRole($guildID, $roleID) { global $discord;
            if (is_numeric($guildID) && is_numeric($roleID)) {
                return $discord->requests->delete($discord->keys["api"]["guilds"] . "/$guildID/roles/$roleID");
            } else {
                return 0;
            }
        }

        // Modify Guild
        function edit($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->patch($discord->keys["api"]["guilds"] . "/$guildID", $params);
            } else {
                return 0;
            }
        }

        // Modify Guild Channel
        function editChannel($channelID, $params) { global $discord; return $discord->channels->edit($channelID, $params); }

        // Edit Guild Embed

        // Modify Guild Emoji
        function editEmoji($guildID, $emoji, $params) { global $discord;
            if (is_numeric($guildID) && $emoji && $params) {
                return $discord->requests->patch($discord->keys["api"]["guilds"] . "/$guildID/emojis/$emoji", $params);
            } else {
                return 0;
            }
        }

        // Edit Guild Integration

        // Modify Guild Role
        function editRole($guildID, $roleID, $params) { global $discord;
            if (is_numeric($guildID) && is_numeric($roleID) && $params) {
                return $discord->requests->patch($discord->keys["api"]["guilds"] . "/$guildID/roles/$roleID", $params);
            } else {
                return 0;
            }
        }

        // Get Guild Embed

        // Get Guild Emoji
        function emoji($guildID, $emoji) { global $discord;
            if (is_numeric($guildID) && $emoji) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/emojis/$emoji");
            } else {
                return 0;
            }
        }

        // List Guild Emojis
        function emojis($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/emojis");
            } else {
                return 0;
            }
        }

        // Get Guild
        function get($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID");
            } else {
                return 0;
            }
        }

        // Get Guild Integrations
        function integrations($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/integrations");
            } else {
                return 0;
            }
        }

        // Get invite
        function invite($invite) { global $discord; return $discord->invites->get($invite); }

        // Get Guild invites
        function invites($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/invites");
            } else {
                return 0;
            }
        }

        // Remove Guild Member
        function kick($guildID, $userID) { global $discord;
            if (is_numeric($guildID) && is_numeric($userID)) {
                return $discord->requests->delete($discord->keys["api"]["guilds"] . "/$guildID/members/$userID");
            } else {
                return 0;
            }
        }

        // Get Guild Members
        function member($guildID, $memberID) { global $discord;
            if (is_numeric($guildID) && is_numeric($memberID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/members/$memberID");
            } else {
                return 0;
            }
        }

        // Add Guild Member Role
        function memberRole($guildID, $userID, $roleID) { global $discord;
            if (is_numeric($guildID) && is_numeric($userID) && is_numeric($roleID)) {
                return $discord->requests->put($discord->keys["api"]["guilds"] . "/$guildID/members/$userID/roles/$roleID");
            } else {
                return 0;
            }
        }
            function addMemberRole($guildID, $userID, $roleID) { global $discord; return $discord->guilds->memberRole($guildID, $userID, $roleID); }

        // List Guild Members
        function members($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/members");
            } else {
                return 0;
            }
        }

        // Get Guild Voice Regions
        function regions($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/regions");
            } else {
                return 0;
            }
        }

        // Remove Guild Member Role
        function removeMemberRole($guildID, $userID, $roleID) { global $discord;
            if (is_numeric($guildID) && is_numeric($userID) && is_numeric($roleID)) {
                return $discord->requests->delete($discord->keys["api"]["guilds"] . "/$guildID/members/$userID/roles/$roleID");
            } else {
                return 0;
            }
        }

        // Get Guild Roles
        function roles($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/roles");
            } else {
                return 0;
            }
        }

        // Remove Guild Ban
        function unban($guildID, $userID) { global $discord;
            if (is_numeric($guildID) && is_numeric($userID)) {
                return $discord->requests->delete($discord->keys["api"]["guilds"] . "/$guildID/bans/$userID");
            } else {
                return 0;
            }
        }
            function removeBan($guildID, $userID) { global $discord; $discord->guilds->unban($guildID, $userID); }
            function revokeBan($guildID, $userID) { global $discord; $discord->guilds->unban($guildID, $userID); }
            function deleteBan($guildID, $userID) { global $discord; $discord->guilds->unban($guildID, $userID); }

        // Get Guild Vanity URL
        function vanity($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/vanity-url");
            } else {
                return 0;
            }
        }

        // Get Guild Widget Image

    }

?>
