<?php

class Helper
{

    static function formatDate($date, $formate = "Y-m-d h:i:s", $unix = false){
        $date = str_replace("," , '' , $date);
        $FinalDate = $unix != false ? gmdate($formate, $date) : date($formate, strtotime($date));
        return $FinalDate != '1970-01-01 12:00:00' ? $FinalDate : null;
    }

    static function formatDateForDisplay($date, $withTime = false){
        if($date == null || $date == "0000-00-00 00:00:00" || $date == "0000-00-00"){
            return '';
        }

        return $withTime != false ? date("m/d/Y h:i:s A", strtotime($date)) : date("m/d/Y", strtotime($date));
    }
    static function formatDateCustom($date, $format = "Y-m-d H:i:s", $custom = false) {
        if($date == null || $date == "0000-00-00 00:00:00" || $date == "0000-00-00" || $date == ""){
            return '';
        }

        $date = str_replace("," , '' , $date);

        $FinalDate = date($format, strtotime($date));

        if ($format == '24') {
            $FinalDate = date('Y-m-d', strtotime($date)) . ' 24:00:00';
        }

        if ($custom != false) {
            $FinalDate = date($format, strtotime($custom, strtotime($date)));
        }

        return $FinalDate != '1970-01-01 12:00:00' ? $FinalDate : null;
    }

    static function fixPaginate($url, $key) {
        if(strpos($key , $url) == false){
            $url = preg_replace('/(.*)(?)' . $key . '=[^&]+?(?)[0-9]{0,4}(.*)|[^&]+&(&)(.*)/i', '$1$2$3$4$5$6$7$8$9$10$11$12$13$14$15$16$17$18$19$20', $url . '&');
            $url = substr($url, 0, -1);
            return $url ;
        }else{
            return $url;
        }
    }

    Static function GeneratePagination($source){
        $uri = \Request::getUri();
        $count = count($source);
        $total = $source->total();
        $lastPage = $source->lastPage();
        $currentPage = $source->currentPage();

        $data = new \stdClass();
        $data->count = $count;
        $data->total_count = $total;
        $data->current_page = $currentPage;
        $data->last_page = $lastPage;
        $next = $currentPage + 1;
        $prev = $currentPage - 1;

        $newUrl = self::fixPaginate($uri, "page");

        if(preg_match('/(&)/' , $newUrl) != 0 || strpos($newUrl , '?') != false ){
            $separator = '&';
        }else{
            $separator = '?';
        }

        if($currentPage !=  $lastPage ){
            $link = str_replace('&&' , '&' , $newUrl . $separator. "page=". $next);
            $link = str_replace('?&' , '?' , $link);
            $data->next = $link;
            if($currentPage == 1){
                $data->prev = "";
            }else{
                $link = str_replace('&&' , '&' , $newUrl . $separator. "page=". $prev);
                $link = str_replace('?&' , '?' , $link);
                $data->prev = $link ;
            }
        }else{
            $data->next = "";
            if($currentPage == 1){
                $data->prev = "";
            }else{
                $link = str_replace('&&' , '&' , $newUrl . $separator. "page=". $prev);
                $link = str_replace('?&' , '?' , $link);
                $data->prev = $link ;
            }
        }

        return $data;
    }

    static function checkRules($rule){
        if(IS_ADMIN == 1){
            return true;
        }

        $explodeRule = explode(',', $rule);

        /** Sections Rule (array) && User Permission (array) */
        $containsSearch = count(array_intersect($explodeRule, (array) PERMISSIONS)) > 0;
        if($containsSearch == true){
            return true;
        }

        return false;
    }

    static function globalDelete($dataObj) {
         if ($dataObj == null) {
            return response()->json(\TraitsFunc::ErrorMessage('غير موجود'));
        }

        $dataObj->deleted_by = USER_ID;
        $dataObj->deleted_at = date('Y-m-d H:i:s');
        $dataObj->save();

        $data['status'] = \TraitsFunc::SuccessResponse("تم الحذف بنجاح");
        return response()->json($data);
    }

