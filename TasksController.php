<?php

namespace App\Http\Controllers;
use DB;


use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $data = DB::table('tasks')
		        ->get();
        return view('tasks_main',['list'=>$data ]);
    }
    public function insertData(Request $req)
    {
        $data = DB::table('tasks')
                ->insert([
                    'name' => $req->name, 
                    'description' => $req->description,
                    'category' => $req->category 
                ]);

         if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'New Alerts Added Successfully ',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Internal server error please try again.',
            ]);
        }
    } 

    public function deleteNote($id)
    {   
      
        $delete_id = $id;
        $delete_query = DB::table('tasks')->where('id', $delete_id)->delete();

        if($delete_query){
             return response()->json([
             'message' => 'Record has been deleted successfully!',
             'status'  => true
            ]);
        }
        else{
            return response()->json([
                'message' => 'Internal Error',
                'status'  => false
            ]);
        }
    }


    public function viewEditNote(Request $req, $id)
    {   
      
        $data = DB::table('tasks')
        ->where('id',$id)
        ->update([
            'name' => $req->name, 
            'description' => $req->description,
            'category' => $req->category 
        ]);
       
        

    if ($data) {
        return response()->json([
        'status' => true,
        'message' => 'New Alerts Added Successfully ',
    ]);
    }
    else {
        return response()->json([
        'status' => false,
        'message' => 'Internal server error please try again.',
    ]);
    }
}
}