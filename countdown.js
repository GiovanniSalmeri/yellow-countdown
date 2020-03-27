"use sctrict";
document.addEventListener("DOMContentLoaded", function() {
    var timers = document.getElementsByClassName("countdown");
    var now;
    if (timers) {
        function update() {
            var precs = { "days": 0, "hours": 1, "mins": 2, "secs": 3 };
            var units = [86400, 3600, 60, 1];
            var labels = ["d", "h", "min", "s"];
            for (var i = 0; i < timers.length; i++) {
                var distance = timers[i].dataset.time - now;
                if (distance > 0) {
                    var text = "";
                    var p = precs[timers[i].dataset.precision];
                    for (var j = 0; j <=3; j++) {
                        var q = ~~(distance / units[j]);
                        text += q ? (" " + q + labels[j]) : "";
                        if (p <= j && text.length > 0) break;
                        distance -= q * units[j];
                    }
                    timers[i].textContent = timers[i].dataset.running.replace("@time", text);
                } else {
                    timers[i].textContent = timers[i].dataset.expired;
                    timers[i].classList.add("expired");
                }
            }
            now = now + 1;
        }
        if (window.XMLHttpRequest) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 2) {
                    now = ~~(Date.parse(xhttp.getResponseHeader("Date"))/1000);
                    setInterval(update, 1000);
                }
            };
            xhttp.open('head', window.location.href.toString(), true);
            xhttp.setRequestHeader("Content-Type", "text/html");
            xhttp.send();
        } else {
            now = ~~(Date.now()/1000);
            setInterval(update, 1000);
        }
    }
});
