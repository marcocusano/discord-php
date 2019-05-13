<?php

    // PRESENCE_UPDATE
    $discord->gateway->client->on("PRESENCE_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->PRESENCE_UPDATE . ".php"); });
    // PRESENCES_REPLACE
    $discord->gateway->client->on("PRESENCES_REPLACE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->PRESENCES_REPLACE . ".php"); });
    // TYPING_START
    $discord->gateway->client->on("TYPING_START", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->TYPING_START . ".php"); });
    // USER_SETTINGS_UPDATE
    $discord->gateway->client->on("USER_SETTINGS_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->USER_SETTINGS_UPDATE . ".php"); });
    // VOICE_STATE_UPDATE
    $discord->gateway->client->on("VOICE_STATE_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->VOICE_STATE_UPDATE . ".php"); });
    // VOICE_SERVER_UPDATE
    $discord->gateway->client->on("VOICE_SERVER_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->VOICE_SERVER_UPDATE . ".php"); });
    // GUILD_MEMBERS_CHUNK
    $discord->gateway->client->on("GUILD_MEMBERS_CHUNK", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_MEMBERS_CHUNK . ".php"); });
    // GUILD_CREATE
    $discord->gateway->client->on("GUILD_CREATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_CREATE . ".php"); });
    // GUILD_DELETE
    $discord->gateway->client->on("GUILD_DELETE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_DELETE . ".php"); });
    // GUILD_UPDATE
    $discord->gateway->client->on("GUILD_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_UPDATE . ".php"); });
    // GUILD_BAN_ADD
    $discord->gateway->client->on("GUILD_BAN_ADD", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_BAN_ADD . ".php"); });
    // GUILD_BAN_REMOVE
    $discord->gateway->client->on("GUILD_BAN_REMOVE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_BAN_REMOVE . ".php"); });
    // GUILD_MEMBER_ADD
    $discord->gateway->client->on("GUILD_MEMBER_ADD", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_MEMBER_ADD . ".php"); });
    // GUILD_MEMBER_REMOVE
    $discord->gateway->client->on("GUILD_MEMBER_REMOVE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_MEMBER_REMOVE . ".php"); });
    // GUILD_ROLE_CREATE
    $discord->gateway->client->on("GUILD_ROLE_CREATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_ROLE_CREATE . ".php"); });
    // GUILD_ROLE_UPDATE
    $discord->gateway->client->on("GUILD_ROLE_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->GUILD_ROLE_UPDATE . ".php"); });
    // CHANNEL_CREATE
    $discord->gateway->client->on("CHANNEL_CREATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->CHANNEL_CREATE . ".php"); });
    // CHANNEL_DELETE
    $discord->gateway->client->on("CHANNEL_DELETE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->CHANNEL_DELETE . ".php"); });
    // CHANNEL_UPDATE
    $discord->gateway->client->on("CHANNEL_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->CHANNEL_UPDATE . ".php"); });
    // MESSAGE_CREATE
    $discord->gateway->client->on("MESSAGE_CREATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->MESSAGE_CREATE . ".php"); });
    // MESSAGE_DELETE
    $discord->gateway->client->on("MESSAGE_DELETE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->MESSAGE_DELETE . ".php"); });
    // MESSAGE_UPDATE
    $discord->gateway->client->on("MESSAGE_UPDATE", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->MESSAGE_UPDATE . ".php"); });
    // MESSAGE_DELETE_BULK
    $discord->gateway->client->on("MESSAGE_DELETE_BULK", function ($payload, $client) { global $discord; include($discord->memory["dir_event"] . "/" . $discord->keys["events"]->MESSAGE_DELETE_BULK . ".php"); });

?>
