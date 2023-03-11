<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // register new user 
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'confirm_password' => 'required',
            'role' =>'required',
        ]);
   
        if($validator->fails()){
            return response()->json($validator->errors());
            // return $this->sendError('Validation Error.', $validator->errors());       
        }
        //create user to DB
        // return response()->json($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        if($user->save()){
            return response()->json(["success", "تم اضافة مستخدم جديد"]);
        }
        return response()->json(["failed", "حدث خطأ ما أثناء التسجيل"]);
        
    }
}
