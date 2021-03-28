<?php

    namespace Discord {

        class Client {

            function __construct($configs) {
                $this->authKey = $configs->authKey;
                $this->authType = $cofigs->authType;
                $this->id = $configs->id?:null;
                $this->secret = $configs->secret?:null;
                $this->public = $configs->public?:null;
                if (is_array($configs->stash)) { $this->stash = $configs->stash; } else { $this->stash = array(); }
                return true;
            }

            function get($key) {
                $value = $this->$key;
                return $value?:null;
            }

            function stash($guilds) {
                if (is_array($guilds)) {
                    $this->stash = $guilds;
                    return true;
                } else { return false; }
            }

            ///////////////////
            // Stash Classes //
            ///////////////////

            function Guilds($guild) {
                include_once(__DIR__ . "/Discord/Guilds.php");
                if (is_numeric($guild)) {
                    return New \Discord\Client\Guilds($this, $guild);
                } else {
                    $guild = $this->stash[$guild]["guild_id"];
                    if (is_numeric($guild)) {
                        return New \Discord\Client\Guilds($this, $guild);
                    } else { return null; }
                }
            }

            function Channels($channel) {
                include_once(__DIR__ . "/Discord/Channels.php");
                if (is_numeric($channel)) {
                    return New \Discord\Client\Channels($this, $channel);
                } else {
                    foreach($this->stash as $guild => $values) { if (in_array($channel, $values["channels"])) { $channel = $this->stash[$guild]["channels"][$channel]; break; } }
                    if (is_numeric($channel)) {
                        return New \Discord\Client\Channels($this, $channel);
                    } else { return null; }
                }
            }

        }

        class Configs {

            function __construct($configs) {
                if ($configs["token"] || $configs["authKey"]) {
                    $this->authKey = $configs["token"]?:$configs["authKey"];
                    $this->token = $configs["token"]?:null;
                } else { die("<strong>Discord-PHP Error:</strong> Missing Discord Bot Token or authKey!"); }
                $this->authType = $configs["authType"]?:"Bot";
                $this->id = $configs["client_id"]?:null;
                $this->secret = $configs["client_secret"]?:null;
                $this->public = $configs["public_key"]?:null;
                $this->stash = (is_array($configs["stash"]))?$configs["stash"]:null;
                return true;
            }

        }

    }

?>
