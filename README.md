Countdown 0.8.10
=============
Textual countdown timer.

<p align="center"><img src="countdown-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](../../archive/master.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `master.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to insert a countdown

Create a `[countdown]` shortcut. 

The following arguments are available, all but the first argument are optional:

`deadline` = deadline in format `YYYY-MM-DD` (you can omit days) or `"YYYY-MM-DD HH:MM:SS"` (you can omit seconds)  
`precision` (default: `mins`) = precision of the timer (possible values: `days`, `hours`, `mins`, `secs`); whatever precision is set, it will scale up when the time is running out  
`runningMessage` (default: `"@time"`) = text for showing the time left (`@time` will be replaced with the actual time)  
`expiredMessage` (default: `""`) = text when the time is expired   

If you want to modify the style, change the `countdown.css` file.

## Examples

Embedding a countdown timer, with various options:

    [countdown 2021-07-21]
    [countdown "2020-06-04 15:00"]
    [countdown 2021-07-21 hours "Still @time left!" "Sorry, the time is expired!"]

## Developer

Giovanni Salmeri. [Get support](https://github.com/GiovanniSalmeri/yellow-countdown/issues).
