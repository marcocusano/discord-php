<?php

    if (!$discord || !$autoload) { die("Missing libraries: Maybe you are trying to use 'bot.php' directly without passing through `discord.php`."); }

    include($autoload);

    use Discord\Discord;

    $discord->gateway->client = new Discord(['token' => $discord->config->token]);

    $discord->gateway->client->on('ready', function ($client) { global $discord;

        $discord->memory["dir_event"] = "custom/events";
        include($discord->memory["dir_event"] . "/Ready.php");
        include("requirements/events.php");

    });

    $discord->gateway->client->on('RESUMED', function ($client) { global $discord;
        include("custom/events/Resumed.php");
    });

    $discord->gateway->client->run();

?>
