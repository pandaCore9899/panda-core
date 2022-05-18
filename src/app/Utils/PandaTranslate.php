<?php

namespace App\Utils;

trait PandaTranslate
{
    public static function translateWithFormat($key, $attrs)
    {
        $name = static::getLocalizationColumn($attrs);
        // dump(sprintf(trans($key), $name));
        // $attrs = array_map(function($el){
        //     return ;
        // },$attrs);
        return sprintf(trans($key), $name);
    }

    public function getLocalizeColumn($col_name)
    {
        $trans_model  = snakeCase($col_name);
        return trans($trans_model . '.' . $col_name);
    }
}
