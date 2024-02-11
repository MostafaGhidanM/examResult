<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("logins.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'fullName' => 'required',
            'loginName' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'password' => 'required',
        ]);

        $fullName = $request->fullName;
        $email = $request->email;
        $telephone = $request->telephone;

        $userTable = $request->role;

        DB::insert("INSERT INTO $userTable (`fullname`, `email`, `telephone`) VALUES (?,?,?)", [$fullName, $email, $telephone]);

        $userId = DB::getPdo()->lastInsertId();

        $password = bcrypt($request->password);
        $role = $request->role;
        $loginName = $request->loginName;

        DB::insert("INSERT INTO logins (`userId`, `loginName`, `password`, `role`) VALUES (?,?,?,?)", [$userId, $loginName, $password, $role]);

        return view("logins.index")->with("success", "User has been Added !!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }

    public function verifyLogin(Request $request) {
        $request->validate([
            'loginName' => 'required',
            'password' => 'required',
        ]);

        $loginUser = Login::where("loginName", "=", $request->loginName)->first();
        if($loginUser){
            if (Hash::check($request->password, $loginUser->password)) {
                //token
                    $loginToken = Hash::make(time() . $loginUser->id);
                    $loginUser->token = $loginToken;
                    $loginUser->save();
                //session
                    Session::put('loginToken', $loginToken);
                    Session::put('loginRole', $loginUser->role);
                    
                //get user data
                    $userTable = $loginUser->role;
                    $userInfo = DB::select("SELECT * FROM $userTable WHERE id=?", [$loginUser->userId]);
                    
                    Session::put('userFullName', $userInfo[0]->fullName);
                    
                //redirect
                    //////////////// success login ////////////////////
                    return redirect('/user');
                    /////////////////////////////////////////////////
            }
            else{
                return redirect('/')
                            ->with('failed','Bad user name or password');
            }
        }
        else{
            return redirect('/')
                            ->with('failed','Bad user name or password');
        }

    }
}
