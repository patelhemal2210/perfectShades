<?php
/*
 * isNotNullOrEmpty
 * strLength
 * isAlphabets
 * isNumber
 * isPhoneNumber
 * isEmail
 * isPostal
 * patternMatch
 * isDate (various formats)
 * within number range
 *
 *
 */

/**
 * Class Validator
 */
class Validator {

    /**
     * Used to define space is accepted in string
     */
    const ACCEPT_WITH_SPACE = 0;
    /**
     * Used to define space is not accepted in string
     */
    const REJECT_WITH_SPACE = 1;

    const PATTERN_FOR_ALPHABETS = "/^[a-zA-Z]*$/";
    const PATTERN_FOR_ALPHABETS_WITH_SPACE = "/^[a-zA-Z ]*$/";

    const PATTERN_FOR_NUMBER = "/^[0-9]*$/";
    const PATTERN_FOR_PHONE_NUMBER = "/^[0-9]{3}#[0-9]{3}#[0-9]{4}$/";

    const SEPARATOR_FOR_PHONE_NUMBER = "-";

    const PHONE_NUMBER_LEN = 12;
    const PHONE_NUMBER_LEN_WITHOUT_SEPARATOR = 10;
	
	const PATTERN_FOR_POSTAL = "/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/";

	

    // general function can be used to check for fields which have not been provided values
	public static function isNotNullOrEmpty($value) {
		$value = trim($value);
		if ($value == null || $value == "" || $value == "0") {
			return false; 
		} else {
			return true; 
		}
	}

    /**
     * @name strLength
     * @desc  provide the length of the string
     * @param $val value to be inspected
     * @param $trim [Optional] trim if true else keep it intact, Default is True.
     * @return length of string
     */
    public static function strLength($val, $trim = true) {
        if($trim)
            return strlen(trim($val));
        else
            return strlen($val);
    }

    /**
     * @name isAlphabets
     * @desc  Determines if given string contains only alphabets.
     * @param $val value to be inspected
     * @param $len [Optional] Restriction to length of the string. Default is 0 means no restriction. $len < 0 will be ignored.
     * @param $filter [Optional] Determines if space is accepted or not in string. Default is ACCEPT_WITH_SPACE. Invalid values will be considered as ACCEPT_WITH_SPACE.
     * @return True/False
     */
    public static function isAlphabets($val, $len = 0, $filter = self::ACCEPT_WITH_SPACE) {

        $status = true;
        if(empty($val)) {
            $status = false;
        }
        else {
            $trimmedVal = trim($val);
        }

        if($status) {
            //Ignore negative values
            if($len <= 0)
                $len = 0;

            if($len > 0 && self::strLength($trimmedVal) > $len)
            {
                $status = false;
            }
        }

        if($status)
        {
            if($filter == self::REJECT_WITH_SPACE)
                $pattern = self::PATTERN_FOR_ALPHABETS;
            else
                $pattern = self::PATTERN_FOR_ALPHABETS_WITH_SPACE;

            if(!preg_match($pattern, $trimmedVal))
                $status = false;
        }

        return $status;
    }

    /**
     * @name isNumber
     * @desc determines if provided value is Number or not.
     * @param $val Value to be inspected
     * @param $len [Optional] Number of Digits in provided value. Default is 0 in which case it will ignore the length.
     * @return True/False
     */
    public static function isNumber($val, $len = 0) {
        $status = true;
        if(empty($val)) {
            $status = false;
        }
        else {
            $trimmedVal = trim($val);
        }

        if($status) {
            //Ignore negative values
            if($len <= 0)
                $len = 0;

            if($len > 0 && self::strLength($trimmedVal) > $len)
            {
                $status = false;
            }
        }


        if($status)
        {
            $pattern = self::PATTERN_FOR_NUMBER;
            if(!preg_match($pattern, $trimmedVal))
                $status = false;
        }

        return $status;
    }

