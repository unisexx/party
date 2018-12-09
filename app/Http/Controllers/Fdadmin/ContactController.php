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

	public function getIndex()
	{

		// ตรวจสอบ permission
        ChkPerm('contact-view');

		$data['rs'] = new Contact;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.contact.index', $data);
	}

	public function getForm($id = null)
	{

		// ตรวจสอบ permission
		ChkPerm('contact-add', 'contact', $id);

		$data['rs'] = Contact::find($id);
		return view('fdadmin.contact.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{

		// ตรวจสอบ permission
		ChkPerm('contact-add', 'contact', $id);

		$this->validate($rq, [
			'name_th' => 'required',
			'name_en' => 'required',
			'address_th' => 'required',
			'address_en' => 'required',
        ], [
			'name_th.required' => 'ชื่อ (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'name_en.required' => 'ชื่อ (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
			'address_th.required' => 'ที่อยู่ (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'address_en.required' => 'ที่อยู่ (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
        ]);

		$model = $id ? Contact::find($id) : new Contact;
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/contact/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('contact-delete', 'contact');

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
