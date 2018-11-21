<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Download;

use DB;
use SEO;
use SEOMeta;
use Session;
use OpenGraph;


class DownloadController extends Controller
{
	public function getIndex()
	{
		// SEO
		SEO::setTitle('เอกสารดาวน์โหลด');
		SEO::setDescription('ดาวน์โหลดเอกสารเกี่ยวกับพรรคประชารัฐ');

		$data['rs'] = new Download;
		$data['rs'] = $data['rs']->where('status','public')->orderBy('updated_at', 'desc')->paginate(30);
		return view('download.index', $data);
	}

	public function getFiledownload($id){
		$rs = Download::find($id);
		return downloadFile('uploads/doc',$rs->file_path, $rs->title);
	}
}
