<div class="panda-sidebar__sub-items {{ $sub_selected ? 'panda-show' : '' }}"
    id="panda-dropdown-sidebar-sub-item-{{ $key }}">
    @foreach ($sub_menu as $item)
        <div onclick={{ "PANDA.page.redirect('" . route($item) . "')" }}
            class="panda-sidebar__sub-items__item {{ $item == curr_route() ? 'panda-selected' : '' }}">
            {{ getMenuItems($item,true) }}
        </div>
    @endforeach
</div>