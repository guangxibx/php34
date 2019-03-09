<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    public function index(){
        //载入视图
        return view('admin.index.index');
    }

    //欢迎页面
    public function welcome(){
        //载入视图
        return view('admin.index.welcome');
    }
}
