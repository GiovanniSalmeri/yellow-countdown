// Countdown extension, https://github.com/GiovanniSalmeri/yellow-countdown

"use strict";
document.addEventListener("DOMContentLoaded", function() {
    if (!String.prototype.padStart) { // polyfill
        String.prototype.padStart = function padStart(targetLength, padString) {
            if (this.length > targetLength) return this;
            else return (padString.repeat(targetLength) + this).slice(-targetLength);
        };
    }
    var timers = Array.from(document.getElementsByClassName("countdown"));
    var now, labels;
    var offset = 0;
    if (timers) {
        function update() {
            var units = [86400, 3600, 60, 1];
            for (var i = 0; i < timers.length; i++) {
                var block = timers[i].tagName == "DIV";
                var distance = timers[i].dataset.time - now/1000;
                if (block) {
                    if (distance > 0) {
                        var acc = 0;
                        for (var j = 0; j <=3; j++) {
                            if (timers[i].children[j].style.display == "none" && acc > 0) break;
                            var q = ~~(distance / units[j]);
                            timers[i].children[j].firstChild.textContent = q.toString().padStart(2, "0");
                            if (acc == 0) timers[i].children[j].style.display = "inline-block";
                            acc += q;
                            distance -= q * units[j];
                        }
                    } else {
                        for (var j = 0; j <=3; j++) {
                            timers[i].children[j].firstChild.textContent = "00";
                        }
                        timers[i].classList.add("expired");
                        timers.splice(i, 1);
                    }
                } else {
                    if (distance > 0) {
                        labels = labels || timers[i].dataset.labels.split(/,\s*/);
                        var text = "";
                        var p = +timers[i].dataset.precision;
                        for (var j = 0; j <=3; j++) {
                            var q = ~~(distance / units[j]);
                            text += q ? (" " + q + "\xa0" + (q == 1 ? labels[j*2] : labels[j*2+1])) : "";
                            if (p <= j && text.length > 0) break;
                            distance -= q * units[j];
                        }
                        timers[i].textContent = timers[i].dataset.running.replace("@time", text);
                    } else {
                        timers[i].textContent = timers[i].dataset.expired;
                        timers[i].classList.add("expired");
                        timers.splice(i, 1);
                    }
                }
            }
            now = Date.now() + offset;
        }
        if (window.XMLHttpRequest) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 2) {
                    now = Date.parse(xhttp.getResponseHeader("Date"));
                    offset = now - Date.now();
                    setInterval(update, 1000);
                }
            };
            xhttp.open('head', window.location.href.toString(), true);
            xhttp.setRequestHeader("Content-Type", "text/html");
            xhttp.send();
        } else {
            now = Date.now();
            setInterval(update, 1000);
        }
    }
});
