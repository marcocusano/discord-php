![build](https://img.shields.io/badge/build-stable-brightgreen.svg) ![php-version](https://img.shields.io/badge/php-5.6%2B-blue.svg) ![author](https://img.shields.io/badge/author-Marco%20Cusano-blue.svg) ![discord](https://img.shields.io/badge/api%20version-6+-green.svg?logo=discord&color=7289DA)

![background](https://www.marcocusano.dev/api/discord-php/background.jpg)

# discord-php
**Discord PHP** is a PHP library developed to include and simplify the creation and connection between websites, online applications and Discord.

## Let's Start
Just PHP 5.6+ is required. Let's start [downloading](https://github.com/marcocusano/discord-php/archive/master.zip) the discord-php library, then extract it to `your_server_path/`.

## Importing
Import the `discord.php` file to any `.php` file where you need to use the **Discord PHP lib**.
```PHP
require_once("your_server_path/discord.php");
```

## Configuration
Before using the **Discord PHP lib**, You must [create your Discord App](https://discordapp.com/developers/applications/), then configure the lib at `discord-php/config.json` as following:
```JSON
{
    "client_id" : "YOUR_CLIENT_ID",
    "client_secret" : "YOUR_CLIENT_SECRET",
    "token" : "YOUR_BOT_TOKEN",

    "assets" : [
        "rich_assets_name_1",
        "rich_assets_name_2"
    ],
    
    "run_bot" : false
}
```
Where:
- `client_id` = `@me` - Required for **oAuth2** / **Token Exchange** requests;;
- `client_secret` = Required for **oAuth2** / **Token Exchange** requests;
- `token` = Required for any **API Request** such as `$discord->users->get();`;
- `run_bot` = Set `true` if you are running this library as `PHP CLI` looking to create your own Bot using .php (It cannot be used on a WebServer)

All of these will be added to `$discord->config`. If You need to modify `client_id`, `client_secret` and/or `token` dynamically, You can change it as shown below:
```PHP
// Modify Client ID
$discord->config->client_id = "YOUR_NEW_CLIENT_ID";
// Modify Client Secret
$discord->config->client_secret = "YOUR_NEW_CLIENT_SECRET";
// Modify Bot Token
$discord->config->token = "YOUR_NEW_BOT_TOKEN";
```

## Ready to play
You are now ready to use the **Discord PHP lib** as you wish!
Everything you need to know about the library, such as Classes and "How To Use", is described [here in the Wiki](https://github.com/marcocusano/discord-php/wiki).
*I hope this library will help you coding for Discord in PHP. Any suggestion or improvement is always welcome.*

##### Optional: Create your own bot
If you are looking to create your own bot, coding in PHP and using this lib, please [click here](https://github.com/marcocusano/discord-php/wiki/Bot) to know more.

## Games
 [![Discord Invaders](https://i.imgur.com/bYDtnBU.png)](https://www.marcocusano.dev/api/discord-php/games/discord-invaders.php)

## Who is using this library?
 [![Overhack](https://i.imgur.com/EgUAie7.png)](https://www.overhack.one)   [![Fortnite Italia](https://i.imgur.com/NLOBkZw.png)](https://www.fortnite.it)   [![Apex Legends Italia](https://i.imgur.com/NYGYOTI.png)](https://www.apexlegends.it)

## Change Log
#### v1.4 (2019/06/28)
- Discord Hack Week update
- Added `$discord->games` functions
- Added `Discord Invaders` game
- Launch games (for WebHosting only)
#### v1.3 (2019/06/04)
- Added `$discord->webhooks` functions ([check the wiki](https://www.github.com/marcocusano/discord-php/wiki/WebHooks) to know more)
- Added `429 too many requests` handler
- Added medias used on GitHub Documentation
- Updated `$discord->requests->requestor`
- Fixed some syntax errors
#### v1.2 (2019/05/13)
- Added `$discord->gateway->get`
- Added `$discord->gateway->getBot`
- Added `$discord->gateway->client` (if `$discord->config->run_bot` = `true`)
- Added custom code
- Added WebSocket implementation (Based on [@ratchetphp](https://github.com/ratchetphp))
- Added Bot feature + vendor.zip (Based on [@teamreflex/DiscordPHP](https://github.com/teamreflex/DiscordPHP))
- Updated `$discord->keys`
- Fixed some syntax errors
- Fixed some wrong paths
#### v1.1 (2019/05/11)
- Added `$discord->users->dms` by token
- Added `$discord->users->get` by token
- Added `$discord->users->guilds` by token
- Added `$discord->requests->custom` function for custom requests
- Fixed missing global var
- Fixed missing oAuth path key
- Fixed few syntax parts
- [Examples](https://github.com/marcocusano/discord-php/wiki/Examples) are now here to help you coding
#### v1.0 (2019/05/07)
- First release of discord-php lib
