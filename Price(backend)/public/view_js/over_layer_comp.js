var OverLayer = function (targetDom, method) {
    if (method == 'draw'){
        var overlayerHtml = '<div class="overlay dark"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div >';
        targetDom.append(overlayerHtml);
    } else if (method == 'break') {
        targetDom.children('.overlay.dark').remove();
    }
};

var SetCookie = function (cookieName, cookieVal, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cookieName + "=" + cookieVal + ";" + expires + ";path=/";
}

var GetCookie = function (cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 30);
        }
    }
}