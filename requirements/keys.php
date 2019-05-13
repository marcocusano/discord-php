<?php

    $discord->keys = array();

        // API PATHS
        $discord->keys["api"]["root"] = "https://discordapp.com/api";
        $discord->keys["api"]["channels"] = $discord->keys["api"]["root"] . "/channels";
        $discord->keys["api"]["gateway"] = $discord->keys["api"]["root"] . "/gateway";
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

        // EVENTS

        $discord->keys["events"]["READY"] = "Ready";
        $discord->keys["events"]["RESUMED"] = "Resumed";
        $discord->keys["events"]["PRESENCE_UPDATE"] = "PresenceUpdate";
        $discord->keys["events"]["PRESENCES_REPLACE"] = "PresencesReplace";
        $discord->keys["events"]["TYPING_START"] = "TypingStart";
        $discord->keys["events"]["USER_SETTINGS_UPDATE"] = "UserSettingsUpdate";
        $discord->keys["events"]["VOICE_STATE_UPDATE"] = "VoiceStateUpdate";
        $discord->keys["events"]["VOICE_SERVER_UPDATE"] = "VoiceServerUpdate";
        $discord->keys["events"]["GUILD_MEMBERS_CHUNK"] = "GuildMembersChunk";

        $discord->keys["events"]["GUILD_CREATE"] = "GuildCreate";
        $discord->keys["events"]["GUILD_DELETE"] = "GuildDelete";
        $discord->keys["events"]["GUILD_UPDATE"] = "GuildUpdate";
        $discord->keys["events"]["GUILD_BAN_ADD"] = "GuildBanAdd";
        $discord->keys["events"]["GUILD_BAN_REMOVE"] = "GuildBanRemove";
        $discord->keys["events"]["GUILD_MEMBER_ADD"] = "GuildMemberAdd";
        $discord->keys["events"]["GUILD_MEMBER_REMOVE"] = "GuildMemberRemove";
        $discord->keys["events"]["GUILD_ROLE_CREATE"] = "GuildRoleCreate";
        $discord->keys["events"]["GUILD_ROLE_UPDATE"] = "GuildRoleUpdate";

        $discord->keys["events"]["CHANNEL_CREATE"] = "ChannelCreate";
        $discord->keys["events"]["CHANNEL_DELETE"] = "ChannelDelete";
        $discord->keys["events"]["CHANNEL_UPDATE"] = "ChannelUpdate";

        $discord->keys["events"]["MESSAGE_CREATE"] = "MessageCreate";
        $discord->keys["events"]["MESSAGE_DELETE"] = "MessageDelete";
        $discord->keys["events"]["MESSAGE_UPDATE"] = "MessageUpdate";
        $discord->keys["events"]["MESSAGE_DELETE_BULK"] = "MessageDeleteBulk";

?>
