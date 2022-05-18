<div class="panda-dropdown__wrapper {{ $wrapper_class ?? '' }} panda-close-not-click">
    <div class="panda-dropdown__toggle {{ $toggle_class ?? '' }}" onclick="PANDA.commonDropdown.dropdown(this)">
        <div class="panda-navbar__account__wrapper">
            <div class="panda-navbar__account__avt">
                <img src="assets/images/panda-avt.jpg" alt="">
            </div>
            <div class="panda-navbar__account__name">
                Admin
            </div>
        </div>
    </div>
    <div class="panda-dropdown__container {{ $container_class ?? '' }} panda-close-not-click">
        <div class="panda-navbar__account__dropdown__item"><i class="material-icons">info</i><span>Account Information</span></div>
        <div class="panda-navbar__account__dropdown__item"><i class="material-icons">favorite</i><span>My Favorite</span></div>
        <div class="panda-navbar__account__dropdown__item"><i class="material-icons">vpn_key</i><span>Change Password</span></div>
        <div class="panda-navbar__account__dropdown__item"><i class="material-icons">logout</i><span>Log out</span></div>
    </div>
</div>
