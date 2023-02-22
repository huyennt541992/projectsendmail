<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
//use Mail;
use App\Mail\Subscriber;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserRequest;
//use DB;

class Kadai3Controller extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index(Request $request)
    {
        $keywords = null;
        //$filters = [];
        if(!empty($request->keywords))
        {
            $keywords = $request->keywords;
        }
        $userList = $this->users->getAllUser($keywords);
        return view('clients.users.kadai3.list')->with('userList',$userList);
    }
    /**
     * Ship the given order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendmail(Request $request)
    {
        foreach($request->checked as $key => $item)
        {
            $result = $this->users->findOrFail($item);
            $email= $result->mailaddress;
            if(Mail::to($email)->send(new Subscriber($result)))
            {
                return back()->with('msg','指定されたメアドにメールを送りました。');
                //return '<span stype="color:green;text-align:center;">指定されたメアドにメールを送りました。</span>';
            }
            else
            return back()->with('msg','指定されたメアドにメールを送れません。');
        }

    }
    //lay ra thong tin cua user de chinh sua 
    public function getUser($id)
    {
       // dd($id = session('id'));
        $title = "ユーザーの変更";
        // if(!empty($id))
        // {
            $userDetail=$this->users->findOrFail($id);
            //dd($request->session()->put('id',$id));
            //dd(empty($userDetail[0]));
        //     if(empty($userDetail[1]))
        //     {
        //         $request->session()->put('id',$id);
        //         $userDetail=$userDetail[1];
        //         dd($userDetail);
        //     }
        //     else
        //     {
        //         return redirect()->route('users.list')->with('msg','User khong ton tai');
        //     }
        // }
        // else {return redirect()->route('users.list')->with('msg','Link lien ket khong ton tai');
        // } 
        return view('clients.users.kadai3.edit',compact('title','userDetail'));
    }

    public function updateUser(UserRequest $request, $id)
    {
        //$id = session('id');
        //dd($request->session()->get());
        //dd($id);
        if(empty($id))
        {
            return back()->with('msg','このリンクが存じません。');
        }
        $dataUpdate = [
            "name" => $request->name,
            "city" => $request->city,
            "mailaddress" => $request->mailaddress
        ];
        $this->users->updateUser($dataUpdate,$id);
        
        return redirect()->route('users.list')->with('msg','更新できました。');
        
    }
    //phuong thuc get 
    public function addUser()
    {
        //$this->data['title']='';
        return view('clients.users.kadai3.add');
    }

    public function confirmUser(UserRequest $request)
    {
        $dataInsert = [
            "name" => $request->name,
            "city" => $request->city,
            "mailaddress" => $request->mailaddress
        ];
        return view('clients.users.kadai3.confirm')->with('dataConfirm',$dataInsert);
    }
    //phuong thuc post 
    public function handleAddUser(Request $request)
    {
        $dataInsert = [
            "name" => $request->name,
            "city" => $request->city,
            "mailaddress" => $request->mailaddress
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users.list')->with('msg','ユーザーを追加できました。');
    }
    public function deleteUser($id)
    {
        $deleteStatus = $this->users->deleteUser($id);
        if($deleteStatus)
        {
            $msg = 'ユーザーを削除できました。';
        } else
        {
            $msg = 'ユーザーを削除出来ませんでした。';
        }
        return redirect()->route('users.list')->with('msg',$msg);

    }


}
