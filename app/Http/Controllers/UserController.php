<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/list');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        if(empty($data['password'])){

            $this->Message('danger','请输入密码');
            return redirect('user');
        }
        array_pull($data,'_token');
        array_pull($data,'_method');
        $time=date("Y-m-d H:i:s");
        $data['created_at']=$time;
        $data['updated_at']=$time;
        $data['password']=bcrypt($data['password']);
        $user=new User();
        $res=$user->insert($data);
        if(!$res){
            $this->Message('danger','添加失败');
        }else{
            $this->Message('success','添加成功');
        }

        return redirect('user');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userdata=User::find($id);
        if(empty($userdata)){
            $this->Message('warning','没有此信息');
            return redirect('user');
        }
        //
        $data=$request->all();
        array_pull($data,'_token');
        array_pull($data,'_method');
        if(empty($data['password'])){
            array_pull($data,'password');
        }else{
            $data['password']=bcrypt($data['password']);
        }
        $time=date("Y-m-d H:i:s");
        $data['updated_at']=$time;
        $User=new User();
        $res=$User->where(['id'=>$id])->update($data);
        if(!$res){
            $this->Message('danger','更新失败');
        }else{
            $this->Message('success','更新成功');
        }

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $userdata=User::find($id);
        if(empty($userdata)){
            $this->Message('warning','没有此信息');
            return redirect('user');
        }
        $User=new User();
        $res=$User->where(['id'=>$id])->delete();
        if(!$res){
            $this->Message('danger','删除失败');
        }else{
            $this->Message('success','删除成功');
        }

        return redirect('user');
    }

    public function Datalist(Request $request,User $user)
    {
        $draw=$request->input('draw');
        $start=$request->input('start');
        $length=$request->input('length');
        $order=$request->input('order');
        $search=$request->input('search');
        switch ($order[0]['column']){
            case 0:$column="id";break;
            case 3:$column="created_at";break;
            default:$column="created_at";break;
        }
        if(!empty($search['value'])){
            $total=$user->where('nickname','like','%'.$search['value'].'%')->count();
            $data=$user->where('nickname','like','%'.$search['value'].'%')->orderBy($column,$order[0]['dir'])->offset($start)->limit($length)->get();
        }else{
            $total=$user->count();
            $data=$user->orderBy($column,$order[0]['dir'])->offset($start)->limit($length)->get();
        }
        $items=array();
        if(!empty($data)){
            foreach ($data as $key=>$val){
                $items[$key]=$val;
                $items[$key]['number']=$key+1;

            }
        }
        return ['draw'=>$draw,'recordsTotal'=>$total,'recordsFiltered'=>$total,'data'=>$items];
    }

    public function Message($type='info',$info='添加成功')
    {
        $info = new MessageBag(['type'=>$type,'info'=>$info]);
        session()->flash('info', $info);
    }
}
