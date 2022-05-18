import $ from "jquery";
function dropdownSidebar(element: HTMLElement) {
    let divClick = $(element);
    let divContainer = divClick.next();
    let icon = divClick.children('.panda-dropdown-sidebar-icon').eq(0).children();
    let icon_text = icon.text()
    let after_icon = ''
    if (icon_text == "chevron_right") {
        after_icon = "expand_more"
    } else {
        after_icon = "chevron_right"
    }
    $('.panda-dropdown-sidebar-icon').children().text("chevron_right")
    icon.text(after_icon);
    let containers = $('.panda-dropdown__container').not(divContainer);
    containers.removeClass('panda-show')
    if (divContainer.hasClass('panda-show')) {
        divContainer.removeClass('panda-show')
    } else {
        divContainer.addClass('panda-show')
    }
}
export default { dropdownSidebar };