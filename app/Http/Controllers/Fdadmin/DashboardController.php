<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Form;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function getIndex()
    {
        return view('fdadmin.dashboard.index');
    }
}
