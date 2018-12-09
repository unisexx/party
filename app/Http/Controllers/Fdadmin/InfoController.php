<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Info;

use Form;
use DB;
use Auth;
use Image;

class InfoController extends Controller
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

		// ตรวจสอบ permission
        ChkPerm('info-view');

		$data['rs'] = new Info;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.info.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// ตรวจสอบ permission
		ChkPerm('info-add', 'info', $id);

		$data['rs'] = Info::find($id);
		return view('fdadmin.info.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// ตรวจสอบ permission
		ChkPerm('info-add', 'info', $id);

		$this->validate($rq, [
			'title_th' => 'required',
			'title_en' => 'required',
			'info_type_id' => 'required',
			'description_th' => 'required',
			'description_en' => 'required',
        ], [
			'title_th.required' => 'หัวข้อ (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'title_en.required' => 'หัวข้อ (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
			'info_type_id.required' => 'หมวดหมู่ ห้ามเป็นค่าว่าง',
			'description_th.required' => 'รายละเอียด (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'description_en.required' => 'รายละเอียด (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง'
        ]);

		// Save
		$model = $id ? Info::find($id) : new Info;
		// upload รูป
		if ($rq->hasFile('imgUpload')) {
			$image = $rq->file('imgUpload');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('uploads/info/' . $filename);
			Image::make($image->getRealPath())->resize(600, 400)->save($path);
			$model->image = $filename;
		}
		$model->slug = generateUniqueSlug($rq->input('title'));
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/info/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// ตรวจสอบ permission
		ChkPerm('info-delete', 'info');

		if ($rs = Info::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/info/index');
	}

	public function getView($id)
	{
		$data['rs'] = Info::find($id);
		return view('fdadmin.info.view', $data);
	}

}
