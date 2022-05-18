import $ from 'jquery';
function dropdown(element: HTMLElement, changeColor: boolean = true) {
    event.stopPropagation();
    let divClick = $(element);
    let divContainer = divClick.next();
    let containers = $('.panda-close-not-click').not(divContainer);
    containers.removeClass('panda-show')
    if (divContainer.hasClass('panda-show')) {
        divContainer.removeClass('panda-show')
        divClick.children().removeClass('panda-selected')
    } else {
        $('.panda-close-not-click').find('*').removeClass('panda-selected')
        if(changeColor)
        divClick.children().addClass('panda-selected')
        divContainer.addClass('panda-show')
    }
}
function outside() {
    $(document).click(function () {
        let wrappers = $('.panda-close-not-click')
        if (event.target instanceof Element ) {
            if (!wrappers.has(event.target).length){
                wrappers.find("*").removeClass('panda-selected')
                wrappers.find("*").removeClass('panda-show')
            }
       }
    });
}
export default {
    dropdown,
    outside
}