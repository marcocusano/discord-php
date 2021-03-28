<?php

    namespace Discord\Client {

        class Channels {

            function __construct($client, $channel_id) {
                $this->client = $client;
                $this->exists = false;
                $this->messages = array();
                if (is_numeric($channel_id)) {
                    // Get the channel
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/$channel_id";
                    $this->get = $request->get($endpoint);
                    if ($this->get->id == $channel_id) {
                        $this->exists = true;
                        return true;
                    } else { return false; }
                } else if (is_object($channel_id)) {
                    $this->get = $channel_id;
                    if (is_numeric($this->get->id)) {
                        $this->exists = true;
                        return true;
                    } else { return false; }
                } else { return false; }
            }

            //////////////////////
            //  Manage channel  //
            //////////////////////

            function edit($params) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id;
                    return $request->post($endpoint, $params, "PATCH");
                } else { return null; }
            }

            function delete() {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id;
                    $response = $request->post($endpoint, null, "DELETE");
                    $this->__construct($this->client, $this->get->id);
                    return $response;
                } else { return null; }
            }

            function move($parent_id = null, $position = null) {
                if ($this->exists) {
                    if (is_numeric($parent_id) || is_numeric($position)) {
                        $request = New \Discord\Requests($this->client->authKey);
                        $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id;
                        $params = array();
                            if (is_numeric($parent_id)) { $params["parent_id"] = $parent_id; }
                            if (is_numeric($position)) { $params["position"] = $position; }
                        return $request->post($endpoint, $params, "PATCH");
                    } else { return null; }
                } else { return null; }
            }

            ////////////////
            //  Messages  //
            ////////////////

            function messages($message_id = null) {
                if ($this->exists) {
                    if (is_numeric($message_id)) {
                        if (count($this->messages)) { $message = New \Discord\Client\Messages($this->client, $this->get->id, $this->messages[$message_id]); }
                        if (!$message) {
                            $message = New \Discord\Client\Messages($this->client, $this->get->id, $message_id);
                            if ($message->get->id == $message_id) { $this->messages[$message_id] = $message->get; }
                            return $message;
                        } else { return $message; }
                    } else {
                        $request = New \Discord\Requests($this->client->authKey);
                        $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id;
                        $messages = $request->get($endpoint . "/messages");
                        if (is_array($messages)) { $this->messages = array();
                            foreach($messages as $message) { $this->messages[$message->id] = $message; }
                            return $this->messages;
                        } else { return $messages; }
                    }
                } else { return null; }
            }

            function messagesBulkDelete($messages) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id . "/messages/bulk-delete";
                    return $request->post($endpoint, array("messages" => $messages));
                } else { return null; }
            }

            function sendMessage($content) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id . "/messages";
                    return $request->post($endpoint, $content);
                } else { return null; }
            }

            ///////////////
            //  Invites  //
            ///////////////

            function invites($invite_code = null) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id . "/invites";
                    return $request->get($endpoint);
                } else { return null; }
            }

            function createInvite($params = null) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("channels") . "/" . $this->get->id . "/invites";
                    return $request->post($endpoint, $params);
                } else { return null; }
            }

        }

    }

?>
