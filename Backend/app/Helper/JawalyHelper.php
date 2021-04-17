<?php
namespace App\Helper;
use App\Models\Variable;
use Http;
class JawalyHelper{

	public static function sendSMS($mobileNumber,$messageContent){
		$response = Http::get('http://www.4jawaly.net/api/sendsms.php',[
			'username' => 'servers',
			'password' => 'aaa123',
			'numbers' => $mobileNumber,
			'message' => urlencode( $messageContent),
			'sender' => 'DSC',
			'unicode' => 'E',
			'return' => 'json',
		]);
		return $response->json();
	}
}