<?php

    class DISCORD_REQUESTS {

        function custom($url, $method = "PUT", $params = null, $content_length = null, $authType = "Bot", $authKey = "token", $results = 0) { global $discord;
            return $discord->requests->requestor($url, $method, $params, $content_length, $authType $authKey, $results);
        }

        function delete($endpoint) { global $discord;
            return $discord->requests->requestor($endpoint, "DELETE");
        }

        function get($endpoint) { global $discord;
            return $discord->requests->requestor($endpoint, "GET");
        }

        function patch($endpoint, $params, $content_length = null) { global $discord;
            return $discord->requests->requestor($endpoint, "PATCH", $params, $content_length);
        }

        function post($endpoint, $params = null, $content_length = null) { global $discord;
            return $discord->requests->requestor($endpoint, "POST", $params, $content_length);
        }

        function put($endpoint, $params = null, $content_length = null) { global $discord;
            return $discord->requests->requestor($endpoint, "PUT", $params, $content_length);
        }

        // Base Request
        function requestor($url, $method = "GET", $params = null, $content_length = null, $authType = "Bot", $authKey = "token", $results = 0) {
            global $discord;

            // Structure Authorization
            $auth = 'Bot ' . $discord->config->$authKey;
            if ($discord->config->$authKey) {
                $auth = $authType . ' ' . $discord->config->$authKey;
            } else {
                $auth = $authType . ' ' . $authKey;
            }

            $f = fopen('discord-log.txt', 'w'); // Open/Create a Log file
                $ch = curl_init($url);

                    if ($params["code"] || $params["isQuery"]) { // If oAuth2 Request or Query String
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'Content-Type: application/x-www-form-urlencoded',
                        ));
                    } else { // Else it's a standard request
                        if (is_numeric($content_length)) {
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Authorization: ' . $auth,
                                'Content-Type: application/json',
                                'Content-length: ' . $content_length
                            ));
                        } else {
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                'Authorization: ' . $auth,
                                'Content-Type: application/json',
                            ));
                        }
                    }
                    curl_setopt_array($ch, array(
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_FOLLOWLOCATION => 1,
                        CURLOPT_VERBOSE        => 1,
                        CURLOPT_SSL_VERIFYPEER => 0,
                        CURLOPT_STDERR         => $f,
                    ));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                if (($method == "POST" || $method == "PUT" || $method == "PATCH") && $params) {
                    if ($params["code"] || $params["isQuery"]) { // Post as $_GET
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
                    } else { // Post as $_POST
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
                    }
                }
                $output = curl_exec($ch);
                curl_close($ch);
            fclose($f); // Close/Update Debug File

            // Results return
            if ($results == 0) { return JSON_DECODE($output); }
            if ($results == 1) { return JSON_DECODE($output)->data[0]; }
            if ($results > 1) { return JSON_DECODE($output)->data; }
        }

    }

?>
