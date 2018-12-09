<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Announce;

use Form;
use DB;
use Auth;
use Image;

class AnnounceController extends Controller
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
        ChkPerm('announce-view');

		$data['rs'] = new Announce;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.announce.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// ตรวจสอบ permission
		ChkPerm('announce-add', 'announce', $id);

		$data['rs'] = Announce::find($id);
		return view('fdadmin.announce.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// ตรวจสอบ permission
		ChkPerm('announce-add', 'announce', $id);

		$this->validate($rq, [
			'title_th' => 'required',
			'title_en' => 'required',
			'announce_type_id' => 'required',
			'description_th' => 'required',
			'description_en' => 'required',
        ], [
			'title_th.required' => 'หัวข้อ (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'title_en.required' => 'หัวข้อ (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
			'announce_type_id.required' => 'หมวดหมู่ ห้ามเป็นค่าว่าง',
			'description_th.required' => 'รายละเอียด (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'description_en.required' => 'รายละเอียด (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง'
        ]);

		// Save
		$model = $id ? Announce::find($id) : new Announce;
		// upload รูป
		if ($rq->hasFile('imgUpload')) {
			$image = $rq->file('imgUpload');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('uploads/announce/' . $filename);
			Image::make($image->getRealPath())->resize(468, 249)->save($path);
			$model->image = $filename;
		}
		$model->slug = generateUniqueSlug($rq->input('title'));
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/announce/index');
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
		ChkPerm('announce-delete', 'hilight');
		
		if ($rs = Announce::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/announce/index');
	}

	public function getView($id)
	{
		$data['rs'] = Announce::find($id);
		return view('fdadmin.announce.view', $data);
	}

}
