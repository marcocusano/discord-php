<?php

    // Discord-PHP Library
    // Developed by Marco Cusano
    // Version: 2.0
    // Since 2016 for the Wumpus

    namespace Discord {

        class Endpoints {

            function __construct($version = "v8") {
                $this->methods = array(
                    "API" => array(
                        "root" => "https://discord.com/api/$version",
                        "channels" => "/channels",
                        "guilds" => "/guilds",
                        "invites" => "/invites",
                        "users" => "/users"
                    ),
                    "CDN" => array(
                        "root" => "https://cdn.discord.com",
                        "applications" => array(
                            "icons" => "/app-icons/{id}/{value}.png",
                            "assets" => "/app-assets/{id}/{value}.png",
                        ),
                        "avatars" => array(
                            "gif" => "/avatars/{id}/{value}.gif",
                            "png" => "/avatars/{id}/{value}.png"
                        ),
                        "emojis" => "/emojis/{value}.png",
                        "guilds" => array(
                            "banners" => "/banners/{id}/{value}.png",
                            "icons" => "/icons/{id}/{value}.png",
                            "spashes" => "/splashes/{id}/{value}.png"
                        )
                    )
                );
            }

            function get($levels, $base = "API") {
                if (is_array($levels)) {
                    if (count($levels) == 2) { $endpoint = $this->methods[$base][$levels[0]][$levels[1]]; } else { $endpoint = $this->methods[$base][$levels[0]]; }
                } else { $endpoint = $this->methods[$base][$levels]; }
                if ($endpoint) {
                    if ($levels == "root") { return $endpoint; } else { return $this->methods[$base]["root"] . $endpoint; }
                } else { return null; }
            }
        }

        class Requests {

            function __construct($authKey, $authType = "Bot", $contentType = "application/json") {
                $this->authentication = $authType . ' ' . $authKey;
                if ($contentType == "OAUTH2") {
                    $this->HTTP_HEADER = array('Content-Type: application/x-www-form-urlencoded');
                } else if (is_numeric($contentType)) {
                    $this->HTTP_HEADER = array(
                        'Authorization: ' . $this->authentication,
                        'Content-Type: application/json',
                        'Content-length: ' . $contentType
                    );
                } else {
                    $this->HTTP_HEADER = array(
                        'Authorization: ' . $this->authentication,
                        'Content-Type: application/json'
                    );
                }
            }

            function get($endpoint, $responseType = "JSON") {

                $ch = curl_init($endpoint);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->HTTP_HEADER);
                    curl_setopt_array($ch, array(
                        CURLOPT_HEADER         => 1,
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_FOLLOWLOCATION => 1,
                        CURLOPT_VERBOSE        => 1,
                        CURLOPT_SSL_VERIFYPEER => 0,
                    ));
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

                $response = curl_exec($ch);
                    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                    $headers = substr($response, 0, $header_size);
                    $headers = explode("\n", $headers);
                    foreach ($headers as $header) {
                        list($key, $value) = explode(':', $header, 2);
                        $headers[trim($key)] = trim($value);
                    }
                    $body = substr($response, $header_size);

                curl_close($ch);

                // Return
                if ($responseType == "JSON") {
                    return json_decode($body);
                } else if ($responseType == "DATA" || $responseType == "BODY" || $responseType == "CONTENT") {
                    return $body;
                } else if ($responseType == "HEAD" || $responseType == "HEADERS") {
                    return $headers;
                }

            }

            function post($endpoint, $parameters, $method = "POST", $POST_FIELDS = "JSON", $responseType = "JSON") {

                $ch = curl_init($endpoint);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->HTTP_HEADER);
                    curl_setopt_array($ch, array(
                        CURLOPT_HEADER         => 1,
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_FOLLOWLOCATION => 1,
                        CURLOPT_VERBOSE        => 1,
                        CURLOPT_SSL_VERIFYPEER => 0,
                    ));
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                    if ($POST_FIELDS == "QUERY") {
                        // BUILD QUERY (Like a Get)
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                    } else if ($POST_FIELDS == "JSON") {
                        // JSON ENCODE (Like a Post)
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));
                    } else {
                        return null;
                    }

                $response = curl_exec($ch);
                    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                    $headers = substr($response, 0, $header_size);
                    $headers = explode("\n", $headers);
                    foreach ($headers as $header) {
                        list($key, $value) = explode(':', $header, 2);
                        $headers[trim($key)] = trim($value);
                    }
                    $body = substr($response, $header_size);

                curl_close($ch);

                // Return
                if ($responseType == "JSON") {
                    return json_decode($body);
                } else if ($responseType == "DATA" || $responseType == "BODY" || $responseType == "CONTENT") {
                    return $body;
                } else if ($responseType == "HEAD" || $responseType == "HEADERS") {
                    return $headers;
                }

            }

        }

        class Errors {

        }

    }

?>
