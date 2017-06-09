<?php 
require_once('simple_html_dom.php');

class Scraper
{
	private static $instance; 
	
	private function __construct()
    {

    }

	
	public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Scraper();
        }
        return self::$instance;
    }
	
	public static function getAmazonPrice($url) {
		sleep (3); // avoid timeout from amazon
		
		// get xml version of contents of url
		$html = file_get_html($url);
		
		if ($html == false) { // if no html contents are received
			echo "\n**Sleeping 10s due to timeout/request blocked**\n"; // try request again later to see if amazon is no longer blocking after 10s
			sleep (10);
			$html = file_get_html($url);
		}
		
		if ($html == false) {
			//if request failed for 2nd time, return null (no price found)
		    return null; 
		}
		
		// find element span with id priceblock_ourprice (text containing price on amazon page)
		$priceString = $html->getElementById("priceblock_ourprice");
		
		// if not found in usual amazon price location, check for price from alternate sellers located in different DOM position
		if ($priceString == null) {
			//$priceString = $html->getElementsByClassName("a-color-price")[0];
			$priceString = $html->find('span[class=a-color-price]')[0];
		}
		
		$price = null; 
		// extract the float value containing the price itself - remove CDN $, etc.
		if (preg_match_all('/\d+(\.\d+)?/', $priceString, $matches)) {
			$price = $matches[0];
			$price = $price[0];
		}
		else {
			// if price not found on page, return null (likely it item is not available or amazon is returning captcha due to too many requests)
			return null; 
		}
		
		return $price; 
	}
	
}

?> 