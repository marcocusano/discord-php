<?php

    // This autoload was developed just as a safe usage of the Discord-PHP library.
    // It will automatically include all the libs available.
    //////////////////
    // Requirements //
    //////////////////
    require_once(__DIR__ . "/Discord.php");
    require_once(__DIR__ . "/Client.php");

    ///////////////
    // Load libs //
    ///////////////
    include_once(__DIR__ . "/Discord/OAuth2.php");
    // Guilds
    include_once(__DIR__ . "/Discord/Guilds.php");
    include_once(__DIR__ . "/Discord/Members.php");
    // Channels
    include_once(__DIR__ . "/Discord/Channels.php");
    include_once(__DIR__ . "/Discord/Messages.php");
    // Users
    include_once(__DIR__ . "/Discord/Users.php");

    //////////// Basic Usage Example
    // $configs = New \Discord\Configs(array(
    //    "token" => "YOUR_BOT_TOKEN",
    //    "authType" => "Bot", // Optional (Default: Bot)
    //    "client_id" => "YOUR_CLIENT_ID", // Optional (Default: null)
    //    "client_secret" => "YOUR_CLIENT_SECRET", // Optional (Default: null)
    //    "public_key" => "YOUR_PUBLIC_KEY", // Optional (Default: null)
    //    "stash" => array( // Optional (Default: null)
    //        "Guild Name" => array(
    //            "guild_id" => "YOUR_SERVER_ID",
    //            "channels" => array(
    //                "Channel Name" => "YOUR_CHANNEL_ID"
    //            ),
    //            "roles" => array(
    //                "Role Name" => "YOUR_ROLE_ID"
    //            ),
    //            "members" => array(
    //                "Member Name" => "YOUR_MEMBER_USER_ID"
    //            ),
    //        )
    //    )
    // ));
    // $discord = New \Discord\Client($configs);
    // $guild = $discord->Guilds("YOUR_GUILD_ID" or "Stash Guild Name");
    // $channel = $discord->Channels("YOUR_CHANNEL_ID" or "Stash Guild Channel Name");
    // $member = $discord->channels("YOUR_GUILD_ID" or "Stash Guild Name", "YOUR_MEMBER_USER_ID" or "Stash Guild Member Name");
    //////////// Standard Usage Example
    // $configs = New \Discord\Configs(array( "token" => "YOUR_BOT_TOKEN" ));
    // $discord = New \Discord\Client($configs);
    // $guild = New \Discord\Client\Guilds($discord, "YOUR_GUILD_ID");
    /////////// Custom request example (Get)
    // $request = New \Discord\Requests("YOUR_BOT_TOKEN");
    // $endpoint = (New \Discord\Endpoints())->get("channels") . "/YOUR_CHANNEL_ID";
    // $request->get($endpoint);
    /////////// Custom request example (Post)
    // $request = New \Discord\Requests("YOUR_BOT_TOKEN");
    // $endpoint = (New \Discord\Endpoints())->get("guilds") . "/YOUR_GUILD_ID/channels";
    // $request->post($endpoint, $params);
    /////////// Manual endpoint request (Get)
    // $request->get("https://discord.com/api/{version}/endpoint");
    /////////// Manual endpoint request (Post)
    // $request->post("https://discord.com/api/{version}/endpoint", $params);

?>
