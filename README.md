# Countdown 0.8.16

Textual or digital countdown timer.

<p align="center"><img src="countdown-screenshot.png?raw=true" alt="Screenshot"></p>

## How to show a countdown

Create a `[countdown]` shortcut. The timer will be shown in a textual style if the shortcut is used in-line (i.e. among other text), in a digital style if it is used as a block (i.e. alone in a paragraph).

The following arguments are available, all but the first argument are optional:

`Deadline` = deadline in format `YYYY-MM-DD` (you can omit days) or `"YYYY-MM-DD HH:MM:SS"` (you can omit seconds)  
`Precision` (default: `mins`) = precision of the timer (possible values: `days`, `hours`, `mins`, `secs`); whatever precision is set, it will scale up when the time is running out  
`Alignment` (default: `center`) = countdown alignment, e.g. `left`, `center`, `right`  
`RunningMessage` (default: `"@time"`) = text for showing the time left (`@time` will be replaced with the actual time)  
`ExpiredMessage` (default: `""`) = text shown when the time is expired   

`Alignment` is ignored for textual timers; `RunningMessage` and `ExpiredMessage` are ignored for digital timers.

## Example

Showing a countdown timer, with various options:

    [countdown 2021-07-21]
    [countdown "2020-06-04 15:00"]
    [countdown 2021-07-21 hours left] 
    [countdown 2021-07-21 hours - "Still @time left!" "Sorry, the time is expired!"]  

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`.

`CountdownSymbols` (default: `0`) = show SI symbols ("d", "h", "min", "s") instead of localised strings (e.g. "days", "hours" etc.), 1 or 0  
`CountdownStyle` (default: `plain`) = digital countdown graphical style (you can choose between `plain`, `squared`, `button`)  

Set `CoreServerTimezone` (e.g. `Europe/Rome`) for the countdown to work properly.

If you want to add a new `fancy` style, write a `countdown-fancy.css`  file and put into the `system/extensions` folder.

## Installation

[Download extension](https://github.com/GiovanniSalmeri/yellow-countdown/archive/master.zip) and copy zip file into your `system/extensions` folder. Right click if you use Safari.

## Developer

Giovanni Salmeri. [Get help](https://datenstrom.se/yellow/help/)
