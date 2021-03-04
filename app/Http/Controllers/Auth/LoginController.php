<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
    public function memberLogin(Request $request)
    {
        $params = $request->all();

        return Users::memberLogins($params, $request->method(), $request);
    }

    public function memberRegister(Request $request)
    {
        $params = $request->all();
        $params['name'] = $params['name'];
        $params['email'] = $params['email'];
        $params['phone'] = $params['phone'];
        //$params['address'] = $params['address'];
        $params['password'] = $params['password'];
        
        return Users::createOrUpdate($params, $request->method(), $request);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
