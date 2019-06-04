<?php

    class DISCORD_REQUESTS {

        function custom($url, $method = "PUT", $params = null, $content_length = null, $authType = "Bot", $authKey = "token", $results = 0) { global $discord;
            return $discord->requests->requestor($url, $method, $params, $content_length, $authType, $authKey, $results);
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
            // Block reuqests if Rate Limited
            $now = New DateTime("Now");
            if ($discord->config->limited >= $now->getTimestamp()) {
                $response = null;
                if ($results == "header" || $results == "headers") {
                    $response = array(
                        "Content-Type" => "discord-php.limited",
                        "Retry-After" => $discord->config->limited,
                        "X-RateLimit-Limit" => 0,
                        "X-RateLimit-Remaining" => 0,
                        "X-RateLimit-Reset" => $discord->config->limited
                    );
                } else {
                    $response = New STDCLASS();
                        $response->code = 429;
                        $response->message = "You are being rate limited.";
                        $response->due_date = $discord->config->limited;
                        $response->limited = $discord->config->limited;
                }
                return $response;
            }
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
                                'Content-Type: application/json'
                            ));
                        }
                    }
                    curl_setopt_array($ch, array(
                        CURLOPT_HEADER         => 1,
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
                $response = curl_exec($ch);
                $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $headers = substr($response, 0, $header_size);
                $headers = explode("\n", $headers); $headers_temp = array();
                foreach ($headers as $h) {
                    $dh = explode(": ", $h);
                    if (count($dh) == 2) { $headers_temp[trim($dh[0])] = trim($dh[1]); }
                }
                if (is_array($headers_temp) && count($headers_temp)) { $headers = $headers_temp; }
                $body = substr($response, $header_size);
                curl_close($ch);
            fclose($f); // Close/Update Debug File
            // Check for Rate Limit
            if ($headers["X-RateLimit-Reset"]) {
                setcookie("discord-php.limited", $headers["X-RateLimit-Reset"], $headers["X-RateLimit-Reset"]);
                $discord->config->limited = $headers["X-RateLimit-Reset"];
            } else if ($headers["X-RateLimit-Global"]) {
                $due_date = New DateTime("Now"); $due_date->add(New DateInterval("PT10S"));
                setcookie("discord-php.limited", $due_date->getTimestamp(), $due_date->getTimestamp());
                $discord->config->limited = $due_date->getTimestamp();
            }
            // Results return
            if ($results == 0 || $results == "body") { return JSON_DECODE($body); }
            if ($results == "data") { return JSON_DECODE($body)->data[0]; }
            if ($results == "datas") { return JSON_DECODE($body)->data; }
            if ($results == "header" || $results == "headers") { return $headers; }
        }

    }

?>
