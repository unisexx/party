<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Page;

use Form;
use DB;
use Auth;

class PageController extends Controller
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
        ChkPerm('page-view');

		$data['rs'] = new Page;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.page.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$data['rs'] = Page::find($id);
		return view('fdadmin.page.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// $rq->merge([
		// 	'slug' => generateUniqueSlug($rq->input('title'))
		// ]);

		$this->validate($rq, [
			'title_th' => 'required',
			'title_en' => 'required',
			'description_th' => 'required',
			'description_en' => 'required'
        ], [
			'title_th.required' => 'หัวข้อ(ภาษาไทย) ห้ามเป็นค่าว่าง',
			'title_en.required' => 'หัวข้อ(ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
			'description_th.required' => 'รายละเอียด(ภาษาไทย) ห้ามเป็นค่าว่าง',
			'description_en.required' => 'รายละเอียด(ภาษาอังกฤษ) ห้ามเป็นค่าว่าง'
        ]);
		
		// Save
		$model = $id ? Page::find($id) : new Page;
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		// return Redirect('fdadmin/page/index');
		return redirect()->back();
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		if ($rs = Page::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/page/index');
	}

	public function getView($id)
	{
		$data['rs'] = Page::find($id);
		return view('fdadmin.page.view', $data);
	}

}
