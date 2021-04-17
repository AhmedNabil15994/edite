<?php
use App\Models\Variable;

class PaymentHelper {
    protected $secret_key;

    function __construct() {
        $this->secret_key = Variable::getVar('SECRET_KEY');
        $this->publish_key = Variable::getVar('PUBLISH_KEY');
    }

    public static function getPaymentInfo($dataArr) {
      $url = "https://test.oppwa.com/v1/checkouts";
      $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=".$dataArr['price']."" .
                    "&currency=EUR" .
                    "&paymentType=DB";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $responseData = curl_exec($ch);
      if(curl_errno($ch)) {
        return curl_error($ch);
      }
      curl_close($ch);
      return json_decode($responseData);
    }

    public static function checkPaymentStatus($paymentId) {
      $url = "https://test.oppwa.com/v1/checkouts/".$paymentId."/payment";
      $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $responseData = curl_exec($ch);
      if(curl_errno($ch)) {
        return curl_error($ch);
      }
      curl_close($ch);
      return json_decode($responseData);
    }
}

