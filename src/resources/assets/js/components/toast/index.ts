import toasty from "./toasty";
import $ from 'jquery';
const init = (message: string, mode: string, isReload: boolean=null, animation:string='pinItDown') => {
    var options = {
        classname: "toast",
        transition: "pinItDown",
        insertBefore: true,
        duration: 3000,
        enableSounds: true,
        autoClose: true,
        // BOOLEAN: enable or disable the progressbar:
        // .... Set to BOOLEAN TRUE  - enable the progressbar only if the autoClose option value is set to BOOLEAN TRUE.
        // .... Set to BOOLEAN FALSE - disable the progressbar.
        progressBar: true,
        sounds: {
            // path to sound for informational message:
            info: "./assets/sounds/info/1.mp3",
            // path to sound for successfull message:
            success: "./assets/sounds/success/1.mp3",
            // path to sound for warn message:
            warning: "./assets/sounds/warning/1.mp3",
            // path to sound for error message:
            error: "./assets/sounds/error/1.mp3",
        },

        // callback:
        // onShow function will be fired when a toast message appears.
        onShow: function () { },

        // callback:
        // onHide function will be fired when a toast message disappears.
        onHide: function () {
            if(isReload)location.reload()
        },

        // the placement where prepend the toast container:
        prependTo: document.body.childNodes[0]
    };
    let toast = new toasty(options);
    return eval(`toast.${mode}("${message}")`);
}

export default {
    init,
}