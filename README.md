![build](https://img.shields.io/badge/build-stable-brightgreen.svg) ![php-version](https://img.shields.io/badge/php-5.6%2B-blue.svg) ![author](https://img.shields.io/badge/author-Marco%20Cusano-blue.svg) ![discord](https://img.shields.io/badge/api%20version-v8-red.svg?logo=discord&color=7289DA)

![background](https://github.com/marcocusano/discord-php/blob/v2/medias/background.jpg)

# discord-php
**Discord PHP** is a PHP library developed to include and simplify the creation and connection between websites, online applications and Discord.

## Let's Start
Just PHP 5.6+ is required. Let's start [downloading](https://github.com/marcocusano/discord-php/archive/v2.zip) the discord-php library, then extract it to `your_server_path/`.

## Importing
A quickway is to import the `Autoload.php`:
```PHP
require_once("/your/custom/path/to/discord-php/Autoload.php");
```
Also, you can include only your needed classes:
```PHP
// Required
require_once("./Discord.php");
require_once("./Client.php");
// Optional
include_once("./Discord/Guilds.php");
include_once("./Discord/Channels.php");
```

## Configuration
Before using the **Discord PHP lib**, You must [create your Discord App](https://discord.com/developers/applications/), then create a "New Configuration Object". as following:
```PHP
$configs = array();
$configs["token"] = "YOUR_BOT_TOKEN";
$configs["authType"] = "Bot"; // Optional (Default: "Bot")
$configs["client_id"] = "YOUR_CLIENT_ID"; // Optional (Default: null)
$configs["client_secret"] = "YOUR_CLIENT_SECRET"; // Optional (Default: null)
$configs["public_key"] = "YOUR_PUBLIC_KEY"; // Optional (Default: null)
$configs["stash"] = array( // Optional
    "Guild Name" => array(
        "guild_id" => "YOUR_SERVER_ID",
        "channels" => array(
            "Channel Name" => "YOUR_CHANNEL_ID"
        ),
        "roles" => array(
            "Role Name" => "YOUR_ROLE_ID"
        ),
        "members" => array(
            "Member Name" => "YOUR_MEMBER_USER_ID"
        )
    )
);
$discord_configs = New \Discord\Configs($configs);
```
Where:
- `client_id` = `@me` - Required for **oAuth2** / **Token Exchange** requests;;
- `client_secret` = Required for **oAuth2** / **Token Exchange** requests;
- `token` = Required for any **API Request** such as `New \Discord\Client\Users("USER_ID");`;

Also you can easily add all of your Discord Application infos by using the file `./Configs.php`, then including as following:
```PHP
$discord_configs = New \Discord\Configs(include("./Configs.php"));
```

## Create a Discord Client
Create a Discord Client based on your Discord Configs, to send Discord API requests as following:
```
$discord = New \Discord\Client($discord_configs);
```

## Ready to play
You are now ready to use the **Discord PHP lib** as you wish!
Everything you need to know about the library, such as Classes and "How To Use", is described [here in the Wiki](https://github.com/marcocusano/discord-php/wiki).
*I hope this library will help you coding for Discord in PHP. Any suggestion or improvement is always welcome.*

## Quick example
```PHP
require_once("./Autoload.php");
$configs = include("./Configs.php");
$discord = New \Discord\Client(New \Discord\Configs($configs));
// Guilds
$guild = New \Discord\Client\Guilds($discord, "GUILD_ID");
$members = $guild->members();
$specific_member = $guild->members("USER_ID"); // Will return a \Discord\Client\Members Object
$channels = $guild->channels();
$specific_channel = $guild->channels("CHANNEL_ID"); // Will return a \Discord\Client\Channels Object
// Channels
$channel = New \Discord\Client\Channels($discord, "CHANNEL_ID");
$messages = $channel->messages();
$specific_message = $channel->message("MESSAGE_ID"); // Will return a \Discord\Client\Messages Object
```

## Let's start using `$discord->stash`

Before starting, you've to learn more about a "Stash" object:
First of all, a stash is an optional array to setup during the creation of a new Discord Configuration.
Respecting the standard proposed in the example, you can easily use the "Discord Client" to make API responses, as following:
```PHP
$configs = array(
    "token" => "YOUR_BOT_TOKEN",
    "stash" => array(
        "CUSTOM_GUILD_NAME" => array(
            "guild_id" => "YOUR_GUILD_ID"
            "channels" => array(
                "CUSTOM_CHANNEL_NAME" => "YOUR_CHANNEL_ID"
            )
        ),
        "CUSTOM_GUILD_NAME_2" => array(
            "channels" => array(
                "CUSTOM_CHANNEL_NAME_2" => "YOUR_CHANNEL_ID_2"
            )
        )
    )
);
$discord = New \Discord\Client(New \Discord\Configs($configs));
// Get a \Discord\Client\Guilds directly from the client using your Stash
// Please, make sure you've correctly imported ./Discord/Guilds.php class before.
// Also, make sure you're using the right $config standard and "GUILD_NAME" in order to get automatically a GUILD_ID
$guild = $discord->Guilds("CUSTOM_GUILD_NAME");
// You can also send a custom Guild ID
$guild = $discord->Guilds("GUILD_ID");
// You can do the same for the channels
// Make sure you've correctly imported ./Discord/Channels.php class before
$channel = $discord->Channels("CUSTOM_CHANNEL_NAME_2");
// And then, to get a channel using a custom Channel ID
$channel = $discord->Channels("CHANNEL_ID");
```

## Games
 [![Discord Invaders](https://i.imgur.com/bYDtnBU.png)](https://www.marcocusano.dev/api/discord-php/games/discord-invaders.php)

## Who is using this library?
[![WeSport](https://i.imgur.com/EgUAie7.png)](https://www.wesport.gg)   [![Fortnite Italia](https://i.imgur.com/NLOBkZw.png)](https://www.fortnite.it)   [![Apex Legends Italia](https://i.imgur.com/NYGYOTI.png)](https://www.apexlegends.it)

## Change Log
#### v2.0 (2021/03/28)
- First release of a new discord-php lib
#### v1.x (deprecated)
- Available by [clicking here](https://github.com/marcocusano/discord-php/tree/v1)
