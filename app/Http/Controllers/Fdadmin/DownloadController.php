<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Download;

use Form;
use DB;
use Auth;
use Image;

class DownloadController extends Controller
{
	// public function __construct()
    // {
    //     if(Auth::user()->level != 99){
	// 		set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
	// 		return back()->send();
	// 	}
	// }

	public function getIndex()
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$data['rs'] = new Download;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.download.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$data['rs'] = Download::find($id);
		return view('fdadmin.download.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// Save
		$model = $id ? Download::find($id) : new Download;
		// upload รูป
		if ($rq->hasFile('imgUpload')) {
			$image = $rq->file('imgUpload');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('uploads/' . $filename);
			Image::make($image->getRealPath())->resize(468, 249)->save($path);
			$model->image = $filename;
		}
		// upload ไฟล์แนบ
		if (@$rq->hasFile('fileUpload')) {
			$file = $rq->file('fileUpload');
			$filename = uniqid().'.'.$file->guessClientExtension();

			if($file->move('uploads/doc', $filename)) {
				$model->file_path = $filename; // upload title
				// $input['file_name'] = $file->getClientOriginalName(); // file name title
			}
		}
		$model->slug = generateUniqueSlug($rq->input('title'));
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/download/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		if ($rs = Download::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/download/index');
	}

	public function getView($id)
	{
		$data['rs'] = Download::find($id);
		return view('fdadmin.download.view', $data);
	}

	public function getFiledownload($id){
		$rs = Download::find($id);
		return downloadFile('uploads/doc',$rs->file_path, $rs->title);
	}

}
