<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 13:01
 */

namespace modules\payment_tracker\util;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Util{

    private $browser_array = array('/msie/i'       =>  'Internet Explorer',
        '/firefox/i'    =>  'Firefox',
        '/safari/i'     =>  'Safari',
        '/chrome/i'     =>  'Chrome',
        '/opera/i'      =>  'Opera',
        '/netscape/i'   =>  'Netscape',
        '/maxthon/i'    =>  'Maxthon',
        '/konqueror/i'  =>  'Konqueror',
        '/mobile/i'     =>  'Handheld Browser');

    private $os_array = array('/windows nt 10/i'     =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile');


    public function getOS($userAgent) {

        $os_platform = "Unknown OS Platform";

        foreach ($this->os_array as $regex => $value) {

            if (preg_match($regex, $userAgent)) {
                $os_platform = $value;
            }
        }

        return $os_platform;
    }

    public function getBrowser( $userAgent) {

        $browser = "Unknown Browser";

        foreach ($this->browser_array as $regex => $value) {

            if (preg_match($regex, $userAgent)) {
                $browser = $value;
            }
        }

        return $browser;
    }
}