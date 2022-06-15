<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function calcTax($salary,$taxPercentage = 0.15){
        return floor($salary * $taxPercentage);
    }

    public function netSalary($salary){
        return $salary - $this->calcTax($salary);
    }
    public function index(){
//       $users = User::where('salary',">",10000)

//           ->where("nation","mm")
//           ->where("gender","male")
//           ->orderBy('salary','desc')->get();



//       dd($users);

//        $users = User::orWhere("nation","mm")->orWhere("nation","jp")->dd();
//        $users = User::whereIn("nation",["mm","jp"])->where("gender","male")->where("salary",">",5000)->get();
//        $users = User::where("nation","mm")->count();
//        $users = User::where("nation","mm")->sum('salary');
//        $users = User::where("nation","mm")->avg('salary');
//        $users = User::where("nation","mm")->get();
        $users = User::where("nation","mm")->paginate(5)->through(function ($user){
            $user->tax = $this->calcTax($user->salary);
            $user->net_salary = $this->netSalary($user->salary);
            return $user;
        });


//        dd($users);
       return $users;
    }
}
