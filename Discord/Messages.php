<?php

    namespace Discord\Client {

        class Messages {

            function __construct($client, $channel_id, $message_id) {
                $this->client = $client;
                $this->channel_id = $channel_id;
                $this->exists = false;
                if (is_numeric($channel_id) && is_numeric($message_id)) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/$channel_id/messages/$message_id";
                    $this->get = $request->get($endpoint);
                    if ($this->get->id == $message_id) {
                        $this->exists = true;
                        return true;
                    } else { return false; }
                } else if (is_object($message_id) && is_numeric($channel_id)) {
                    $this->get = $message_id;
                    if ($this->get->channel_id == $channel_id) {
                        $this->exists = true;
                        return true;
                    } else { return false; }
                } else { return false; }
            }

            ////////////////////
            // Manage Message //
            ////////////////////

            function delete($response = false) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/messages/" . $this->get->id;
                    if ($response) {
                        $request->post($endpoint, null, "DELETE");
                        $this->__construct($this->client, $this->channel_id, $this->get->id);
                        $response = $this->exists;
                    } else {
                        $response = $request->post($endpoint, null, "DELETE");
                        $this->__construct($this->client, $this->channel_id, $this->get->id);
                    }
                    return $response;
                } else { return null; }
            }

            function edit($content) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/messages/" . $this->get->id;
                    $this->get = $request->post($endpoint, $content, "PATCH");
                } else { return null; }
            }

            ///////////////
            // Reactions //
            ///////////////

            function reactions($reaction_id) {
                if ($this->exists) {
                    if (is_numeric($reaction_id)) {
                        $request = New \Discord\Requests($this->client->authKey);
                        $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/messages/" . $this->get->id . "/reactions/$reaction_id";
                        return $request->get($endpoint);
                    } else { return null; }
                } else { return null; }
            }

            function addReaction($reaction_id) {
                if ($this->exists) {
                    if (is_numeric($reaction_id)) {
                        $request = New \Discord\Requests($this->client->authKey);
                        $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/messages/" . $this->get->id . "/reactions/$reaction_id/@me";
                        return $request->post($endpoint, null, "PUT");
                    } else { return null; }
                } else { return null; }
            }

            function removeReactions() {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/messages/" . $this->get->id . "/reactions";
                    return $request->post($endpoint, null, "DELETE");
                } else { return null; }
            }

            //////////
            // Pins //
            //////////

            function pin() {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/pins/" . $this->get->id;
                    return $request->post($endpoint, null, "PUT");
                } else { return null; }
            }

            function unpin() {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/pins/" . $this->get->id;
                    return $request->post($endpoint, null, "DELETE");
                } else { return null; }
            }

            function pinned() {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->channel_id . "/pins";
                    $messages = $request->get($endpoint);
                    if (is_array($messages) && count($messages)) {
                        foreach($messages as $message) { if ($message->id == $this->get->id) { return true; } }
                        return false;
                    } else { return false; }
                } else { return null; }
            }

        }

    }

?>
