<?php

namespace App\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class WebController
 * @package App\Web
 */
class WebController extends Controller
{

    public static $users = null;

    /**
     * @var Request $request
     */
    public static $request;

    public function __construct(Request $request){

        WebController::$request = $request;
        if($request->session()->exists(\Config::get('web.session'))){
            WebController::$users = $request->session()->get(\Config::get('web.session'));
        }
    }
}
