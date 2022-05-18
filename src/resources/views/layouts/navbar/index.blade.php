<div class="panda-navbar lightning-box-shadow-all">
    <button id="close" class="panda-toogle-sidebar-button" onclick="PANDA.button.closeSidebarButton.toogle()">
        <i class="material-icons" id="panda-toogle-sidebar-button-icon">menu</i>
    </button>
    <div class="panda-logo">
        <img src="assets/images/panda-logo.png" alt="">
    </div>
    @include(viewIndex('layouts.navbar.searchbar'))
    @include(viewIndex('layouts.navbar.notification'))
    @include(viewIndex('layouts.navbar.account'))
</div>
