<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    //软删除
    use SoftDeletes;
    //表名
    protected $table = 'admin';
    //白名单
    public $fillable = ['username','password','avatar','sex','nickname','phone','email','role_id','note'];

}