    /**@name generateNumberPattern
     * @desc generates number pattern based on the separator provided
     * @param $separator separator in phone number
     * @return generated pattern for the phone number
     */
    private static function generateNumberPattern($separator){
        if(empty($separator)) {
            $separator = self::SEPARATOR_FOR_PHONE_NUMBER;
        }
        $pattern = str_replace("#", $separator, self::PATTERN_FOR_PHONE_NUMBER);

        return $pattern;
    }

    /**
     * @name isPhoneNumber
     * @desc determines if provided phone number is in valid format or not
     * @param $val value to be inspected
     * @param $separator [Optional] separator in phone number. Default is "" means no separator in phone number
     * @return True/False
     */
    public static function isPhoneNumber($val, $separator = "") {
        $status = true;
        if(empty($val)) {
            $status = false;
        }
        else {
            $trimmedVal = trim($val);
            //cant trim separator since it might be "space"
            $trimmedSprt = $separator;
        }

        if($status) {
            if($separator == "")
            {
                $status = self::isNumbers($trimmedVal, self::PHONE_NUMBER_LEN_WITHOUT_SEPARATOR);
            }
            else
            {
                // eg, 111-111-1111 OR 111.111.1111
                if(self::strLength($trimmedVal) != self::PHONE_NUMBER_LEN)
                    $status = false;

                if($status == true)
                {
                    if(self::strLength($separator) > 1)
                        $trimmedSprt = $separator[0];

                    $pattern = self::generateNumberPattern($trimmedSprt);
                    if(!preg_match($pattern, $trimmedVal))
                        $status = false;
                }

            }
        }

        return $status;
    }

    /**
     * @name isEmail
     * @desc validate that provided value is valid email address or not
     * @param $val value to be inspected
     * @return True/False
     */
    public static function isEmail($val) {
        $status = true;

        if(empty($val)) {
            $status = false;
        }
        else {
            $trimmedVal = trim($val);
        }

        if($status) {
            if(!filter_var($trimmedVal, FILTER_VALIDATE_EMAIL))
                $status = false;
        }

        return $status;
    }
	
	function isPostal($value) {
		$pattern = self::PATTERN_FOR_POSTAL;
		if(preg_match($pattern, $value)){
			return true; 
		}
		else {
			return false;  
		}
	}

    /**
     * @name isNumberRange
     * @desc check if provided value lies between range
     * @param $val value to be inspected
     * @param $min min value of the Range
     * @param $max max value of the Range
     * @param $inclusive [Optional] determine if range is inclusive or not. Default is Inclusive
     * @return True/False
     */
    public static function inNumberRange($val, $min, $max, $inclusive = false) {
        $status = true;

        if(empty($val) || empty($min) || empty($max)) {
            $status = false;
        }
        else {
            $trimmedVal = trim($val);
            $trimmedMin = trim($min);
            $trimmedMax = trim($max);
        }

        if($status) {
            if(self::isNumber($trimmedVal) && self::isNumber($trimmedMin) && self::isNumber($trimmedMax)) {
                if($inclusive == true) {
                    if(!($trimmedVal >= $trimmedMin && $trimmedVal <= $trimmedMax)) {
                        $status = false;
                    }
                }
                else {
                    if(!($trimmedVal > $trimmedMin && $trimmedVal < $trimmedMax)) {
                        $status = false;
                    }
                }

            }
            else {
                $status = false;
            }
        }

        return $status;
    }


