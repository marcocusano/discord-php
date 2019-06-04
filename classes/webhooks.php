<?php

    class DISCORD_WEBHOOKS {


        // Get Channel WebHooks
        function channel($channelID) { global $discord;
            if (is_numeric($channelID)) {
                return $discord->requests->get($discord->keys["api"]["channels"] . "/$channelID/webhooks");
            } else {
                return 0;
            }
        }

        // Create a WebHook
        function create($scope, $params) { global $discord;
            if (is_array($params)) {
                if ($scope == "channel") {
                    return $discord->requests->post($discord->keys["api"]["channels"] . "/webhooks", $params);
                } else if ($scope == "guild") {
                    return $discord->requests->post($discord->keys["api"]["guilds"] . "/webhooks", $params);
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        }

        // Delete a WebHook
        function delete($webhookID) { global $discord;
            if (is_numeric($webhookID)) {
                return $discord->requests->delete($discord->keys["api"]["webhooks"] . "/$webhookID");
            } else {
                return 0;
            }
        }

        // Modify a WebHook
        function edit($webhookID, $params) { global $discord;
            if (is_numeric($webhookID) && is_array($params)) {
                return $discord->requests->patch($discord->keys["api"]["webhooks"] . "/$webhookID", $params);
            } else {
                return 0;
            }
        }

        // Execute a WebHook
        function execute($webhookID, $webhookToken, $params = null, $wait = false) { global $discord;
            if (is_numeric($webhookID) && $webhookToken) {
                return $discord->requests->post($discord->keys["api"]["webhooks"] . "/$webhookID/$webhookToken", $params);
            } else {
                return 0;
            }
        }

        // Get a WebHook
        function get($webhookID) { global $discord;
            if (is_numeric($webhookID)) {
                return $discord->requests->get($discord->keys["api"]["webhooks"] . "/$webhookID");
            } else {
                return 0;
            }
        }

        // Get Guild WebHooks
        function guild($guildID) { global $discord;
            if (is_numeric($guildID)) {
                return $discord->requests->get($discord->keys["api"]["guilds"] . "/$guildID/webhooks");
            } else {
                return 0;
            }
        }

    }

?>
