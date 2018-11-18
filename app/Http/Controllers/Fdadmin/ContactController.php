<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Contact;

use Form;
use DB;
use Auth;
use Image;

class ContactController extends Controller
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

		$data['rs'] = new Contact;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.contact.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$data['rs'] = Contact::find($id);
		return view('fdadmin.contact.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$this->validate($rq, [
			'name' => 'name',
			'address' => 'required'
        ], [
			'name.required' => 'ชื่อ ห้ามเป็นค่าว่าง',
			'address.required' => 'ที่อยู่ ห้ามเป็นค่าว่าง'
        ]);

		$model = $id ? Contact::find($id) : new Contact;
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		// return Redirect('fdadmin/contact/index');
		return redirect()->back();
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		if ($rs = Contact::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/contact/index');
	}

	public function getView($id)
	{
		$data['rs'] = Contact::find($id);
		return view('fdadmin.contact.view', $data);
	}

}
