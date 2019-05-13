<?php

    if (!$discord || !$autoload) { die("Missing libraries: Maybe you are trying to use 'bot.php' directly without passing through `discord.php`."); }

    include($autoload);

    use Discord\Discord;

    $discord->gateway->client = new Discord(['token' => $discord->config->token]);

    $discord->gateway->client->on('ready', function ($client) { global $discord;

        include("custom/events/Ready.php");

        $discord->memory["event_filename"] = null;
        foreach($discord->keys["events"] as $key => $filename) {
            $discord->memory["event_filename"] = "custom/events/$filename.php";
            if ($key != "READY" && $key != "RESUMED" && file_exists($discord->memory["event_filename"])) {
                $discord->gateway->client->logger->info("Initializing $key Event on $filename.php");
                $discord->gateway->client->on($key, function ($payload, $client) {
                     global $discord;
                     include($discord->memory["event_filename"]);
                });
            }
            $discord->memory["index_events"]++;
        }

    });

    $discord->gateway->client->on('RESUMED', function ($client) { global $discord;
        include("custom/events/Resumed.php");
    });

    $discord->gateway->client->run();

?>
