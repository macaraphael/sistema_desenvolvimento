<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of navigator
 *
 * @author Raphael
 */
class browser {
    //put your code here
    public function browser_user(){
        $useragent = $_SERVER['HTTP_USER_AGENT'];
 
        if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
          $browser_version=$matched[1];
          $browser = 'IE';
        } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
          $browser_version=$matched[1];
          $browser = 'Opera';
        } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
          $browser_version=$matched[1];
          $browser = 'Firefox';
        } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
          $browser_version=$matched[1];
          $browser = 'Chrome';
        } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
          $browser_version=$matched[1];
          $browser = 'Safari';
        } else {
          // browser not recognized!
          $browser_version = 0;
          $browser= 'other';
        }
        
        return $browser;
    }
}

?>
