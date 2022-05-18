<div class="triangle-up-5-white panda-notification__triangle "></div>
<div class="panda-notification__dropdown  lightning-box-shadow-all" onblur="close()">
    <div class="panda-notification__header"> <i class="material-icons md-18">{{ $icon }}</i>Notifications
        <span>({{ $count }})</span>
    </div>
    <div class="panda-notification__option">
        <div class="panda-notification__option__item panda-selected">All</div>
        <div class="panda-notification__option__item ">Unread</div>
        <div class="panda-notification__option__item ">Read</div>
        <div class="panda-notification__option__view-all "> View detail</div>
    </div>
    @foreach ($notifications as $item)
        <div class="panda-notification__dropdown__item">
            <div class="panda-notification__dropdown__item__avt"><img src="assets/images/panda-avt.jpg" alt=""></div>
            <div class="panda-notification__dropdown__item__content">
                <div class="panda-notification__dropdown__item__content__wrapper">
                    <div class="panda-notification__dropdown__item__content__text">Hãy ghé thăm Nagasaki - Nhật Bản, nơi
                        được ban tặng miền thiên nhiên giàu có, núi non hữu tình chuyển sắc qua bốn mùa và vùng biển vô
                        cùng xinh đẹp.</div>
                    <div class="panda-notification__dropdown__item__content__time">6 h ago</div>
                </div>

            </div>
            <div class="panda-notification__dropdown__item__option">
                <div class="cycle-10-blue"></div>
            </div>

        </div>
    @endforeach

</div>
