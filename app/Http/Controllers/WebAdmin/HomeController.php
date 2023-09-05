<?php

namespace App\Http\Controllers\WebAdmin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        parent::__construct();
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     const backendTemplate = [
        'template' => [
            'path_name' => '%PATH_NAME%',
        ],
    ];

    public function index()
    {
        $backendTemplate = static::backendTemplate;
        $backendTemplate['template']['path_name'] = str_replace('%PATH_NAME%', $this->backendTemplate['template']['path_name'], $backendTemplate['template']['path_name']);
        return view($backendTemplate['template']['path_name'].'.home')->with('backendTemplate', $backendTemplate);
    }
}
