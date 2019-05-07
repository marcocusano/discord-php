<?php

    class DISCORD_CHANNELS {

        // Bulk Delete Messages
        function bulkDelete($channelID) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->post($discord->keys["api"]["channels"] . "/$channelID/messages/bulk-delete");
            } else {
                return 0;
            }
        }

        // Create Guild Channel
        function create($guildID, $params) { global $discord; return $discord->guilds->createChannel($guildID, $params); }

        // Create Channel Invite
        function createInvite($channelID, $params) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->post($discord->keys["api"]["channels"] . "/$channelID/invites", $params);
            } else {
                return 0;
            }
        }

        // Create Message
        function createMessage($channelID, $params = array("content" => "This is an example message sent by **Syglob Discord PHP Lib**.\n\nMore at https://apps.syglob.com/discord")) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->post($discord->keys["api"]["channels"] . "/$channelID/messages", $params);
            } else {
                return 0;
            }
        } function send($channelID, $params = array("content" => "This is an example message sent by **Syglob Discord PHP Lib**.\n\nMore at https://apps.syglob.com/discord")) { global $discord; return $discord->channels->createMessage($channelID, $params); }

        // Delete/Close Channel
        function delete($channelID) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->delete($discord->keys["api"]["channels"] . "/$channelID");
            } else {
                return 0;
            }
        }

        // Delete Message
        function deleteMessage($channelID, $messageID) { global $discord;
            if (is_numeric($channelID) && is_numeric($messageID)) {
                return $discord->requests->delete($discord->keys["api"]["channels"] . "/$channelID/messages/$messageID");
            } else {
                return 0;
            }
        }

        // Delete Pinned Channel Message
        function deletePin($channelID, $messageID) { global $discord;
            if (is_numeric($channelID) && is_numeric($messageID)) {
                return $discord->requests->delete($discord->keys["api"]["channels"] . "/$channelID/pins/$messageID");
            } else {
                return 0;
            }
        }

        // Delete all reactions
        function deleteReactions($channelID, $messageID) { global $discord;
            if (is_numeric($channelID) && is_numeric($messageID)) {
                return $discord->requests->delete($discord->keys["api"]["channels"] . "/$channelID/messages/$messageID/reactions");
            } else {
                return 0;
            }
        }

        // Edit Channel
        function edit($channelID, $params) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->patch($discord->keys["api"]["channels"] . "/$channelID", $params);
            } else {
                return 0;
            }
        }

        function editMessage($channelID, $messageID, $params = array("content" => "This is an example message sent by **Syglob Discord PHP Lib**.\n\nMore at https://apps.syglob.com/discord")) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->patch($discord->keys["api"]["channels"] . "/$channelID/messages/$messageID", $params);
            } else {
                return 0;
            }
        }

        // Get Channel
        function get($channelID) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->get($discord->keys["api"]["channels"] . "/$channelID");
            } else {
                return 0;
            }
        }

        // Get Channel Message
        function message($channelID, $messageID) { global $discord;
            if (is_numeric($channelID) && is_numeric($messageID)) {
                return $discord->requests->get($discord->keys["api"]["channels"] . "/$channelID/messages/$messageID");
            } else {
                return 0;
            }
        }

        // Get Reactions
        function messageReactions($channelID, $messageID, $emoji) { global $discord;
            if (is_numeric($channelID) && is_numeric($messageID)) {
                return $discord->requests->get($discord->keys["api"]["channels"] . "/$channelID/messages/$messageID/reactions/$emoji");
            } else {
                return 0;
            }
        } function reactions($channelID, $messageID) { global $discord; return $discord->channels->messageReactions($channelID, $messageID); }

        // Get Channels Messages
        function messages($channelID) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->get($discord->keys["api"]["channels"] . "/$channelID/messages");
            } else {
                return 0;
            }
        }

        // Add Pinned Channel Message
        function pin($channelID, $messageID) { global $discord;
            if (is_numeric($channelID) && is_numeric($messageID)) {
                return $discord->requests->put($discord->keys["api"]["channels"] . "/$channelID/pins/$messageID", null, 0);
            } else {
                return 0;
            }
        }

        // Get Pinned Messages
        function pins($channelID) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->get($discord->keys["api"]["channels"] . "/$channelID/pins");
            } else {
                return 0;
            }
        }

        // Create Reaction
        function react($channelID, $messageID, $emoji) { global $discord;
            if (is_numeric($channelID) && is_numeric($messageID) && $emoji) {
                return $discord->requests->put($discord->keys["api"]["channels"] . "/$channelID/messages/$messageID/reactions/$emoji/@me", null, 0);
            } else {
                return 0;
            }
        } function createReaction($channelID, $messageID, $emoji) { global $discord; return $discord->channels->react($channelID, $messageID, $emoji); }

    }

?>
