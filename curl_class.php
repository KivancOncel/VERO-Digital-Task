<?php
class getCurl {

    public function get_data_from_api() {

        $vero_token = $this->get_token_from_api();

        $new_token = $vero_token->oauth->access_token;

        $auth_array = array(
            "Authorization:",
            "Bearer",
            $new_token
        );

        $new_token = implode(" ", $auth_array);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.baubuddy.de/dev/index.php/v1/tasks/select",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
            $new_token,
            "Content-Type: application/json",
            "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $data = json_decode($response, true);
        
        return $data;

    }


    public function get_token_from_api() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.baubuddy.de/index.php/login",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"username\":\"365\", \"password\":\"1\"}",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Type: application/json",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $decoded_response_object = json_decode($response);

        return $decoded_response_object;

    }
}
?>