<?php

    namespace Discord\Client {

        class Users {

            function __construct($client, $user_id, $token = null) {
                $this->client = $client;
                $this->exists = false;
                $this->guilds = array();
                $this->channels = array();
                $this->token = $token;
                if (is_numeric($user_id) || $user_id == "@me") {
                    $request = null; $endpoint = (New \Discord\Endpoints())->get("users") . "/$user_id";
                    if ($token) {
                        $request = New \Discord\Requests($token, "Bearer");
                    } else {
                        $request = New \Discord\Requests($this->client->authKey);
                    }
                    $this->get = $request->get($endpoint);
                    if ($this->get->id == $user_id || ($user_id == "@me" && is_numeric($this->get->id))) {
                        $this->exists = true;
                        return true;
                    } else { return false; }
                } else { return false; }
            }

            //////////////
            //  Guilds  //
            //////////////

            function guilds() {
                if ($this->exists) {
                    if ($this->token) {
                        $endpoint = (New \Discord\Endpoints())->get("users") . "/" . $this->get->id . "/guilds";
                        $request = New \Discord\Requests($this->client->authKey);
                        $params = array("access_token" => $this->token);
                        return $request->get($endpoint . "?" . http_build_query($params));
                    } else {
                        $endpoint = (New \Discord\Endpoints())->get("users") . "/@me/guilds";
                        $request = New \Discord\Requests($this->client->authKey);
                        return $request->get($endpoint);
                    }
                } else { return null; }
            }

            function joinGuild($guild_id) {
                if ($this->exists) {
                    if ($this->token) {
                        if (is_numeric($guild_id)) {
                            $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$guild_id/members/" . $this->get->id;
                            $request = New \Discord\Requests($this->client->authKey);
                            $params = array("access_token" => $this->token);
                            return $request->post($endpoint, $params, "PUT");
                        } else { return null; }
                    } else { return null; }
                } else { return null; }
            }

            ////////////////
            //  Channels  //
            ////////////////

            function channels() {
                if ($this->exists) {
                    $endpoint = (New \Discord\Endpoints())->get("users") . "/" . $this->get->id . "/channels";
                    $request = New \Discord\Requests($this->client->authKey);
                    return $request->get($endpoint);
                } else { return null; }
            }

        }

    }

?>
