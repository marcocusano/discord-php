<?php

    class DISCORD_OAUTH2 {

        // Authorization Code Grant
        // Compile Authorization link
        function authorize($params) { global $discord;
            if ($params["redirect_uri"]) {
                $params["isQuery"] = true;
                // Check for custom response_type
                $response_type = "code";
                if ($params["response_type"]) $response_type = $params["response_type"];
                // Check for custom client_id
                $client_id = $discord->config->client_id;
                if ($params["client_id"]) { $client_id = $params["client_id"]; }
                // Compile and Return URL
                $url = $discord->keys["api"]["oauth2"] . "/authorize?response_type=$response_type&client_id=$client_id" . http_build_query($params);
                return $url;
            } else {
                return 0;
            }
        }

        // Client Credentials
        // Get Access Token from client_credentials request
        function clientCredentials($params = null) {
            $params["isQuery"] = true;
            if (!$params["client_id"]) { $params["client_id"] = $discord->config->client_id; }
            if (!$params["client_secret"]) { $params["client_secret"] = $discord->config->client_secret; }
            if (!$params["grant_type"]) { $params["grant_type"] = "client_credentials"; }
            if (!$params["scope"]) { $params["scope"] = "identify"; }
            return $discord->requests->post($discord->keys["api"]["oauth2"] . "/token", $params);
        }

        // Access Token Exchange
        // Get Token from ?code response
        function getToken($params) { global $discord;
            if ($params["code"] && $params["redirect_uri"]) {
                if (!$params["client_id"]) { $params["client_id"] = $discord->config->client_id; }
                if (!$params["client_secret"]) { $params["client_secret"] = $discord->config->client_secret; }
                if (!$params["grant_type"]) { $params["grant_type"] = "authorization_code"; }
                if (!$params["scope"]) { $params["scope"] = "identify"; }
                return $discord->requests->post($discord->keys["api"]["oauth2"] . "/token", $params);
            } else {
                return 0;
            }
        }
            function token($params) { global $discord; return $discord->oauth2->getToken($params); }

        // Refresh Token Exchange
        // Get a new Token from a refresh_token
        function refreshToken($params) {
            if ($params["refresh_token"] && $params["redirect_uri"]) {
                $params["isQuery"] = true;
                if (!$params["client_id"]) { $params["client_id"] = $discord->config->client_id; }
                if (!$params["client_secret"]) { $params["client_secret"] = $discord->config->client_secret; }
                if (!$params["grant_type"]) { $params["grant_type"] = "refresh_token"; }
                if (!$params["scope"]) { $params["scope"] = "identify"; }
                return $discord->requests->post($discord->keys["api"]["oauth2"] . "/token", $params);
            } else {
                return 0;
            }
        }

        // Revoke Token
        function revoke($params) {
            if ($params["redirect_uri"]) {
                if (!$params["client_id"]) { $params["client_id"] = $discord->config->client_id; }
                if (!$params["client_secret"]) { $params["client_secret"] = $discord->config->client_secret; }
                if (!$params["grant_type"]) { $params["grant_type"] = "revoke_token"; }
                if (!$params["scope"]) { $params["scope"] = "identify"; }
                return $discord->requests->post($discord->keys["api"]["oauth2"] . "/token/revoke", $params);
            } else {
                return 0;
            }
        }

    }

?>
