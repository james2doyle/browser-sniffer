<?php

namespace Browser;

use InvalidArgumentException;

/**
 * Browser Detection
 *
 * @package browser
 */
class Browser {
  private $useragent;
  private $results;

  /**
   * Class Initiator
   * @param string $ua The HTTP_USER_AGENT string
   */
  public function __construct($ua = false)
  {
    if ($ua) {
      $this->useragent = $ua;
    } else {
      throw new InvalidArgumentException;
    }
    $this->results = array();
    $this->results['ua'] = $ua;
    if (preg_match('/linux/i', $this->useragent)) {
      $this->results['platform'] = 'linux';
    } elseif (preg_match('/iPhone|iPod|iPad/i', $this->useragent)) {
      $this->results['platform'] = 'ios';
    } elseif (preg_match('/macintosh|mac os x/i', $this->useragent)) {
      $this->results['platform'] = 'mac';
    } elseif (preg_match('/windows|win32/i', $this->useragent)) {
      $this->results['platform'] = 'windows';
    } elseif (preg_match('/Android/i', $this->useragent)) {
      $this->results['platform'] = 'android';
    } elseif (preg_match('/BlackBerry/i', $this->useragent)) {
      $this->results['platform'] = 'blackberry';
    } elseif (preg_match('/BB[0-9]?[0-9]/i', $this->useragent)) {
      $this->results['platform'] = 'blackberry';
    } else {
      $this->results['platform'] = 'unknown';
    }
    if(strpos($this->useragent, 'MSIE') !== false){
      $this->results['browser'] = 'internet-explorer';
    } elseif(strpos($this->useragent, 'Trident') !== false) {
      // For Supporting IE 11
      $this->results['browser'] = 'internet-explorer';
    } elseif(strpos($this->useragent, 'Vivaldi') !== false) {
      $this->results['browser'] = "vivaldi";
    } elseif(strpos($this->useragent, 'Firefox') !== false) {
      $this->results['browser'] = 'mozilla-firefox';
    } elseif(strpos($this->useragent, 'Chrome') !== false) {
      $this->results['browser'] = 'google-chrome';
    } elseif(strpos($this->useragent, 'Opera Mini') !== false) {
      $this->results['browser'] = "opera-mini";
    } elseif(strpos($this->useragent, 'Opera') !== false) {
      $this->results['browser'] = "opera";
    } elseif(strpos($this->useragent, 'Safari') !== false) {
      $this->results['browser'] = "safari";
    } else {
      $this->results['browser'] = 'unknown';
    }
    return $this->results;
  }

  /**
   * return the array of results
   * @return array results array
   */
  public function get_results()
  {
    return $this->results;
  }

  /**
   * return the browser from results
   * @return string results browser key
   */
  public function get_browser()
  {
    return $this->results['browser'];
  }

  /**
   * return the platform from results
   * @return string results platform key
   */
  public function get_platform()
  {
    return $this->results['platform'];
  }

}