<?php

namespace App\Http\Controllers;

use App\Models\AdminAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAPIController extends Controller
{
    public function list_all_admins()
    {
        // $all_users = AdminAPI::all('email', 'name'); // both this and below query works the same.
        $all_users = AdminAPI::select('id', 'email', 'name')->get();
        return response()->json($all_users); //return the response in json
    }


    public function create_admin(Request $request)
    {
        $create_user = AdminAPI::create($request->all());
        return response()->json($create_user);  
    }


    public function delete_admin(Request $request, $admin_id)
    {
        if($request->admin_id > 0) {
            $delete_user = AdminAPI::find($admin_id);

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
