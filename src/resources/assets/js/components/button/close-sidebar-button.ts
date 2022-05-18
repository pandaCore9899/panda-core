import $ from "jquery";
import { replaceClass, setCssAttributes, switchClass} from '../../utils'
const toogle = (): void => {
    // ngan cho su kien lan toa ra ngoai
    event.stopPropagation();
    switchClass('.panda-sidebar','panda-sidebar-hide','panda-sidebar-show','panda-sidebar-hide');
    switchClass('.panda-content','panda-content-hide','panda-content-show','panda-content-hide');
    $('.panda-toogle-sidebar-button').toggleClass('panda-toogle-sidebar-button-selected')
}
export default { toogle };