    static function SendMail($emailData){

        \Mail::send($emailData['template'], $emailData, function ($message) use ($emailData) {

            $fromEmailAddress = 'no-reply@tasks.toba-it.com';
            $fromDisplayName = 'Tasks Management App';

            if(isset($emailData['fromEmailAddress'])){
                $fromEmailAddress = $emailData['fromEmailAddress'];
            }

            if(isset($emailData['fromDisplayName'])) {
                $fromDisplayName = $emailData['fromDisplayName'];
            }

            $message->from($fromEmailAddress, $fromDisplayName);

            $message->to($emailData['to'])->subject($emailData['subject']);

        });
    }


    static function convert_number_to_words($number) {
        if(strpos($number, '.') !== false && substr($number, -1) == 0){
            $number = substr($number, 0, -1);
        }
        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' and ';
        $dictionary  = array(

          "0.0"                   => 'zero',
          "0.01"                   => 'one',
          "0.02"                   => 'two',
          "0.03"                   => 'three',
          "0.04"                   => 'four',
          "0.05"                   => 'five',
          "0.06"                   => 'six',
          "0.07"                   => 'seven',
          "0.08"                   => 'eigh',
          "0.09"                   => 'nine',
          "0.1"                  => 'ten',
          "0.11"                  => 'eleven',
          "0.12"                   => 'twelve',
          "0.13"                  => 'thirteen',
          "0.14"                  => 'fourteen',
          "0.15"                  => 'fifteen',
          "0.16"                  => 'sixteen',
          "0.17"                 => 'seventeen',
          "0.18"                  => 'eighteen',
          "0.19"                  => 'nineteen',
          "0.2"                  => 'twenty',
          "0.3"                  => 'thirty',
          "0.4"                  => 'fourty',
          "0.5"                  => 'fifty',
          "0.6"                  => 'sixty',
          "0.7"                  => 'seventy',
          "0.8"                  => 'eighty',
          "0.9"                  => 'ninety',

          0                   => 'zero',
          1                   => 'one',
          2                   => 'two',
          3                   => 'three',
          4                   => 'four',
          5                   => 'five',
          6                   => 'six',
          7                   => 'seven',
          8                   => 'eight',
          9                   => 'nine',
          10                  => 'ten',
          11                  => 'eleven',
          12                  => 'twelve',
          13                  => 'thirteen',
          14                  => 'fourteen',
          15                  => 'fifteen',
          16                  => 'sixteen',
          17                  => 'seventeen',
          18                  => 'eighteen',
          19                  => 'nineteen',
          20                  => 'twenty',
          30                  => 'thirty',
          40                  => 'fourty',
          50                  => 'fifty',
          60                  => 'sixty',
          70                  => 'seventy',
          80                  => 'eighty',
          90                  => 'ninety',
          100                 => 'hundred',
          1000                => 'thousand',
          1000000             => 'million',
          1000000000          => 'billion',
          1000000000000       => 'trillion',
          1000000000000000    => 'quadrillion',
          1000000000000000000 => 'quintillion'
      );

      if (!is_numeric($number)) {
          return false;
      }

      if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
          // overflow
          trigger_error(
              'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
              E_USER_WARNING
          );
          return false;
      }

      if ($number < 0) {
          return $negative . self::convert_number_to_words(abs($number));
      }

      $string = $fraction = null;

      if (strpos($number, '.') !== false) {
          list($number, $fraction) = explode('.', $number);
      }


      switch (true) {
          case $number < 21:
              $string = $dictionary[$number];
              break;
          case $number < 100:
              $tens   = ((int) ($number / 10)) * 10;
              $units  = $number % 10;
              $string = $dictionary[$tens];
              if ($units) {
                  $string .= $hyphen . $dictionary[$units];
              }
              break;
          case $number < 1000:
              $hundreds  = $number / 100;
              $remainder = $number % 100;
              $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
              if ($remainder) {
                  $string .= $conjunction . self::convert_number_to_words($remainder);
              }
              break;
          default:
              $baseUnit = pow(1000, floor(log($number, 1000)));
              $numBaseUnits = (int) ($number / $baseUnit);
              $remainder = $number % $baseUnit;
              $string = self::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
              if ($remainder) {
                  $string .= $remainder < 100 ? $conjunction : $separator;
                  $string .= self::convert_number_to_words($remainder);
              }
              break;
      }