 #password contains at least one capital, one number and small letter minimum of 8, max of 12 characters   

/**
     * @name isPassword
     * @desc  Determines if given password is valid, contains at least one capital, one number and small letter minimum of 8, max of 12 characters
     * @param $password value to be inspected
*/
public static function isPassword($password)
   {
      
      if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z?]{8,12}$/',$password)
      )
          return true;
       else
           return false;
   }
   
   /**
    * @name isShorterThan
    * @desc  Determines if given string is shorter than given length  
    * @param $str string to be inspected
    * @param $length length to be inspected
    */
    public static function isShorterThan($str,$length){
       if(strlen($str)<$length){
           return true;
       }else{
           return false;
       }
   }
   
   
   /**
    * @name isLongerThan
    * @desc  Determines if given string is longer than given length  
    * @param $str string to be inspected
    * @param $length length to be inspected
    */
   
   public static function isLongerThan($str,$length){
       if(strlen($str)>$length){
           return true;
       }else{
           return false;
       }
   }


   /**
    * @name isValidDate_YYYY_mm_dd
    * @desc  Determines if given date format is valid (YYYY-mm-dd)   
    * @param $date value to be inspected
    */
   public static function isValidDate_YYYY_mm_dd($date){
       $temp = DateTime::createFromFormat("Y-m-d", $date);
       return $temp && $temp->format("Y-m-d") == $date;
   }
   
   /**
    * @name isValidDate_ddmmYYYY
    * @desc  Determines if given date format is valid (dd/mm/YYYY)   
    * @param $date value to be inspected
    */
   public static function isValidDate_ddmmYYYY($date){
       $temp = DateTime::createFromFormat("d/m/Y", $date);
       return $temp && $temp->format("d/m/Y", $date);
   }
   
   /**
    * @name isValidDate_dd_mm_yy
    * @desc  Determines if given date format is valid (dd-mm-yy)   
    * @param $date value to be inspected
    */
   public static function isValidDate_ddmmYY($date){
       $temp = DateTime::createFromFormat("d/m/y", $date);
       return $temp && $temp->format("d/m/y", $date);
   }
   
   /**
    * @name isValidDate_d_m_yy
    * @desc  Determines if given date format is valid (d-m-yy)   
    * @param $date value to be inspected
    */
   public static function isValidDate_dmyy($date){
       $temp = DateTime::createFromFormat("j/n/y", $date);
       return $temp && $temp->format("j/n/y", $date);
   }
   
   /**
    * @name isValidDate_YY_mm_dd
    * @desc  Determines if given date format is valid (YY-mm-dd)   
    * @param $date value to be inspected
    */
   public static function isValidDate_YY_mm_dd($date){
       $temp = DateTime::createFromFormat("y-m-d", $date);
       return $temp && $temp->format("y-m-d", $date);
   }
   
   /**
    * @name isValidDate_mddyy
    * @desc  Determines if given date format is valid (m-dd-YY)   
    * @param $date value to be inspected
    */
   public static function isValidDate_mddyy($date){
       $temp = DateTime::createFromFormat("n/d/y", $date);
       return $temp && $temp->format("n/d/y", $date);
   }
   
   /**
    * @name isValidDate_dd_MMM_YY
    * @desc  Determines if given date format is valid (dd-MMM-YY)   
    * @param $date value to be inspected
    */
   public static function isValidDate_ddMMMYY($date){
       $temp = DateTime::createFromFormat("d-M-y", $date);
       return $temp && $temp->format("d-M-y", $date);
   }
   
   /**
    * @name isValidDate_dd_MMM_YYYY
    * @desc  Determines if given date format is valid (dd-MMM-YYYY)   
    * @param $date value to be inspected
    */
   public static function isValidDate_dd_MMM_YYYY($date){
       $temp = DateTime::createFromFormat("d-M-Y", $date);
       return $temp && $temp->format("d-M-Y", $date);
   }
   
   /**
    * @name isValidDate_mm-dd-YYYY
    * @desc  Determines if given date format is valid (mm-dd-YYYY)   
    * @param $date value to be inspected
    */   
   public static function isValidDate_mm_dd_YYYY($date){
       $temp = DateTime::createFromFormat("m-d-Y", $date);
       return $temp && $temp->format("m-d-Y", $date);
   }
   
   /**
    * @name isValidDate_mmddYYYY
    * @desc  Determines if given date format is valid (mm/dd/YYYY)   
    * @param $date value to be inspected
    */
   public static function isValidDate_mmddYYYY($date){
       $temp = DateTime::createFromFormat("m/d/Y", $date);
       return $temp && $temp->format("m/d/Y", $date);
   }   

}







?>