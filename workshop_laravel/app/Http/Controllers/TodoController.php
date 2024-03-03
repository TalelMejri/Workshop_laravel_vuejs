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

    public function addTodo(Request $request){
        // $todo=Todo::create([
        //     "title"=>$request->title,
        //     "description"=>$request->desc
        // ]);
        $todo=new Todo();
        $todo->title=$request->title;
        $todo->description=$request->desc;
        $todo->save();
        return response()->json(["data"=>"Todo Created"],201);
    }

    public function UpdateTodo(Request $request,$id){
        $todo=Todo::find($id);//select * from todo where id=$id
        $todo->update([
            "title"=>$request->title,
            "description"=>$request->desc
        ]);
        return response()->json(["data"=>"Todo Updated"],201);
    }

    public function deleteTodo($id){
        $todo=Todo::find($id);
        $todo->delete();//delete from todo where id=$id;
        return response()->json(["data"=>"Todo Deleted"],204);
    }

    public function GetTodoById($id){
        $todo=Todo::find($id);
        return response()->json(["data"=>$todo],200);
    }
    
    public function ApiTest(){
        return response()->json(["message"=>"Workshop Laravel"],200);
    }
}
