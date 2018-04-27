<?php

namespace App\Http\Middleware;

use Closure;

//Thư viện sử dụng lớp đăng nhập
use Illuminate\Support\Facades\Auth;

class AdminSecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->admin_user == 1)
                return $next($request);
            else
                return redirect('admin/dangnhap')->with('thongbao','Tài khoản của bạn không phải là Admin ^.^ &nbsp; Bạn không thể đăng nhập vào trang quản trị!!!');;
        }
        else 
            return redirect('admin/dangnhap');
    }
}
