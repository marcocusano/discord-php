<?php

    namespace Discord\Client {

        class OAuth2 {

            function __construct($client) {
                $this->validated = false;
                $this->client = $client;
                if ($this->client->id) {
                    if ($this->client->secret) {
                        $this->validated = true;
                        return true;
                    } else { die("<strong>Discord-PHP Error:</strong> Please set-up your Client Secret before creating an OAuth2 Object"); }
                } else { die("<strong>Discord-PHP Error:</strong> Please set-up your Client ID before creating an OAuth2 Object"); }
                return false;
            }

            function authorize($params) {
                if ($this->validated) {
                    if (is_array($params)) {
                        if ($params["redirect_uri"]) {
                            $params["scope"] = $params["scope"]?:"identify";
                            $params["client_id"] = $this->client->id;
                            header("Location: " . (New \Discord\Endpoints(""))->get("root") . "oauth2/authorize" . '?' . http_build_query($params));
                        } else { return "Missing or invalid Redirect URI"; }
                    } else { return "Missing or invalid parameters"; }
                } else { return null; }
            }

            function getToken($params) {
                if ($this->validated) {
                    if (is_array($params)) {
                        if ($params["code"]) {
                            $params["client_id"] = $this->client->id;
                            $params["client_secret"] = $this->client->secret;
                            $params["grant_type"] = "authorization_code";
                            $params["scope"]?:"identify";
                            $request = New \Discord\Requests($this->client->authKey, "Bot", "OAUTH2");
                            $endpoint = (New \Discord\Endpoints(""))->get("root") . "oauth2/token";
                            return $request->post($endpoint, $params, "POST", "QUERY");
                        } else { return null; }
                    } else { return null; }
                } else { return null; }
            }

        }

    }

?>
