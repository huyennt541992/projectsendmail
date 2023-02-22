<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user';

    public function getAllUser($keywords = null)
    {
        // DB::enableQueryLog();
        $users = DB::table($this->table)
        ->orderBy('id','DESC');

        if(!empty($keywords))
        {
            $users = $users->where(function($query) use($keywords)
            {
                $query->orwhere('name','like','%'.$keywords.'%');
                $query->orwhere('city','like','%'.$keywords.'%');
                $query->orwhere('mailaddress','like','%'.$keywords.'%');
            });
        }
        $users = $users->get();

        // $sql = DB::getQueryLog();
        // dd($sql);
        return $users;
    }

    public function addUser($data)
    {
        return DB::table($this->table)->insert($data);
    }

    // public function getUserId($id)
    // {
    //     $users= DB::table($this->table)
    //             ->where('id', '=', $id)
    //             ->get();
    //     return $users;
    // }

    public function updateUser($data, $id)
    {
        return DB::table($this->table)->where('id',$id)->update($data);
    }

    public function deleteUser($id)
    {
        return DB::table($this->table)->where('id',$id)->delete();
    }
}
