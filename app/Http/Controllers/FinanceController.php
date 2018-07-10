<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;
use App\Models\Dictionarie;
use Illuminate\Support\MessageBag;

class FinanceController extends Controller
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
        $project=\App\Models\Dictionarie::where(['type'=>'project'])->get();
        return view('finance/list',['project'=>$project]);
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
//        if(!is_int($data['money']) && !is_float($data['money'])){
//            $info=array('type'=>'warning','info'=>'输入金额错误');
//            $info = new MessageBag($info);
//            session()->flash('info', $info);
//            return redirect('finance');
//        }
        array_pull($data,'_token');
        array_pull($data,'_method');
        $time=date("Y-m-d H:i:s");
        $data['users_id']=Auth()->user()->id;
        $data['created_at']=$time;
        $data['updated_at']=$time;
        $Finance=new Finance();
        $res=$Finance->insert($data);
        if(!$res){
            $this->Message('danger','添加失败');
        }else{
            $this->Message('success','添加成功');
        }

        return redirect('finance');
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
        $financedata=Finance::find($id);
        if(empty($financedata)){
            $this->Message('warning','没有此信息');
            return redirect('finance');
        }
        //
        $data=$request->all();
        array_pull($data,'_token');
        array_pull($data,'_method');
        $time=date("Y-m-d H:i:s");
        $data['users_id']=Auth()->user()->id;
        $data['updated_at']=$time;
        $Finance=new Finance();
        $res=$Finance->where(['id'=>$id])->update($data);
        if(!$res){
            $this->Message('danger','更新失败');
        }else{
            $this->Message('success','更新成功');
        }

        return redirect('finance');
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
        $financedata=Finance::find($id);
        if(empty($financedata)){
            $this->Message('warning','没有此信息');
            return redirect('finance');
        }
        $Finance=new Finance();
        $res=$Finance->where(['id'=>$id])->delete();
        if(!$res){
            $this->Message('danger','删除失败');
        }else{
            $this->Message('success','删除成功');
        }

        return redirect('finance');
    }

    public function Datalist(Request $request,Finance $finance)
    {
        $draw=$request->input('draw');
        $start=$request->input('start');
        $length=$request->input('length');
        $order=$request->input('order');
        $columns=$request->input('columns');
        switch ($order[0]['column']){
            case 0:$column="id";break;
            case 4:$column="money";break;
            case 5:$column="date";break;
            case 7:$column="created_at";break;
            default:$column="date";break;
        }
        $where=array();
        if(!empty($columns[1]['search']['value'])){
            $where['type']=$columns[1]['search']['value'];
        }
        if(!empty($columns[2]['search']['value'])){
            $where['project']=$columns[2]['search']['value'];
        }
        if(!empty($columns[5]['search']['value'])){
            $date=explode('~',$columns[5]['search']['value']);

            $total=$finance->where($where)->whereBetween('date',$date)->count();
            $data=$finance->where($where)->whereBetween('date',$date)->orderBy($column,$order[0]['dir'])->offset($start)->limit($length)->get();
            //收入
            $where['type']=1;
            $s=$finance->where($where)->whereBetween('date',$date)->sum('money');
            //支出
            $where['type']=2;
            $z=$finance->where($where)->whereBetween('date',$date)->sum('money');
        }else{
            $total=$finance->where($where)->count();
            $data=$finance->where($where)->orderBy($column,$order[0]['dir'])->offset($start)->limit($length)->get();
            //收入
            $where['type']=1;
            $s=$finance->where($where)->sum('money');
            //支出
            $where['type']=2;
            $z=$finance->where($where)->sum('money');
        }

        $items=array();
        if(!empty($data)){
            foreach ($data as $key=>$val){
                $items[$key]=$val;
                $items[$key]['number']=$key+1;
                $items[$key]['type_name']=$val['type']==1?'收入':'支出';
                $items[$key]['project_name']=$val->project_account->value;
                $items[$key]['users_name']=$val->user_account->name;
                $items[$key]['s']=$s;
                $items[$key]['z']=$z;

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
