<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Nations;
//use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class Kadai1Controller extends Controller
{
    private $nations;
    public function __construct()
    {
        $this->nations = new Nations();
    }
    public function index()
    {
        $nationList = $this->nations->all();
        return view('clients.users.kadai1.add')->with('nationList',$nationList);
    }
    public function confirmUser(Request $request)
    {
        $dataInsert = [
            "name" => $request->name,
            "nation_name" => $request->city,
            "mailaddress" => $request->mailaddress
        ];
        return view('clients.users.kadai1.confirm')->with('dataConfirm',$dataInsert);
    }
    /**
     * Ship the given order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendmail(Request $request)
    {
        //Mail::to($request->mailaddress)->send(new SendMail($request));
        if(Mail::to($request->mailaddress)->send(new SendMail($request)))
        {
           // return back()->with('msg','指定されたメアドにメールを送りました。');
            //return '<span stype="color:green;text-align:center;">指定されたメアドにメールを送りました。</span>';
            return redirect()->route('users.add1')->with('msg','メールを送信できました。。');
        }
        else
        return '<span stype="color:red;text-align:center;">指定されたメアドにメールを送れません。</span>';
    }
}
