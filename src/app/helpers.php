<?php

use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if (!function_exists('viewIndex')) {
    function viewIndex($path)
    {
        return $path . '.index';
    }
}

if (!function_exists('viewDefault')) {
    function viewDefault($path)
    {
        return $path . '.default';
    }
}

if (!function_exists('getMenuItems')) {
    function getMenuItems($text, $is_sub = false)
    {
        $menu = menu();
        $menu_item = trans('menu.pc.' . $text . '.index');
        if ($is_sub) {
            foreach ($menu as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as  $sub_value) {
                        if ($sub_value == $text) {
                            $menu_item = trans('menu.pc.' . $key . '.' . $text . '.index');
                            break;
                        }
                    }
                }
            }
        }
        return $menu_item;
    }
}

if (!function_exists('menu')) {
    function menu()
    {
        $conf = config('menu.pc');
        return $conf['menu'];
    }
}

if (!function_exists('menu_icons')) {
    function menu_icons()
    {
        return config('menu.pc')['icons'];
    }
}
function uri()
{
    return Route::getCurrentRoute()->uri();
}
function curr_route()
{
    return Route::currentRouteName();
}
if (!function_exists('make_breadcrumb')) {
    function make_breadcrumb($func = null)
    {
        $curr = curr_route();
        if (str_contains($curr, '.')) {
            $curr = explode('.', $curr);
        }
        $menu = collect(menu());
        $res = [];
        if ($curr == "") {
            return ["home"];
        } else {
            foreach ($menu as $item => $sub_item) {
                if (is_array($sub_item)) {
                    foreach ($sub_item as $sub) {
                        if ($sub == $curr) {
                            $res[$item] = trans('menu.pc.' . $item . '.index');
                            $res[$sub] = trans('menu.pc.' . $item . '.' . $sub . '.index');
                        }
                    }
                } else {
                    if ($sub_item == $curr) {
                        $res[$sub_item] = trans('menu.pc.' . $sub_item . '.index');
                    }
                }
            }
        }
        return $res;
    }
}

if(!function_exists('current_page')){
    function current_page(){
        return explode('.', uri())[0];
    }
}

if(!function_exists('add_attribute')){
    function add_attribute($arr, $attr){
        $new_array = array_map(function ($element) use ($attr){
            $element[$attr['key']] = $attr['value'];
            return $element;
        },$arr);
        return $new_array;
    }
}


if(!function_exists('remove_attribute')){
    function remove_attribute($arr, $attr){
        $new_array = array_map(function ($element) use ($attr){
            unset($element[$attr]);
            return $element;
        },$arr);
        return $new_array;
    }
}


if(!function_exists('snakeCase')){
    function snakeCase($str){
        return Str::snake($str);
    }
}

if(!function_exists('array_to_dict')){
    function array_to_dict($arr){
        return collect($arr);
    }
}
if(!function_exists('array_map_key')){
    function array_map_key($f, $arr) {
        return array_map($f, array_keys($arr), $arr);
    }
}