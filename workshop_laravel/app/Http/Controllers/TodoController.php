<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getTodos(){
        $todos=Todo::all();
        return response()->json(["data"=>$todos],200);//200 : OK // Type : get
    }

    public function ApiTest(){
        return response()->json(["message"=>"Workshop Laravel"],200);
    }
}
