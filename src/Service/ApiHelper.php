<?php

namespace App\Service;


class ApiHelper {

  



    public function res_api(string $url)
    {
		$username 	= "a00720d";

# $password 	: The password used to connect to the API.
        $password 	= "6KPPczga4H6pR+ZeMj+iQ5UpB0foUoO3hQWOjUiYkESU3HGLfXwce8He7TfwY/k4c3hAcFViIFfKUC+GwcbYsQ==";

# $url 		: The url to call the API.
        $url 		= $url;

# $method 	: The HTTP method of the request.
        $method 	= "GET";


#########################################################################################
# REQUEST PROCESS CODE (do not modify this part)
#########################################################################################


        $nonce="";$nonce64;$date;$digest;$header;
        $chars = "0123456789abcdef";
        for ($i = 0; $i < 32; $i++) { $nonce .= $chars[rand(0, 15)]; }
        $nonce64 = base64_encode($nonce) ;
        $date = gmdate('c');
        $date = substr($date,0,19)."Z" ;
        $digest = base64_encode(sha1($nonce.$date.$password, true));
        $header = sprintf('X-WSSE: UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"',$username, $digest, $nonce64, $date);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if($method == "GET"){ curl_setopt($ch, CURLOPT_HTTPGET, 1); }
        if($method == "POST"){ curl_setopt($ch, CURLOPT_POST, 1); curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams); }
        if($method == "DELETE"){ curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); }
        if($method == "PUT"){ curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array($header,'Content-Type: application/json'));
       // curl_setopt($ch, CURLOPT_VERBOSE, false);
        $time_start = microtime(true);

        $res = curl_exec($ch);


        $pieces = explode("x-frame-options: SAMEORIGIN", $res);

        $someJSON = $pieces[1];

		
		return $someJSON;
       
    }


}
