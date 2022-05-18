import $ from "jquery";
function showNotification(element: HTMLDivElement){
    let dropdown = $(element).children('.panda-box').eq(0);
    let select = $(element).children('.panda-icon').eq(0);
    $('.panda-icon').removeClass('panda-notification-selected');
    if(dropdown.hasClass('panda-show')){
        dropdown.removeClass('panda-show')
        dropdown.addClass('panda-hide')
        $(select).removeClass('panda-notification-selected')
    }else{
        $('.panda-notification__container').removeClass('panda-show');
        dropdown.addClass('panda-show')
        $(select).addClass('panda-notification-selected')   
    }  
}
export default {
    showNotification,
}