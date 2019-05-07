![build](https://img.shields.io/badge/build-stable-brightgreen.svg) ![php-version](https://img.shields.io/badge/php-5.6%2B-blue.svg) ![author](https://img.shields.io/badge/author-Marco%20Cusano-blue.svg)

# discord-php
**Discord PHP** is a PHP library developed to include and simplify the creation and connection between websites, online applications and Discord.

## Let's Start
Just PHP 5.6+ is required. Let's start [downloading](https://github.com/marcocusano/discord-php/archive/master.zip) the discord-php library, then extract it to `your_server_path/discord-php`.

## Importing
Import the `discord.php` file to any `.php` file where you need to use the **Discord PHP lib**.
```PHP
require_once("your_server_path/discord-php/discord.php");
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
    ]
}
```
Where:
- `client_id` = `@me`;
- `client_secret` = Required for **oAuth2** / **Token Exchange** requests;
- `token` = Required for any **API Request** such as `$discord->users->get();`;

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
*I hope that this library can help you and any suggestions or improvements to be made are always welcome.*

## Change Log
#### v1.0 (2019/05/07)
- First release of discord-php lib
