import '../sass/app.scss'
import dropdown from './components/dropdown/dropdown';
import page from './components/pages/pages';
import button from './components/button';
import notification from './components/layout/navbar/notification';
import navbar from './components/layout/navbar/account';
import commonDropdown from './components/common/dropdown';
import accordion from './components/accordion/accordion';
import list from './components/list';
import modal from './components/modal';
import { importAll,pandaRedirect } from './utils';
import toast from './components/toast'
(<any>window).PANDA = {
    commonDropdown,
    navbar,
    dropdown,
    page,
    button,
    notification,
    accordion,
    list,
    modal,
    toast,
    pandaRedirect
};
window.onload = () =>{
    commonDropdown.outside();
    modal.outside();
}
$(document).ready(function(){
    $('input[type=file]').each(function() {
    var fileNames = this.innerText;
    var leftRightStrings = fileNames.split('.');
    //file name
    var fName = leftRightStrings[0];
    //file extension
    var fExtention = leftRightStrings[1];
    var lengthFname = fName.length;
    //if file name without extension contains more than 15 characters   
    if(lengthFname > 15){
        $(this).html(fName.substr(0,10) + "..." + fName.substr(-5) + "." +fExtention);
    }    
}); 
}); 

importAll(require.context('../images', false, /\.(png|jpe?g|svg)$/));