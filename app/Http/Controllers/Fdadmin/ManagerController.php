<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Manager;

use Form;
use DB;
use Auth;
use Image;

class ManagerController extends Controller
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

		$data['rs'] = new Manager;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.manager.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$data['rs'] = Manager::find($id);
		return view('fdadmin.manager.form', $data);
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
			'person_type_id' => 'required',
			'description_th' => 'required',
			'description_en' => 'required',
        ], [
			'title_th.required' => 'ชื่อ (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'title_en.required' => 'ชื่อ (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
			'person_type_id.required' => 'ตำแหน่ง ห้ามเป็นค่าว่าง',
			'description_th.required' => 'ประวัติ (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'description_en.required' => 'ประวัติ (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง'
        ]);

		// Save
		$model = $id ? Manager::find($id) : new Manager;
		// upload รูป
		if ($rq->hasFile('imgUpload')) {
			$image = $rq->file('imgUpload');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('uploads/manager/' . $filename);
			Image::make($image->getRealPath())->resize(600, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path); // resize width 600 height aspectRatio.
			$model->image = $filename;
		}
		$model->slug = generateUniqueSlug($rq->input('title'));
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/manager/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		if ($rs = Manager::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/manager/index');
	}

	public function getView($id)
	{
		$data['rs'] = Manager::find($id);
		return view('fdadmin.manager.view', $data);
	}

}
