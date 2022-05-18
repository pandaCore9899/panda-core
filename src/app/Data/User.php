<?php

namespace App\Data;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends PandaModel
{
    use SoftDeletes;
    
    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'role',
        'password',
        'deleted_at'
    ];
    protected $visible = [
        'deleted_at'
    ];

    const ROLE = [
        'super_admin' => 1,
        'admin' => 2,
        'user' => 3,
        'guest' => 4
    ];

    public static function getInstance(){
        return (new static);
    }
}
