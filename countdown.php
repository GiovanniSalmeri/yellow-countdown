<?php
// Countdown extension, https://github.com/GiovanniSalmeri/yellow-countdown

class YellowCountdown {
    const VERSION = "0.8.17";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("countdownSymbols", "0");
        $this->yellow->system->setDefault("countdownStyle", "plain");
        $this->yellow->language->setDefaults([
            "Language: en",
            "CountdownLabels: day, days, hour, hours, minute, minutes, second, seconds",
            "Language: de",
            "CountdownLabels: Tag, Tage, Stunde, Stunden, Minute, Minuten, Sekunde, Sekunden",
            "Language: fr",
            "CountdownLabels: jour, jours, heure, heures, minute, minutes, seconde, secondes",
            "Language: it",
            "CountdownLabels: giorno, giorni, ora, ore, minuto, minuti, secondo, secondi",
            "Language: es",
            "CountdownLabels: día, días, hora, horas, minutos, minutos, segundos, segundos",
            "Language: nl",
            "CountdownLabels: dag, dagen, uur, uren, minuut, minuten, seconde, seconden",
            "Language: pt",
            "CountdownLabels: dia, dias, hora, horas, minutos, minutos, segundos, segundos",
        ]);
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="countdown" && ($type=="block" || $type=="inline")) {
            list($time, $precision, $style, $running, $expired) = $this->yellow->toolbox->getTextArguments($text);
            $labels = $this->yellow->system->get("countdownSymbols") ? ["d", "d", "h", "h", "min", "min", "s", "s"] : preg_split("/\s*,\s*/", $this->yellow->language->getText("countdownLabels"));
            $precs = [ "days" => 0, "hours" => 1, "mins" => 2, "secs" => 3 ];
            $precisionCode = isset($precs[$precision]) ? $precs[$precision] : 2;
            if ($type=="block") {
                $output .= "<div class=\"countdown";
                if (!is_string_empty($style)) $output .= " ".htmlspecialchars($style);
                $output .= "\" ";
                $output .= "role=\"timer\" ";
                $output .= "data-time=\"".strtotime($time)."\">";
                for ($i = 0; $i < 4; $i++) {
                    $output .= "<span".($i > $precisionCode ? " style=\"display: none\"" : "")."><span>00</span> <span class=\"label\">".$labels[$i*2+1]."</span></span>\n";
                }
                $output .= "</div>";
            } else {
                $output = "<span class=\"countdown\" ";
                $output .= "role=\"timer\" ";
                $output .= "data-time=\"".strtotime($time)."\" ";
                $output .= "data-precision=\"".$precisionCode."\" ";
                $output .= "data-running=\"".($running ? $running : "@time")."\" ";
                $output .= "data-expired=\"".($expired ? $expired : "")."\" ";
                $output .= "data-labels=\"".$this->yellow->language->getText("countdownLabels")."\">";
                $output .= "</span>";
            }
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name == "header") {
            $extensionLocation = $this->yellow->system->get("coreServerBase").$this->yellow->system->get("coreExtensionLocation");
            $style = $this->yellow->system->get("countdownStyle");
            $output .= "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$extensionLocation}countdown-{$style}.css\" />\n";
            $output .= "<script type=\"text/javascript\" src=\"{$extensionLocation}countdown.js\"></script>\n";
        }
        return $output;
    }
}
