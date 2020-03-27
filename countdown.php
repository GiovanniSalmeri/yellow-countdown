<?php
// Countdown extension, https://github.com/GiovanniSalmeri/yellow-countdown
// Copyright (c) 2020 Giovanni Salmeri
// This file may be used and distributed under the terms of the public license.

class YellowCountdown {
    const VERSION = "0.8.10";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="countdown" && ($type=="block" || $type=="inline")) {
            list($time, $precision, $running, $expired) = $this->yellow->toolbox->getTextArgs($text);
            $output = "<span class=\"countdown\" ";
            $output .= "role=\"timer\" "; // 
            $output .= "data-time=\"".strtotime($time)."\" ";
            $output .= "data-precision=\"".($precision ? $precision : "mins")."\" ";
            $output .= "data-running=\"".($running ? $running : "@time")."\" ";
            $output .= "data-expired=\"".($expired ? $expired : "")."\">";
            $output .= "</span>";
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name == "header") {
            $extensionLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreExtensionLocation");
            $output .= "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$extensionLocation}countdown.css\" />\n";
            $output .= "<script type=\"text/javascript\" src=\"{$extensionLocation}countdown.js\"></script>\n";
        }
        return $output;
    }
}
