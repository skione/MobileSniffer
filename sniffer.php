<?php
        /***********************************************************************************************************************/
        /*Sniffer library (C) 2010
        /*Author: Michael Sole
        /*There are 5 functions in this library:
        /* 1. emu_getallheaders: stores all apache headers into an array
        /* 2. mobileSniffer: detects if the device is a mobile device and then redirects to a URL provided
        /* 3. webSniffer: detects if the device is NOT a mobile device and then redirects to a URL provided
        /* 4. osSniffer: detects if the device has a specific OS (passed) and then redirects to a URL provided
        /* 5. deviceSniffer: detects if the device has a specific device (passed) and then redirects to a URL provided
        /***********************************************************************************************************************/
       
        function checkDevice() {               
                $isMobile = false;
 
                $ceCheck = strstr($_SERVER['HTTP_USER_AGENT'], "CE");
                $iphoneCheck = strstr($_SERVER['HTTP_USER_AGENT'], "iPhone");
                $bbCheck = strstr($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
                $droidCheck = strstr($_SERVER['HTTP_USER_AGENT'], "Android");
                $BREWCheck = strstr($_SERVER['HTTP_USER_AGENT'], "BREW");
                $webOSCheck = strstr($_SERVER['HTTP_USER_AGENT'], "webOS");
                $WindowsPhoneOSCheck = strstr($_SERVER['HTTP_USER_AGENT'], "Windows Phone OS");
               
                if ($headers['X-Wap-Profile'] || $ceCheck || $iphoneCheck || $bbCheck || $droidCheck || $BREWCheck || $webOSCheck || $WindowsPhoneOSCheck){
                        $isMobile = false;
                }
               
                return $isnotMobile;
        }
       
        function mobileSniffer($url) {
                $isMobile = checkDevice();
        if (strlen($_SERVER['QUERY_STRING'])>0) {
            $querystring = '?'.$_SERVER['QUERY_STRING'];
        } else {
            $querystring = '';
        }
                if ($isMobile) {
                        header('Location: '.$url.'?'.$_SERVER['QUERY_STRING']);
                        exit;
                }
        }
       
        function webSniffer($url) {
                $isMobile = checkDevice();
               
                if ($isMobile==0) {
                        header('Location: '.$url.'?'.$_SERVER['QUERY_STRING']);
                        exit;
                }
        }
 
        function osSniffer($os,$url) {
                $osCheck = strstr($_SERVER['HTTP_USER_AGENT'], $os);
               
                if ($osCheck){
                        header('Location: '.$url.'?'.$_SERVER['QUERY_STRING']);
                }
        }
       
        function deviceSniffer($device,$url) {
                $model = $_SERVER['HTTP_X_DEVICEPARAM_DEVICEMODEL'];
 
                if ($model==$device){
                        header('Location: '.$url.'?'.$_SERVER['QUERY_STRING']);
                        exit;
                }
        }
 
 
?>
