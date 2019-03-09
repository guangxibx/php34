<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class PublicController extends Controller
{
    // 用户登录载入视图文件
    public function login(Request $request){
        if ($request->isMethod('post')){
            //接收所有数据
            $data = $request->all();
            //验证数据
            $checks  = [
                'username'=>'required',
                'password'=>'required',
                'verify'=>'required|captcha'
            ];
            //提示信息
            $message = [
                'username.required'=>'用户名必填',
                'password.required'=>'密码必填',
                'verify.required'=>'验证码必填',
                'verify.captcha'=>'验证码错误'

            ];
            $validator = Validator::make($data,$checks,$message);
            if ($validator->fails()){
                return redirect()->back()->withErrors($validator->messages()->all());
            }
        //验证数据的合法性
            $adminInfo = Admin::where('username','=',$data['username'])->first();
            if (!$adminInfo){
                return redirect()->back()->withErrors(['用户名或密码错误']);
            }
            //验证密码
            if (!\Hash::check($data['password'],$adminInfo['password'])){
                return redirect()->back()->withErrors(['密码错误']);
            }

            //设置session
            $request->session()->put('is_login',1);
            $request->session()->put('admin_username',$adminInfo->username);
            $request->session()->put('admin_id',$adminInfo->id);
            return redirect()->to('admin');

        }

        return view('admin.public.login');
    }

    //退出功能
    public function logout(Request $request){
        //清除session
        $request->session()->forget('is_login');
        $request->session()->forget('admin_username');
        $request->session()->forget('admin_id');

        //退出成功跳转
        return redirect()->to('admin/login')->withErrors(['退出成功']);
    }
}
