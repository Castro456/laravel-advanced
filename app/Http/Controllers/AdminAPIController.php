<?php

namespace App\Http\Controllers;

use App\Models\AdminAPI;
use Illuminate\Http\Request;

class AdminAPIController extends Controller
{
    public function list_all_users()
    {
        // $all_users = AdminAPI::all('email', 'name'); // both this and below query works the same.
        $all_users = AdminAPI::select('id', 'email', 'name')->get();
        return response()->json($all_users); //return the response in json
    }


    public function create_users(Request $request)
    {
        // print_r($request->name); //can get the input values like this.
        // exit();
        $create_user = AdminAPI::create($request->all());
        return response()->json($create_user);  
    }


    public function delete_users(Request $request, $user_id)
    {
        if($request->user_id > 0) {
            $delete_user = AdminAPI::find($user_id);

            // print_r($delete_user);
            // exit;
            $data = $delete_user->delete();
    
            $result = [
                'status' => 200,
                'message' => 'User deleted successfully',
                'data' => $data
            ];
    
            return response()->json($result);
        }
        else {
            return response("nope");
        }
    }
}
