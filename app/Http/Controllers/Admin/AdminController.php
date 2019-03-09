<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Admin $admin)
    {
        //$data['admins'] = $admin->get();
        $data['admins'] = $admin->paginate(5);
        //载入视图
        return view('admin.admin.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //载入视图
        return view('admin.admin.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取所有
        $data = $request->all();

        //\Validator::make(需要验证数据,验证规则,自定义提示语)
        //验证规则
        $checks = [
            'username'=>'required|unique:admin',
            'password'=>'required|same:password2',
            'phone'=>'required|unique:admin|regex:/\d{11}/',
            'email'=>'required|unique:admin|email',
            'avatar'=>'filled|file|image:jpeg,jpg,gif,png|max:8388608',
        ];
        //提示语
        $messages = [
            'username.required'=>'用户名必填',
            'username.unique'=>'用户名已存在',
            'password.required'=>'密码必填',
            'password.same'=>'两次输入密码不一致',
            'phone.required'=>'手机号必填',
            'phone.unique'=>'手机号码已存在',
            'phone.regex'=>'手机格式不正确',
            'email.required'=>'邮箱必填',
            'email.unique'=>'邮箱已存在',
            'email.email'=>'邮箱格式不正确',
            'avatar.filled'=>'图像文件必传',
            'avatar.file'=>'文件上传失败',
            'avatar.image'=>'文件格式不正确(peg,jpg,gif,png)',
            'avatar.max'=>'文件上传超过8M',
        ];
        $validator = Validator::make($data,$checks,$messages);
        if ($validator->fails()){
            return['status'=>false,'message'=>$validator->messages()];
        }

        //给上传文件设置路径
        $newPath = 'avatar/'.date('Y-m-d');
        $newFileName = date('YmdHis').time().'.jpg';
        //保存 storeAs(路径,文件名,存储空间);
        $data['avatar'] = $request->avatar->storeAs($newPath,$newFileName,'public');

        //密码加密
        $data['password'] = bcrypt($data['password']);
        $res = Admin::create($data);
        if ($res === false){
            return['status'=>false,'message'=>['添加失败']];

        }else{
            return['status'=>true,'message'=>'添加成功'];
        }
        //dd($data);
        //dump($validator->messages());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {

        //载入视图文件
        return view('admin.admin.edit',['adminInfo'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //接受所有数据
        $data = $request->all();
        //验证数据
        $checks = [
            'username'=>'required|unique:admin,username,'.$admin->id,
            'phone'=>'required|regex:/\d{11}/|unique:admin,phone,'.$admin->id,
            'email'=>'required|email|unique:admin,email,'.$admin->id,
        ];
        //提示信息
        $message = [
            'username.required'=>'用户名必填',
            'username.unique'=>'用户名已存在',
            'phone.required'=>'手机号必填',
            'phone.unique'=>'手机号码已存在',
            'phone.regex'=>'手机格式不正确',
            'email.required'=>'邮箱必填',
            'email.unique'=>'邮箱已存在',
            'email.email'=>'邮箱格式不正确',
            'password.required'=>'密码必填',
            'password.same'=>'两次输入密码不一致',
            'avatar.filled'=>'图像文件必传',
            'avatar.file'=>'文件上传失败',
            'avatar.image'=>'文件格式不正确(peg,jpg,gif,png)',
            'avatar.max'=>'文件上传超过8M',
        ];

        if ($data['password'] || $data['password2']){
            $checks['password'] = 'required|same:password2';
        }
        //判断文件上传
        if ($request->avatar){
            $checks['avatar'] = 'filled|file|image:jpeg,jpg,gif,png|max:8388608';
        }

        $validator = Validator::make($data,$checks,$message);
        if ($validator->fails()){
            return['status'=>false,'message'=>$validator->messages()];
        }
        //排除密码
        if (empty($data['password'])){
            unset($data['password']);
        }else{
            $data['password'] = bcrypt($data['password']);
        }

        //排除头像
        if (empty($data['avatar'])){
            unset($data['avatar']);
        }else{
            //给上传文件设置路径
            $newPath = 'avatar/'.date('Y-m-d');
            $newFileName = date('YmdHis').time().'.jpg';
            //保存 storeAs(路径,文件名,存储空间);
            $data['avatar']  = $request->avatar->storeAs($newPath,$newFileName,'public');

        }

        $res = $admin->update($data);
        if ($res === false){
            return['status'=>false,'message'=>['修改失败']];
        }else{
            return['status'=>true,'message'=>'修改成功'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {

        //删除数据
        $res = $admin->delete();
        if ($res !== false){
            return['status'=>true,'message'=>'删除成功'];
        }else{
            return['status'=>false,'message'=>'删除失败'];
        }
    }
}
