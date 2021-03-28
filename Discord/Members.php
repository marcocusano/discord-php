<?php

    namespace Discord\Client {

        class Members {

            function __construct($client, $guild_id, $user_id) {
                $this->client = $client;
                $this->exists = false;
                $this->guild_id = $guild_id;
                $this->user_id = $user_id;
                $this->guilds = array();
                $this->roles = array();
                if (is_numeric($guild_id) && is_numeric($user_id)) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$guild_id/members/$user_id";
                    $this->get = $request->get($endpoint);
                    if ($this->get->user->id) {
                        $this->exists = true;
                        return true;
                    } else { return false; }
                } else if (is_object($user_id) && is_numeric($guild_id)) {
                  $this->get = $user_id;
                  if ($this->get->guild_id == $guild_id) {
                      $this->exists = true;
                      return true;
                  } else { return false; }
                } else { return false; }
            }

            ///////////////////
            // Manage Member //
            ///////////////////

            function ban($params, $response = false) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$this->guild_id/bans/$this->user_id";
                    if ($response) {
                        $request->post($endpoint, $params, "PUT");
                        $this->__construct($this->client, $this->guild_id, $this->user_id);
                        return $this->exists;
                    } else { return $request->post($endpoint, $params, "PUT"); }
                } else { return null; }
            }

            function nickname($nickname) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$this->guild_id/members/$this->user_id";
                    return $request->post($endpoint, array("nick" => $nickname), "PATCH");
                } else { return null; }
            }

            function move($channel_id) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$this->guild_id/members/$this->user_id";
                    return $request->post($endpoint, array("channel_id" => $channel_id), "PATCH");
                } else { return null; }
            }

            function mute($status = true) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$this->guild_id/members/$this->user_id";
                    return $request->post($endpoint, array("mute" => $status), "PATCH");
                } else { return null; }
            }

            ///////////
            // Roles //
            ///////////

            function roles($role_id = null) {
                if ($this->exists) {
                    return $this->get->roles;
                } else { return null; }
            }

            function addRole($role_id) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$this->guild_id/members/$this->user_id/roles/$role_id";
                    return $request->post($endpoint, array("mute" => $status), "PUT");
                } else { return null; }
            }

            function removeRole($role_id) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$this->guild_id/members/$this->user_id/roles/$role_id";
                    return $request->post($endpoint, array("mute" => $status), "DELETE");
                } else { return null; }
            }

            function hasRole($role_id) {
                if ($this->exists) {
                    if (in_array($role_id, $this->get->roles)) { return true; } else { return false; }
                } else { return false; }
            }

        }

    }

?>
