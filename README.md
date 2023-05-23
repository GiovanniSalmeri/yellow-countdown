# Countdown 0.8.16

Textual or digital countdown timer.

<p align="center"><img src="countdown-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install an extension

[Download ZIP file](https://github.com/GiovanniSalmeri/yellow-countdown/archive/main.zip) and copy it into your `system/extensions` folder. [Learn more about extensions](https://github.com/annaesvensson/yellow-update).

## How to show a countdown

Create a `[countdown]` shortcut. The timer will be shown in a textual style if the shortcut is used in-line (i.e. among other text), in a digital style if it is used as a block (i.e. alone in a paragraph).

The following arguments are available, all but the first argument are optional:

`Deadline` = deadline in format `YYYY-MM-DD` (you can omit days) or `"YYYY-MM-DD HH:MM:SS"` (you can omit seconds)  
`Precision` = precision of the timer, `days`, `hours`, `mins`, `secs`  
`Alignment` = countdown alignment, e.g. `left`, `center`, `right`  
`RunningMessage` = text for the time left (`@time` will be replaced with the actual time)  
`ExpiredMessage` = text when the time is expired  

`Alignment` is ignored for textual timers; `RunningMessage` and `ExpiredMessage` are ignored for digital timers.

If you want to customise the timer with CSS, write a `countdown-custom.css` file, put it into your `system/extensions` folder, open file `system/extensions/yellow-system.ini` and change `CountdownStyle: custom`. Another option to customise the timer with CSS is editing the files in your `system/themes` folder. It's recommended to use the latter option.

## Examples

Showing a countdown timer, with various options:

    [countdown 2021-07-21]
    [countdown "2020-06-04 15:00"]
    [countdown 2021-07-21 hours left] 
    [countdown 2021-07-21 hours - "Still @time left!" "Sorry, the time is expired!"]  

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`.

`CountdownSymbols` = show SI symbols ("d", "h", "min", "s") instead of localised strings (e.g. "days", "hours" etc.), 1 or 0  
`CountdownStyle` = digital countdown graphical style (you can choose between `plain`, `squared`, `button`)  

Set the right `CoreServerTimezone` (e.g. `Europe/Rome`) for the countdown to work properly.

## Developer

Giovanni Salmeri. [Get help](https://datenstrom.se/yellow/help/).
