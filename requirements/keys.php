<?php

    $discord->keys = array();

        // API PATHS
        $discord->keys["api"]["root"] = "https://discordapp.com/api";
        $discord->keys["api"]["channels"] = $discord->keys["api"]["root"] . "/channels";
        $discord->keys["api"]["guilds"] = $discord->keys["api"]["root"] . "/guilds";
        $discord->keys["api"]["invites"] = $discord->keys["api"]["root"] . "/invites";
        $discord->keys["api"]["users"] = $discord->keys["api"]["root"] . "/users";
        $discord->keys["api"]["webhooks"] = $discord->keys["api"]["root"] . "/webhooks";

        // CDN PATHS
        $discord->keys["cdn"]["root"] = "https://cdn.discordapp.com";
        $discord->keys["cdn"]["applications"] = $discord->keys["cdn"]["root"] . "/app-icons/{id}/{value}.png";
        $discord->keys["cdn"]["assets"] = $discord->keys["cdn"]["root"] . "/app-assets/{id}/{value}.png";
        $discord->keys["cdn"]["avatars"] = $discord->keys["cdn"]["root"] . "/avatars/{id}/{value}.png";
        $discord->keys["cdn"]["emojis"] = $discord->keys["cdn"]["root"] . "/emojis/{value}.png";
        $discord->keys["cdn"]["guilds"] = $discord->keys["cdn"]["root"] . "/icons/{id}/{value}.png";
            $discord->keys["cdn"]["banners"] = $discord->keys["cdn"]["root"] . "/banners/{id}/{value}.png";
            $discord->keys["cdn"]["splashes"] = $discord->keys["cdn"]["root"] . "/splashes/{id}/{value}.png";


?>
