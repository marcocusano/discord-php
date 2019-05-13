<?php

    /////////////////////////////////////////
    //  Discord-PHP                        //
    //  v1.2 (May 2019)                    //
    //  by Marco Cusano                    //
    //  https://www.marcocusano.dev        //
    /////////////////////////////////////////

    // Static Variables
    DEFINE("__DISCORD_ROOT__", dirname(__FILE__));
    DEFINE("__DISCORD_REQ__", __DISCORD_ROOT__ . "/requirements");
    DEFINE("__DISCORD_CLASSES__", __DISCORD_ROOT__ . "/classes");
    DEFINE("__DISCORD_CUSTOM___", __DISCORD_ROOT__ . "/custom");

    // Discord Global Declaration
    $discord = New STDCLASS();

        /////////////////////////////////////////
        //                                     //
        //             REQUIREMENTS            //
        //                                     //
        /////////////////////////////////////////

        // Config
        $discord->config = json_decode(file_get_contents(__DISCORD_ROOT__ . "/config.json"));
        // Keys
        require_once(__DISCORD_REQ__ . "/keys.php");
            $discord->keys["results"] = json_decode(file_get_contents(__DISCORD_REQ__ . "/results.json"));
            $discord->keys["permissions"] = json_decode(file_get_contents(__DISCORD_REQ__ . "/permissions.json"));
            $discord->keys["verification_levels"] = json_decode(file_get_contents(__DISCORD_REQ__ . "/verification_levels.json"));
            $discord->keys["default_message_notifications"] = json_decode(file_get_contents(__DISCORD_REQ__ . "/default_message_notifications.json"));
            $discord->keys["explicit_content_filters"] = json_decode(file_get_contents(__DISCORD_REQ__ . "/explicit_content_filters.json"));
        // Requests
        require_once(__DISCORD_REQ__ . "/requests.php");
        $discord->requests = New DISCORD_REQUESTS;

        /////////////////////////////////////////
        //                                     //
        //               CLASSES               //
        //                                     //
        /////////////////////////////////////////

        require_once(__DISCORD_CLASSES__ . "/channels.php");
        $discord->channels = New DISCORD_CHANNELS;
        // Example usage: $discord->channels->get("CHANNEL_ID");

        require_once(__DISCORD_CLASSES__ . "/gateway.php");
        $discord->gateway = New DISCORD_GATEWAY;
        // Example usage: $discord->gateway->get();

        require_once(__DISCORD_CLASSES__ . "/guilds.php");
        $discord->guilds = New DISCORD_GUILDS;
        // Example usage: $discord->guilds->get("GUILD_ID");

        require_once(__DISCORD_CLASSES__ . "/invites.php");
        $discord->invites = New DISCORD_INVITES;
        // Example usage: $discord->invites->get("INVITATION_CODE");

        require_once(__DISCORD_CLASSES__ . "/medias.php");
        $discord->medias = New DISCORD_MEDIAS;
        // Example usage: $discord->medias->userAvatar("USER_ID", "USER_AVATAR_CODE");
        // Example code: $user = $discord->users->get("USER_ID"); $avatar = $discord->medias->userAvatar($user->id, $user->avatar);

        require_once(__DISCORD_CLASSES__ . "/oauth2.php");
        $discord->oauth2 = New DISCORD_OAUTH2;
        // Example usage: $discord->oauth2->authorize("AUTHORIZATION_CODE");

        require_once(__DISCORD_CLASSES__ . "/users.php");
        $discord->users = New DISCORD_USERS;
        // Example usage: $discord->users->get(); <- @me
        // Example usage: $discord->users->get("USER_ID";) <- Public User informations
        // Example usage: $discord->users->get("USER_ID", "AUTH_TOKEN"); <- Get User informations as specifed from scopes

        require_once(__DISCORD_CLASSES__ . "/webhooks.php");
        $discord->webhooks = New DISCORD_WEBHOOKS;
        // Currently under development

        // Customizations
        require_once(__DISCORD_REQ__ . "/settings.php");
        require_once(__DISCORD_REQ__ . "/custom.php");

        /////////////////////////////////////////
        //                                     //
        //                 BOT                 //
        //                                     //
        /////////////////////////////////////////

        if ($discord->config->run_bot) {
            $autoload = "vendor/autoload.php";
            if (file_exists($autoload)) {
                require_once(__DISCORD_ROOT__ . "/bot.php");
            } else {
                echo "Missing 'autoload.php': Unable to run the bot";
            }
        }

        // Debug
        // var_dump($discord);

?>
