import $ from 'jquery';
const previous = (element: HTMLElement, icon_show: string = null, icon_hide: string = null, more_text: string =null, less_text:string = null) => {
    element.classList.toggle("active");
    let icon = $(element).children('.material-icons')
    let text = $(element).children('.panda-accordion__label')
    if(icon_show&&icon_hide){
        if(icon.text()==icon_show){
            text.text(less_text)
            icon.text(icon_hide)
        }else{
            text.text(more_text)
            icon.text(icon_show)
        }
    }
    var panel = <HTMLElement>element.previousElementSibling;
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
    } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
    }

}
const next = (element: HTMLElement, icon_show: string = null, icon_hide: string = null, more_text: string =null, less_text:string = null) => {
    element.classList.toggle("active");
    let icon = $(element).children('.material-icons')
    let text = $(element).children('.panda-accordion__label')
    if(icon_show&&icon_hide){
        if(icon.text()==icon_show){
            text.text(less_text)
            icon.text(icon_hide)
        }else{
            text.text(more_text)
            icon.text(icon_show)
        }
    }
    var panel = <HTMLElement>element.nextElementSibling;
    console.log(panel)
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
    } else {
        
        panel.style.maxHeight = panel.scrollHeight + "px";
    }

}
export default {
    previous,
    next
}