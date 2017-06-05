<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class IseekApi extends Controller
{

  
   public function index()
   {	
 	
	   $client = new Client([
	     'verify'   => false,
	     'base_uri' => env('BASE_URL')
    ]);

 	try {

 

   	$response = $client->request("GET",'ping',
		[	
			'auth'=>[env("USER"),env("PASSWORD")]
		]);

	$result =array(
		 	 "Header"     => $response->getHeader("Content-Type"),
			 "StatusCode" => $response->getStatusCode(),
			 "Body"	      => $response->getBody()
			 
		);

		return $result;
		// $this->response($result['Body']);

 	
 	} catch(RequestException $e)
 	  {
 	  	$this->response(Psr7\str($e->getResponse()));
 	  }


}

  public function accounts()
  {
  	try {

	$client = new Client(
			   [
			     'headers'  => ['Accept'   => 'application/json'],
                             	'verify'   => false,
                             	'base_uri' => env('BASE_URL')
               ]
            );

        $response = $client->request("GET","accounts",
                [
                        'auth'=>[env("USER"),env("PASSWORD")]
                ]);

        $result =array(
                         "Header"		=> $response->getHeader("Content-Type"),
                         "StatusCode"   => $response->getStatusCode(),
                         "Body" 		=> $response->getBody()->getContents()
                );
        // $this->response($result);

        return $result;

  	} catch(RequestException $e)
  	  {
  	  	$this->response(Psr7\str($e->getResponse()));
  	  }


  }

  public function service($service_id)
  {
  	try {
	  	$client = new Client([
	  			'headers'	=> ['Accept' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);

	  	$response = $client->request("GET","service/".$service_id,
		  		[
		  		
		  			'auth'=>[env("USER"),env("PASSWORD")]
	  			]);

	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  }
}

public function usage($service_id,$start,$end)
  {

  	try {
	  	$client = new Client([
	  			'headers'	=> ['Accept' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);

	  	$response = $client->request("GET","service/".$service_id."/usage?start=".$start."&end=".$end,
		  		[
		  		
		  			'auth'=>[env("USER"),env("PASSWORD")]
	  			]);

	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
	  	// $this->response($result);
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  }
}

 public function services(Request $request)
 {

	try {

		$data_input = array(
 		"account" 					 => $request->input("account"),
 		"username" 					 => $request->input("username"),
 		"password"					 => $request->input("password"),
 		"supplier_billing_reference" => $request->input("sbr")
 		);

	  	$client = new Client([
			    'headers'   => ['Content-Type'=>'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);


	  	$response = $client->request("POST","services",
		  		[
		  			'auth'=>[env("USER"),env("PASSWORD")],
		  			'json'=>[
			  			'account'	   					=> $data_input['account'],
			  			'username'	   					=> $data_input['username'],
			  			'password'	   					=> $data_input['password'],	
			  			'supplier_billing_reference'	=> $data_input['supplier_billing_reference']
		  			]
		  		]
		  			
		  		);

	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
	  	// $this->response($result);
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  } 	
 }

/*BE RIGHT BACK*/
 public function delete_service($service_id)
 {
 	try {
	  	$client = new Client([
	  			'headers'	=> ['Accept' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);

	  	$response = $client->request("delete","service/".$service_id,
		  		[
		  		
		  			'auth'=>[env("USER"),env("PASSWORD")]
	  			]);

	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  }
 }

 public function update_service(Request $request,$service_id)
 {

 	try {

	  	$client = new Client([
			    'headers'   => ['Content-Type'=> 'application/json'],
			    'Accept'    => ['application' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);


	  	$response = $client->request("put","service/".$service_id,
		  		[
		  			'auth'=>[env("USER"),env("PASSWORD")],
		  			'json'=>[
			  			'password'=>$request->input("password")
		  			]
		  		]);


	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
	  	// $this->response($result);
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  } 		
 }

public function authlog($service_id,$start,$end)
  {

  	try {
	  	$client = new Client([
	  			'headers'	=> ['Accept' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);

	  	$response = $client->request("GET","service/".$service_id."/authlog?start=".$start."&end=".$end,
		  		[
		  		
		  			'auth'=>[env("USER"),env("PASSWORD")]
	  			]);

	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
	  	// $this->response($result);
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  }
}

  public function service_garden($service_id)
  {
  	try {
	  	$client = new Client([
	  			'headers'	=> ['Accept' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);

	  	$response = $client->request("delete","service/".$service_id."/garden",
		  		[
		  		
		  			'auth'=>[env("USER"),env("PASSWORD")]
	  			]);

	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  }
  }

  public function history($service_id)
  {
  		try {
	  	$client = new Client([
	  			'headers'	=> ['Accept' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);

	  	$response = $client->request("GET","service/".$service_id."/history",
		  		[
		  		
		  			'auth'=>[env("USER"),env("PASSWORD")]
	  			]);

	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  }
  }

  public function update_garden(Request $request,$service_id,$garden)
  {
  	try {

	  	$client = new Client([
			    'headers'   => ['Content-Type'=> 'application/json'],
			    'Accept'    => ['application' => 'application/json'],
	  			'verify'	=> false,
	  			'base_uri'	=> env('BASE_URL')
	  			]);


	  	$response = $client->request("put","service/".$service_id."/garden/".$garden,
		  		[
		  			'auth'=>[env("USER"),env("PASSWORD")],
		  			'json'=>[
			  			'password'=>$request->input("password")
		  			]
		  		]);


	  		$result =array(
	                         "Header"		=> $response->getHeader("Content-Type"),
	                         "StatusCode"   => $response->getStatusCode(),
	                         "Reason"   	=> $response->getReasonPhrase(),
	                         "Body" 		=> $response->getBody()->getContents()
	                );

	  	return $result;
	  	// $this->response($result);
  		
  		} catch(RequestException $e) {
    		
    		if ($e->hasResponse())
    		{
      		  $this->response(Psr7\str($e->getResponse()));
  			}	

	  } 			
  }

  public function response($resp){

  		return $resp;
  		// echo "<pre>";
  		// print_r($resp);
  		// echo "</pre>";

	}




	/*============================AUTHENTICATION============================*/

	public function register(Request $request)
    {
		$input = $request->all();
    	$input['password'] = Hash::make($input['password']);
    	User::create($input);
        return response()->json(['result'=>true]);
    }

    public function login(Request $request)
    {
    	$input = $request->all();

    	if (!$token = JWTAuth::attempt($input)) {

            return response()->json(['result' => 'wrong email or password.']);
        }
    	// DB::enableQueryLog(); 
        	return response()->json(['token' => $token]);
		// dd(DB::getQueryLog());
    }
    public function get_user_details(Request $request)
    {
    	$input = $request->all();
    	$user = JWTAuth::toUser($input['token']);
        return response()->json(['result' => $user]);
    }
	/*===========================ENDAUTHENTICATION==========================*/


}
