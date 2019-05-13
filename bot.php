<?php

    if (!$discord || !$autoload) { die("Missing libraries: Maybe you are trying to use 'bot.php' directly without passing through `discord.php`."); }

    include($autoload);

    use Discord\Discord;

    $discord->gateway->client = new Discord(['token' => $discord->config->token]);

    $discord->gateway->client->on('ready', function ($client) { global $discord;

        include("custom/events/Ready.php");

        foreach($discord->keys["events"] as $key => $filename) {
            $include_filename = __DISCORD_CUSTOM__ . "events/$filename.php";
            if ($key != "READY" && $key != "RESUMED" && file_exists($include_filename)) {
                $discord->gateway->client->logger->info("Initializing $key Event on $filename.php");
                $discord->gateway->client->on($discord->keys["events"][$key], function ($message, $client) {
                     global $discord;
                     include($include_filename);
                });
            }
        }

    });

    $discord->gateway->client->on('RESUMED', function ($client) { global $discord;
        include("custom/events/Resumed.php");
    });

    $discord->gateway->client->run();

?>
