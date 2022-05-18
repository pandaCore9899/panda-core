import $ from "jquery";

type CssAttribute = {
    key: string,
    val: string
}
export function replaceClass(selector: string, newClass: string, oldClass: string): void {
    $(selector).removeClass(oldClass).addClass(newClass);
}
export function setCssAttributes(selector: string | string[], attrs: CssAttribute[]): void {
    let selectors = (typeof selector == 'string') ? [selector] : selector;
    for (selector of selectors) {
        for (let attr of attrs) {
            console.log(selector, attr.key, attr.val)
            $(selector).css(attr.key, attr.val)
        }
    }

}
export function setCookie(name: string, value: string, days: number) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
export function getCookie(name: string) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
export function importAll(r: any) {
    return r.keys().map(r);
}
export function switchClass(selector: string, class1: string, class2: string, defaultClass: string) {
    if (!$(selector).hasClass(class1) && !$(selector).hasClass(class2)) {
        $(selector).addClass(defaultClass);
    } else {
        $(selector).toggleClass(`${class1} ${class2}`);
    }
}
export function sendAjaxRequest(_type: string, _url: string, _params: string, _callback: CallableFunction) {

    var request = $.ajax({
        type: _type,
        url: _url,
        data: _params,
        contentType: 'json'
    });
    request.done(function (res) {
        _callback(res);
    });
    request.fail(function (jqXHR, textStatus) {
        console.error(jqXHR);
        _callback({ err: true, message: "Request failed: " + textStatus });
    });

}


