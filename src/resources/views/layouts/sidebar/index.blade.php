@php
    $menus = menu();
    $icons = menu_icons();
@endphp
<div class="panda-sidebar">
    @foreach ($menus as $key => $item)
        @php
            $has_submenu = is_array($item);
            $current_route = curr_route();
            $sub_menu = $has_submenu ? $item : [];
            $contain_curr_route = in_array($current_route, $sub_menu);
            $selected = $item == $current_route;
            $sub_selected = $has_submenu && $contain_curr_route;
            $text = $has_submenu ? $key : $item;
        @endphp
        @include('layouts.sidebar.items.template',[
            'text' => $text,
            'icon' => $icons[$text],
            'has_sub' => $has_submenu,
            'selected' => $selected,
            'sub_selected' => $sub_selected,
            'wrapper_class' => "panda-sidebar__wrapper",
            'toggle_class' => "panda-sidebar__toggle",
            'sub_menu' => $sub_menu
        ])
    @endforeach
</div>
