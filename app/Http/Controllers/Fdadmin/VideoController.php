<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Video;

use Form;
use DB;
use Auth;
use Image;

class VideoController extends Controller
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

		$data['rs'] = new Video;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.video.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$data['rs'] = Video::find($id);
		return view('fdadmin.video.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$this->validate($rq, [
			'title_th' => 'required',
			'title_en' => 'required',
			'youtube'  => 'required',
			// 'Video_type_id' => 'required',
			// 'description_th' => 'required',
			// 'description_en' => 'required',
        ], [
			'title_th.required' => 'หัวข้อ (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'title_en.required' => 'หัวข้อ (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
			'youtube.required'  => 'ลิ้งค์วิดีโอ youtube ห้ามเป็นค่าว่าง',
			// 'Video_type_id.required' => 'หมวดหมู่ ห้ามเป็นค่าว่าง',
			// 'description_th.required' => 'รายละเอียด (ภาษาไทย) ห้ามเป็นค่าว่าง',
			// 'description_en.required' => 'รายละเอียด (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง'
        ]);

		// Save
		$model = $id ? Video::find($id) : new Video;
		// upload รูป
		if ($rq->hasFile('imgUpload')) {
			$image = $rq->file('imgUpload');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('uploads/video/' . $filename);
			Image::make($image->getRealPath())->resize(640, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path); // resize width 640 height aspectRatio.
			$model->image = $filename;
		}
		$model->slug = generateUniqueSlug($rq->input('title'));
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/video/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		if ($rs = Video::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/video/index');
	}

	public function getView($id)
	{
		$data['rs'] = Video::find($id);
		return view('fdadmin.video.view', $data);
	}

}
