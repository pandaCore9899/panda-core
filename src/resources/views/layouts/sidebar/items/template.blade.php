<div class="panda-dropdown__wrapper {{ $wrapper_class ?? '' }}{{ $selected ? ' panda-selected' : '' }}">
    <div class="panda-dropdown__toggle {{ $toggle_class ?? '' }} "
        onclick="{{ $has_sub ? 'PANDA.dropdown.dropdownSidebar(this)' : "PANDA.page.redirect('" . route($item) . "')" }}">
        @include('layouts.sidebar.items.item_click', [
            'text' => $text,
            'icon' => $icon,
            'has_sub' => $has_sub,
            'selected' => $selected,
        ])
    </div>
    <div class="panda-dropdown__container {{ $container_class ?? '' }} {{ $sub_selected ? 'panda-show' : '' }}">
        @if ($has_sub)
            @include('layouts.sidebar.items.item_dropdown')
        @endif

    </div>
</div>
