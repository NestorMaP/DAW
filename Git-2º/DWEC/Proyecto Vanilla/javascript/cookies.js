export function setCookie(cname, cvalue, exdays) {
    const d= new Date();
    d.setTime(d.getTime() + (exdays * (1000*60*60*24)));
    const expires = "expires="+d.toUTCString();
    document.cookie = `${cname}=${encodeURIComponent(JSON.stringify(cvalue))};${expires};path=/`
}

export function getCookie(cname) {
    const name = cname + "=";
    const ca = document.cookie.split(';');
    for (let i=0; i<ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c= c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return JSON.parse(decodeURIComponent(c.substring(name.length, c.length)));
        }
    }
    return null;
}

export function deleteCookie(cname) {
    document.cookie = cname + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
}