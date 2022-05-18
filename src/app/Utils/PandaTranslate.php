<?php

namespace App\Utils;

trait PandaTranslate
{
    public function getLocalizeColumn($col_name)
    {
        $trans_model  = snakeCase($col_name);
        return trans($trans_model.'.'.$col_name);
    }
}
