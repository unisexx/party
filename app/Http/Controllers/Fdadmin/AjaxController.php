<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class AjaxController extends Controller
{

	public function getChangestatus()
	{
        $statusArray = array("true"=>"public", "false"=>"draft");
        $status = $statusArray[$_GET['status']];
		DB::table($_GET['table'])
            ->where('id', $_GET['id'])
            ->update(['status' => $status]);
	}

}
