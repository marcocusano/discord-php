<?php

    class DISCORD_MEDIAS {

        // Retrieve Application Assets
        function applicationIcon($applicationID, $icon) { global $discord;
            $filename = $discord->keys["cdn"]["applications"];
                $filename = str_replace("{id}", $applicationID, $filename);
                $filename = str_replace("{value}", $icon, $filename);
            if ($discord->medias->fileExists($filename)) {
                return $filename;
            } else {
                null;
            }
        }

        // Retrieve Application Assets
        function assets($applicationID, $assetsID) { global $discord;
            $filename = $discord->keys["cdn"]["assets"];
                $filename = str_replace("{id}", $applicationID, $filename);
                $filename = str_replace("{value}", $assetsID, $filename);
            if ($discord->medias->fileExists($filename)) {
                return $filename;
            } else {
                null;
            }
        }

        function emoji($emojiID) { global $discord;
            $filename = $discord->keys["cdn"]["emojis"];
                $filename = str_replace("{value}", $emojiID, $filename);
            if ($discord->medias->fileExists($filename)) {
                return $filename;
            } else {
                null;
            }
        }

        // File Exists
        function fileExists($url = null) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if($code == 200){
               $status = true;
            } else {
              $status = false;
            }
            curl_close($ch);
            return $status;
        }

        // Retrieve Guild Banner
        function guildBanner($guildID, $bannerValue) { global $discord;
            $filename = $discord->keys["cdn"]["banners"];
                $filename = str_replace("{id}", $guildID, $filename);
                $filename = str_replace("{value}", $bannerValue, $filename);
            if ($discord->medias->fileExists($filename)) {
                return $filename;
            } else {
                return null;
            }
        }

        // Retrieve Guild Icon
        function guildIcon($guildID, $iconValue) { global $discord;
            $filename = $discord->keys["cdn"]["guilds"];
                $filename = str_replace("{id}", $guildID, $filename);
                $filename = str_replace("{value}", $iconValue, $filename);
            if ($discord->medias->fileExists($filename)) {
                return $filename;
            } else {
                return $discord->medias->randomAvatar();
            }
        }

        // Retrieve Guild Splash
        function guildSplash($guildID, $splashValue) { global $discord;
            $filename = $discord->keys["cdn"]["splashes"];
                $filename = str_replace("{id}", $guildID, $filename);
                $filename = str_replace("{value}", $splashValue, $filename);
            if ($discord->medias->fileExists($filename)) {
                return $filename;
            } else {
                return null;
            }
        }

        // Retrieve User Avatar
        function userAvatar($userID, $avatarValue) { global $discord;
            $filename = $discord->keys["cdn"]["avatars"];
                $filename = str_replace("{id}", $userID, $filename);
                $filename = str_replace("{value}", $avatarValue, $filename);
            if ($discord->medias->fileExists($filename)) {
                return $filename;
            } else {
                return $discord->medias->randomAvatar();
            }
        }

        // Return a random Discord Avatar
        function randomAvatar($color = null) { $filename = "https://www.syglob.com/api/4.0/images/discord/avatar_";
            $colors = ["default", "green", "red", "yellow"];
            if (is_numeric($color)) {
                if ($color >= 0 && $color <= count($colors) - 1) { $filename = $filename . $colors[$color] . ".png";
                    return $filename;
                } else { return $filename = $filename . $colors[rand(0, count($colors) - 1)] . ".png"; }
            } else { return $filename = $filename . $colors[rand(0, count($colors) - 1)] . ".png"; }
        }

    }

?>
