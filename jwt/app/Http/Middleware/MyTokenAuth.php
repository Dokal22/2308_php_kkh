<?php

namespace App\Http\Middleware;

use App\Http\Utils\TokenUtil;
use Closure;
use Illuminate\Http\Request;

class MyTokenAuth // 여기서 자식 받지 않아서 public 할거임
{
    protected $tokenDI;

    public function __construct(TokenUtil $tokenUtil)
    {
        $this->tokenDI = $tokenUtil;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 토큰 => authorization: Bearer dfaoiuaspdf27dszldkfhu
        // $request->bearerToken(): 자동으로 앞의 Bearer 잘라줌
        $this->tokenDI->chkToken($request->bearerToken()); 

        return $next($request);
    }
}
