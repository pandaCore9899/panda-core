import $ from 'jquery';

const close = () => {
    $('#myModal').remove();
}
const initModal = () => {
  
    $('#myModal')
        .append('<div class="modal-content lightning-box-shadow-all"><span class="modal-close lightning-box-shadow-all" onclick ="PANDA.modal.close()">&times;</span></div>')
        $('body').prepend('<div id="myModal" class="modal"></div>')
}

const initWithIframe = (url: string, className: string = '') => {
    let path = url ?? window.location.href.split('?')[0]
    $('body').prepend(`<div id="myModal" class="modal"></div>`)
    $('#myModal')
        .append(`<div class="modal-content lightning-box-shadow-all  ${className}"><span class="modal-close lightning-box-shadow-all" onclick ="PANDA.modal.close()">&times;</span><iframe src=${url ?? path}></iframe></div>`)
}

interface ModalOptions {
    isIframe: boolean,
    className: string,
}
const showModal = (url: string, options: ModalOptions) => {
    if (options['isIframe'] == true) {
        initWithIframe(url,options['className']??'')
    } else {
        initModal()
    }
    // $('#myModal').css('display', 'flex')
}

const outside = () => {
    $(document).click(function () {
        event.stopPropagation;
        let modal = $('#myModal')
        if (event.target instanceof Element ) {
            if (!modal.has(event.target).length && !$(event.target).hasClass('__show_modal') ){
                console.log(event.target)
                modal.remove()
            }
       }
    });
}

export default {
    showModal,
    close,
    outside
}