      if (null !== $fraction && is_numeric($fraction)) {
          $string .= $decimal;
          $words = array();
          $i=1;
          foreach (str_split((string) $fraction) as $number) {
              if($i==1)
              {
                 $f="0.";
              }else  if($i==2)
              {
                  $f="0.0";
              }
              $words[] = $dictionary[$f.$number];
              $i++;
          }
          $string .= implode(' ', $words);
          $string .=" Halalas";
      }

      return $string;
  }

      static function convert_number_to_wordsAR($number) {
          $hyphen      = '-';
          $conjunction = ' و ';
          $separator   = ', ';
          $negative    = 'سالب ';
          $decimal     = ' و ';
          $dictionary  = array(

              "0.0"                   => 'صفر',
              "0.01"                   => 'واحد',
              "0.02"                   => 'اثنان',
              "0.03"                   => 'ثلاثة',
              "0.04"                   => 'اربعة',
              "0.05"                   => 'خمسة',
              "0.06"                   => 'ستة',
              "0.07"                   => 'سبعة',
              "0.08"                   => 'ثمانية',
              "0.09"                   => 'تسعة',
              "0.1"                  => 'عشرة',
              "0.11"                  => 'احد عشر',
              "0.12"                   => 'اثنتا عشر',
              "0.13"                  => 'ثلاثة عشر',
              "0.14"                  => 'اربعة عشر',
              "0.15"                  => 'خمسة عشر',
              "0.16"                  => 'ستة عشر',
              "0.17"                 => 'سبعة عشر',
              "0.18"                  => 'ثمانية عشر',
              "0.19"                  => 'تسعة عشر',
              "0.2"                  => 'عشرون',
              "0.3"                  => 'ثلاثون',
              "0.4"                  => 'اربعون',
              "0.5"                  => 'خمسون',
              "0.6"                  => 'ستون',
              "0.7"                  => 'سبعون',
              "0.8"                  => 'ثمانون',
              "0.9"                  => 'تسعون',
              0                   => 'صفر',
              1                   => 'واحد',
              2                   => 'اثنان',
              3                   => 'ثلاثة',
              4                   => 'اربعة',
              5                   => 'خمسة',
              6                   => 'ستة',
              7                   => 'سبعة',
              8                   => 'ثمانية',
              9                   => 'تسعة',
              10                  => 'عشرة',
              11                  => 'احد عشر',
              12                  => 'اثنتا عشر',
              13                  => 'ثلاثة عشر',
              14                  => 'اربعة عشر',
              15                  => 'خمسة عشر',
              16                  => 'ستة عشر',
              17                  => 'سبعة عشر',
              18                  => 'ثمانية عشر',
              19                  => 'تسعة عشر',
              20                  => 'عشرون',
              30                  => 'ثلاثون',
              40                  => 'اربعون',
              50                  => 'خمسون',
              60                  => 'ستون',
              70                  => 'سبعون',
              80                  => 'ثمانون',
              90                  => 'تسعون',
              100                 => 'مائة',
              200                 => 'مائتان',
              300                 => 'ثلاثمائة',
              400                 => 'أربعمائة',
              500                 => 'خمسمائة',
              600                 => 'ستمائة',
              700                 => 'سبعمائة',
              800                 => 'ثمانمائة',
              900                 => 'تسعمائة',
              1000                => 'ألف',
              1000000             => 'مليون',
              1000000000          => 'بليون',
              1000000000000       => 'تريليون',
              1000000000000000    => 'كوادرليون',
              1000000000000000000 => 'كوانتليون',
              101010              => 'آلاف ',
              101011              => 'ريال سعودي',
              101012              => 'فقط'
          );

          if (!is_numeric($number)) {
              return false;
          }

          if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
              // overflow
              trigger_error(
                  'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                  E_USER_WARNING
              );
              return false;
          }

          if ($number < 0) {

              return $negative . self::convert_number_to_wordsAR(abs($number));

          }

          $string = $fraction = null;

          if (strpos($number, '.') !== false) {
              list($number, $fraction) = explode('.', $number);

          }



          switch (true) {
              case $number < 21:

                  $string = $dictionary[101012] .' '.$dictionary[$number].'  '. $dictionary[101011];

                  break;
              case $number < 100:

                  $tens   = ((int) ($number / 10)) * 10;

                  $units  = $number % 10;
                  if ($units) {
                      $string =$dictionary[101012] .' '. $dictionary[$units] . $conjunction  ;
                      $string .= $dictionary[$tens] .'  '. $dictionary[101011];
                  }
                  else
                  {
                      $string =$dictionary[101012] .' '. $dictionary[$tens] .'  '. $dictionary[101011];
                  }



                  break;
              case $number < 1000:

                  $hundreds  = $number / 100;
                  $remainder = $number % 100;
                  $num = (int)$hundreds.'00';

                  $string = $dictionary[101012] .' '. $dictionary[$num];

                  if ($remainder) {
                      //Check Remainder update 26-9-2018
                      if($remainder < 21)
                      {
                          $string3 = $dictionary[$remainder];
                      }
                      else
                      {
                          $tens   = ((int) ($remainder / 10)) * 10;

                          $units  = $remainder % 10;
                          if ($units) {
                              $string3 =  $dictionary[$units] . $conjunction ;

                          }
                          $string3 .= $dictionary[$tens];
                      }


                      // End Update
                      $string .= $conjunction . $string3 .'  '. $dictionary[101011];
                  }
                  else
                  {
                      $string .=  '  '. $dictionary[101011];
                  }

                  break;
              default:

                  $baseUnit = pow(1000, floor(log($number, 1000)));

                  $numBaseUnits = (int) ($number / $baseUnit);

                  $remainder = $number % $baseUnit;

                  if($numBaseUnits > 1)
                  {
                      //Check Remainder update 26-9-2018
                      if($numBaseUnits < 21)
                      {
                          $string3 = $dictionary[$numBaseUnits];
                      }
                      else
                      {
                          $tens   = ((int) ($numBaseUnits / 10)) * 10;

                          $units  = $numBaseUnits % 10;
                          if ($units) {
                              $string3 =  $dictionary[$units] . $conjunction ;

                          }
                          $string3 .= $dictionary[$tens];
                      }


                      // End Update
                      if($numBaseUnits < 11)
                          $getthousand = $dictionary[101010];
                      else
                          $getthousand = $dictionary[1000];

                      $getfirstNum = $string3;

                  }

                  else
                  {

                      $getthousand = $dictionary[$baseUnit];
                      $getfirstNum = '';
                  }

                  $string = $dictionary[101012].' '. $getfirstNum . ' ' . $getthousand ;
                  if ($remainder) {
                      $string .= $remainder < 100 ? $conjunction : $conjunction;

                      $hundreds  = $remainder / 100;
                      $remainder2 = $remainder % 100;
                      $num = (int)$hundreds.'00';



                      $string2 = $dictionary[$num];

                      if ($remainder2) {
                          //Check Remainder update 26-9-2018
                          if($remainder2 < 21)
                          {
                              $string3 = $dictionary[$remainder2];
                          }
                          else
                          {
                              $tens   = ((int) ($remainder2 / 10)) * 10;

                              $units  = $remainder2 % 10;
                              if ($units) {
                                  $string3 =  $dictionary[$units] . $conjunction ;

                              }
                              $string3 .= $dictionary[$tens];
                          }


                          // End Update


                          $string2 .= $conjunction . $string3 .'  '. $dictionary[101011];
                      }
                      else
                      {
                          $string2 .=  '  '. $dictionary[101011];
                      }


                      $string .= $string2 ;


                  }
                  else
                  {
                      $string .='  '. $dictionary[101011];
                  }

                  break;
          }




          if (null !== $fraction && is_numeric($fraction)) {
              $string .= $decimal;
              $words = array();
              $i=1;
              foreach (array_reverse(str_split((string) $fraction)) as $number) {

                  if($i==1)
                  {
                      $f="0.0";
                  }else  if($i==2)
                  {
                      $f="0.";
                  }
                  $words[] = $dictionary[$f.$number];
                  $i++;
              }

              $string .= implode(' و', $words);
              $string .=" هللة";
          }

          return $string;
      }
}
