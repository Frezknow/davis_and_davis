<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
class Controller extends BaseController
{
  protected $user;

 public function __construct() {
   //Below basically construct $this->user from Auth array after login
     $this->middleware(function ($request, $next) {
        $this->user= auth()->user();
        return $next($request);
     });
 }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
