<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GitController extends Controller {

    private $user = 'lnrowboat';
    private $client;

    public function __construct() {
        $this->client = new \Github\Client();
    }

// User actions
    public function user($action = 'notice') {
        return call_user_func_array(array($this, $action), array());
    }

    public function notice() {
        return 'Please, Enter your action';
    }

    public function repo() {
        return $this->client->api('user')->repositories($this->user);
    }

    public function branches($name) {
        return $this->client->api('repo')->branches( $this->user, $name);
    }
    
    public function repobranches() {
        $repos = $this->repo();
        $str = '<h2>Repositories</h2><ul>';
        foreach($repos as $repo) {
            $str = $str. '<li>'.$repo['name'];
            //'angular2-typescript-frame'
            $str = $str. '<ul>';
            $branches = $this->branches($repo['name']);
            foreach($branches as $branch) {
                $str = $str. '<li>'.$branch['name'].'</li>';
            }
            $str = $str. '</ul></li>';
        }
        $str = $str. '</ul>';
        return $str;
    }
    
    public function userinfo() {
        return $this->client->api('user')->show($this->user);
    }

    public function find() {
        return $this->client->api('user')->find($this->user);
    }

// Commits
    public function commit() {
        return $this->client->api('repo')->commits()->all($this->user, 'angular2-typescript-frame', array('sha' => 'master'));
    }

    public function getauth() {
        //$this->client->authenticate($this->user, 'daupassword', 'url_token');
        return $this->client->api('authorizations')->show(1);
    }

    public function createauth() {
        $data = array(
            'note' => 'This is an optional description'
        );
//$rs = $this->client->authenticate($this->user, 'daupassword', 'url_token');
//var_dump($rs);
        return $this->client->api('authorization')->create($data);
    }

    public function abc() {
        return $this->client->api('current_user')->repositories();
    }
    
    public function abc1() {
        //$token  = env('GITHUB_TOKEN');
            $params = [
                'client_id'     => env('GITHUB_CLIENTID'),
                'client_secret' => env('GITHUB_CLIENT_SERECT'),
                //'redirect_uri'  => 'http://localhost/laptest-new/public',
               // 'code'          => env('GITHUB_TOKEN'),
               //'scope'=>'angularjs'
            ];

        try {
            $ch = curl_init('https://api.github.com/authorizations');//.$token);
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
           // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            $headers[] = 'Accept: application/json';

            //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            //$response = curl_exec($ch);
            $response = curl_getinfo($ch);
            var_dump($response);
            //return $response;
        } catch (\Exception $e) {
            dp($e->getMessage());
        }
    }
    

    public function authenticate() {
//return 'aaaaaa';
        return $this->client->authenticate($this->user, 'dautennhen', env('GITHUB_TOKEN'));

        /* $github = new Github\Client(new GuzzleClient(), 'machine-man-preview');
          $jwt = (new Builder)
          ->setIssuer($integrationId)
          ->setIssuedAt(time())
          ->setExpiration(time() + 60)
          ->sign(new Sha256(),  (new Keychain)->getPrivateKey($pemPrivateKeyPath))
          ->getToken();

          $github->authenticate($jwt, null, Github\Client::AUTH_JWT);

          $token = $github->api('integrations')->createInstallationToken($installationId);
          $github->authenticate($token['token'], null, Github\Client::AUTH_HTTP_TOKEN); */
    }

    public function createfile() {
        $fileInfo = $this->client->api('repo')->contents()->create('dautennhen', 'angularjs', 'test.txt', 'sth should be here', 'test msg', 'master', $committer);
    }

    public function downloadfile() {
        $fileContent = $this->client->api('repo')->contents()->download($this->user, 'angularjs', 'README.md', 'do download');
    }

    function curl($url, $data_string) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($ch, CURLOPT_USERPWD, "USERNAME:PASSWORD");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

    function docurl() {
        $data_string = json_encode(array("bio" => "This is my bio"));
        return json_decode($this->curl('https://api.github.com/user', $data_string), true);
    }

    public function pure() {
        /* $token  = $_POST['token'];
          $params = [
          'client_id'     => self::$_clientID,
          'client_secret' => self::$_clientSecret,
          'redirect_uri'  => 'url goes here',
          'code'          => $token,
          ];
         */
        try {
            $result = curl_init('https://github.com/login/oauth/'. env('GITHUB_TOKEN'));
            $result = curl_getinfo($result);
            var_dump($result);
            //return (new Response($result, 200));
            //->header('Content-Type', $mimeType);
            //return $ch;
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            //$headers[] = 'Accept: application/json';
            //$response = curl_exec($ch);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return (new Response('Erorr baby', 200));
            //->header('Content-Type', 'json/application');
        }
    }

    public function edf() {
        //return $this->singleton('Github\Client', function () {
        $client = new Github\Client();
        $token = env('GITHUB_TOKEN');

        if (!isset($token)) {
            dd("Github token is not set.");
        }

        //$client->authenticate(env('GITHUB_EMAIL'), env('GITHUB_PASSWORD'), Github\Client::AUTH_HTTP_PASSWORD);
        $result = $client->authenticate($token, null, Github\Client::AUTH_HTTP_TOKEN);

        return (new Response($result, 200));
        //});
    }

    public function authority() {
        
        
        /* 'client_id'     => env('GITHUB_CLIENTID'),
                'client_secret' => env('GITHUB_CLIENT_SERECT'),
                'redirect_uri'  => 'http://localhost/laptest-new/public',
                'code'          => env('GITHUB_TOKEN'),
          */       
        //put your API Key and Secret in these two variables.
        $api_key = env('GITHUB_CLIENTID');
        $api_secret = env('GITHUB_CLIENT_SERECT');

        //When called this function will request an Access Token and then return just
        //the token value.
        function GetOAuthToken() {
            global $api_key, $api_secret;

            $ch = curl_init("http://github.com/oauth/token");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/x-www-form-urlencoded",
                "Authorization: Basic " . base64_encode($api_key . ":" . $api_secret)
            ));

            $result = curl_exec($ch);
            var_dump($result);
 //CurlExecute($ch);
            $result = json_decode($result);
            var_dump($result);
            return $result;
        }
        
        return GetOAuthToken();

    }

    public function authority1 () {
        //return env('GITHUB_TOKEN');
        // Define variables
        $verb = "GET";
        $host = "https://api.awhere.com";
        $uri = "/v2/fields";

        $access_token = ""; //You'll need to follow the example above to get an access token.

        $http_headers = array("Authorization: Bearer " . $access_token);


// Set up the cURL request
        $curl = curl_init($host . $uri);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verb);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);


// Normally you should not use these cURL options. They disable the SSL Cert 
// verification. But many local development environments are not built with
// the standard chain authority certificates, and so cannot verify the Cert.
// If you have troubles making cURL requests, you can uncomment the next two
// lines, but don't put them into production. 
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// This fires the cURL request
        $response = curl_exec($curl);


        if ($response === false) {
            // if the curl_exec() fails for reason, it means it could not even reach the aWhere server
            // and the function returns FALSE 
            echo 'cURL Transport Error (HTTP request failed): ' . curl_error($curl);
            die();
        } else {
            // curl_getinfo() returns information about the HTTP transaction, used
            // mainly here for getting the status code. 
            $info = curl_getinfo($curl);
            $httpStatusCode = $info['http_code'];

            //The cURL settings above will include the HTTP headers in the response
            //This next command explodes the headers into one variable and the actual API response in another
            list($responseHeaders, $responseBody) = explode("\r\n\r\n", $response, 2);

            //Finally, we use json_decode to transform the API response into a native PHP object.
            $result = json_decode($responseBody);
        }
        curl_close($curl);
    }
    
    public function check (){
        return $this->client->api('authorizations')->check(340365, env('GITHUB_TOKEN'));
    }

}
