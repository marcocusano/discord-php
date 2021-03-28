<?php

    namespace Discord\Client {
        class Guilds {

            function __construct($client, $guild_id) {
                $this->client = $client;
                $this->exists = false;
                $this->channels = array();
                $this->members = array();
                $this->roles = array();
                if (is_numeric($guild_id)) {
                    // Get the guild
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/$guild_id";
                    $this->get = $request->get($endpoint);
                    if ($this->get->id == $guild_id) {
                        $this->exists = true;
                        return true;
                    } else { return false; }
                } else { return false; }
            }

            ///////////
            //  BAN  //
            ///////////

            function Bans($user_id = null) {
                if ($this->exists) {
                    if (is_numeric($user_id)) {
                        $request = New \Discord\Requests($this->client->authKey);
                        $endpoint = (New \Discord\Endpoints())->get("guilds") . "/" . $this->get->id . "/bans/$user_id";
                        return $request->get($endpoint);
                    } else {
                        if ($this->bans) { return $this->bans; } else {
                            $request = New \Discord\Requests($this->client->authKey);
                            $endpoint = (New \Discord\Endpoints())->get("guilds") . "/" . $this->get->id . "/bans";
                            $this->bans = $request->get($endpoint);
                        }
                    }
                    return $this->bans;
                } else { return null; }
            }

            function Banned($user_id) {
                if ($this->exists) {
                    if (is_numeric($user_id)) {
                        $user = $this->bans($user_id);
                        if ($user->user->id == $user_id) { return true; } else { return false; }
                    } else { return null; }
                } else { return null; }
            }

            function Ban($user_id, $params = null, $response = false) {
                $request = New \Discord\Requests($this->client->authKey);
                $endpoint = (New \Discord\Endpoints())->get("guilds") . "/" . $this->get->id . "/bans/$user_id";
                if ($response) {
                    $request->post($endpoint, $params, "PUT");
                    if ($response === "USER") {
                        return $this->bans($user_id);
                    } else {
                        return $this->banned($user_id);
                    }
                } else { return $request->post($endpoint, $params, "PUT"); }
            }

            function Unban($user_id, $response = false) {
                $request = New \Discord\Requests($this->client->authKey);
                $endpoint = (New \Discord\Endpoints())->get("guilds") . "/" . $this->get->id . "/bans/$user_id";
                if ($response) {
                    $request->post($endpoint, null, "DELETE");
                    return $this->banned($user_id);
                } else { return $request->post($endpoint, null, "DELETE"); }
            }

            ////////////////
            //  CHANNELS  //
            ////////////////

            function Channels($channel_id = null) {
                if ($this->exists) {
                    if (is_numeric($channel_id)) {
                        if (count($this->channels)) { $channel = New \Discord\Client\Channels($this->client, $this->channels[$channel_id]); }
                        if (!$channel) {
                            $channel = New \Discord\Client\Channels($this->client, $channel_id);
                            if ($channel->get->id == $channel_id) { $this->channels[$channel_id] = $channel->get; }
                            return $channel;
                        } else { return $channel; }
                    } else if (count($this->channels)) { return $this->channels; } else {
                        $request = New \Discord\Requests($this->client->authKey);
                        $endpoint = (New \Discord\Endpoints())->get("guilds") . "/" . $this->get->id . "/channels";
                        $channels = $request->get($endpoint);
                        if (is_array($channels)) { $this->channels = array();
                            foreach($channels as $channel) { $this->channels[$channel->id] = $channel; }
                        } else { return $channels; }
                    }
                    return $this->channels;
                } else { return null; }
            }

            function createChannel($params) {
                if ($this->exists) {
                    $request = New \Discord\Requests($this->client->authKey);
                    $endpoint = (New \Discord\Endpoints())->get("guilds") . "/" . $this->get->id . "/channels";
                    return $request->post($endpoint, $params);
                } else { return null; }
            }

            function findChannel($channelName, $force = false) {
                if ($this->exists) {
                    if (count($this->channels) || $force) {
                        $finds = array();
                        foreach($this->channels as $channel) {
                            if (strpos(strtoupper($channel->name), strtoupper($channelName)) !== false) { $finds[] = New \Discord\Client\Channels($this->client, $channel); }
                        }
                        return $finds;
                    } else {
                        $this->channels = $this->channels();
                        return $this->findChannel($channelName, true);
                    }
                } else { return null; }
            }

            ///////////////
            //  MEMBERS  //
            ///////////////

            function Members($member_id = null, $limit = 100) {
                if ($this->exists) {
                    if (is_numeric($member_id)) {
                        if (count($this->members)) { $member = New \Discord\Client\Members($this->client, $this->get->id, $this->members[$member_id]); }
                        if (!$member) {
                            $member = New \Discord\Client\Members($this->client, $this->get->id, $member_id);
                            if ($member->get->id == $member_id) { $this->members[$member_id] = $member->get; }
                            return $member;
                        } else { return $member; }
                    } else if (count($this->members)) { return $this->members; } else {
                        $request = New \Discord\Requests($this->client->authKey);
                        $endpoint = (New \Discord\Endpoints())->get("guilds") . "/" . $this->get->id . "/members?limit=$limit";
                        $members = $request->get($endpoint);
                        var_dump($members);
                        if (is_array($members)) { $this->members = array();
                            foreach($members as $member) { $this->members[$member->user->id] = $member; }
                        } else { return $members; }
                    }
                    return $this->members;
                } else { return null; }
            }

        }
    }

?>
