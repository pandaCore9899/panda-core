<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Utils\PandaTranslate;
use Illuminate\Support\Str;

class PandaModel extends Model
{
    use PandaTranslate;
    
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
    
    public static function getTableColumns()
    {
        return (new static)->getConnection()->getSchemaBuilder()->getColumnListing((new static)->getTable());
    }

    public function scopeInstance($query){
        return $query->whereRaw('TRUE');
    }
    public static function getLocalizationColumn($column_name){
        $snake_case = snakeCase((new static)->getTable());
        $snake_case_table = Str::singular($snake_case);
        return trans('fields/'.$snake_case_table.'.'.$column_name);
    }

}
