Countdown 0.8.10
=============
Textual or digital countdown timer.

<p align="center"><img src="countdown-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](../../archive/master.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `master.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to insert a countdown

Create a `[countdown]` shortcut. The timer will be shown in a textual style if the shortcut is used in-line (i.e. among other text), in a digital style if it is used as a block (i.e. alone in a paragraph).

The following arguments are available, all but the first argument are optional:

`Deadline` = deadline in format `YYYY-MM-DD` (you can omit days) or `"YYYY-MM-DD HH:MM:SS"` (you can omit seconds)  
`Precision` (default: `mins`) = precision of the timer (possible values: `days`, `hours`, `mins`, `secs`); whatever precision is set, it will scale up when the time is running out  
`Alignement` (default: `center`) = countdown alignement, e.g. `left`, `center`, `right`  
`RunningMessage` (default: `"@time"`) = text for showing the time left (`@time` will be replaced with the actual time)  
`ExpiredMessage` (default: `""`) = text shown when the time is expired   

`Alignement` is ignored for textual timers; `RunningMessage` and `ExpiredMessage` are ignored for digital timers.

## Settings

The following settings can be configured in file `system/settings/system.ini`.

`CountdownSymbols` (default: `0`) = show SI symbols ("d", "h", "min", "s") instead of localised strings (e.g. "days", "hours" etc.), 1 or 0  
`CountdownStyle` (default: `plain`) = digital countdown graphical style (you can choose between `plain`, `squared`, `button`)  

Remember also to set `CoreServerTimezone` (e.g. `Europe/Rome`) for the countdown to work properly.

If you want to add a new `fancy` style, write a `countdown-fancy.css`  file and put into the `system/extensions` folder. Do not modify the standard styles, since they will be overwritten in case of update of the extension.

## Examples

Embedding a countdown timer, with various options:

    [countdown 2021-07-21]
    [countdown "2020-06-04 15:00"]
    [countdown 2021-07-21 hours left] 
    [countdown 2021-07-21 hours - "Still @time left!" "Sorry, the time is expired!"]  

## Developer

Giovanni Salmeri. [Get support](https://github.com/GiovanniSalmeri/yellow-countdown/issues).
