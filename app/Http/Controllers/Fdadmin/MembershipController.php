<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Membership;

use Form;
use DB;
use Auth;
use Image;

class MembershipController extends Controller
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
        ChkPerm('membership-view');

		$data['rs'] = new Membership;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.membership.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// ตรวจสอบ permission
		ChkPerm('membership-add', 'membership', $id);

		$data['rs'] = Membership::find($id);
		return view('fdadmin.membership.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{

		// ตรวจสอบ permission
		ChkPerm('membership-add', 'membership', $id);

		$this->validate($rq, [
			'name' => 'required',
			'birthdate' => 'required',
			'age' => 'required',
			'nationality' => 'required',
			'religion' => 'required',
			'birth_province' => 'required',
			'idcard' => 'required',
			'issue_date' => 'required',
			'expired_date' => 'required',
			'card_location' => 'required',
			'card_province' => 'required',
			'marital_status' => 'required',
			'child_number' => 'required',
			'couple_name' => 'required',
        ], [
			'name.required' => 'ชื่อ - นามสกุล ห้ามเป็นค่าว่าง',
			'birthdate.required' => 'เกิดวันที่ ห้ามเป็นค่าว่าง',
			'age.required' => 'อายุ ห้ามเป็นค่าว่าง',
			'nationality.required' => 'สัญชาติ ห้ามเป็นค่าว่าง',
			'religion.required' => 'ศาสนา ห้ามเป็นค่าว่าง',
			'birth_province.required' => 'จังหวัดที่เกิด ห้ามเป็นค่าว่าง',
			'idcard.required' => 'เลขประจำตัวประชาชน ห้ามเป็นค่าว่าง',
			'issue_date.required' => 'วันที่ออกบัตร ห้ามเป็นค่าว่าง',
			'expired_date.required' => 'วันหมดอายุ ห้ามเป็นค่าว่าง',
			'card_location.required' => 'ออกให้ที่ (เขต/อำเภอ) ห้ามเป็นค่าว่าง',
			'card_province.required' => 'จังหวัด ห้ามเป็นค่าว่าง',
			'marital_status.required' => 'สถานภาพ ห้ามเป็นค่าว่าง',
			'child_number.required' => 'จำนวนบุตร ห้ามเป็นค่าว่าง',
			'couple_name.required' => 'ชื่อคู่สมรส ห้ามเป็นค่าว่าง',
		]);
		
		// Save
		$model = $id ? Membership::find($id) : new Membership;

		// upload ไฟล์แนบ 1
		if (@$rq->hasFile('filUpload_1')) {
			$file = $rq->file('filUpload_1');
			$filename = uniqid().'.'.$file->guessClientExtension();

			if($file->move('uploads/membership', $filename)) {
				$model->file_path_1 = $filename; // upload title
			}
		}

		// upload ไฟล์แนบ 2
		if (@$rq->hasFile('filUpload_2')) {
			$file = $rq->file('filUpload_2');
			$filename = uniqid().'.'.$file->guessClientExtension();

			if($file->move('uploads/membership', $filename)) {
				$model->file_path_2 = $filename; // upload title
			}
		}

		// upload ไฟล์แนบ 3
		if (@$rq->hasFile('filUpload_3')) {
			$file = $rq->file('filUpload_3');
			$filename = uniqid().'.'.$file->guessClientExtension();

			if($file->move('uploads/membership', $filename)) {
				$model->file_path_3 = $filename; // upload title
			}
		}

		// upload ไฟล์แนบ 4
		if (@$rq->hasFile('filUpload_4')) {
			$file = $rq->file('filUpload_4');
			$filename = uniqid().'.'.$file->guessClientExtension();

			if($file->move('uploads/membership', $filename)) {
				$model->file_path_4 = $filename; // upload title
			}
		}

		// upload ไฟล์แนบ 5
		if (@$rq->hasFile('filUpload_5')) {
			$file = $rq->file('filUpload_5');
			$filename = uniqid().'.'.$file->guessClientExtension();

			if($file->move('uploads/membership', $filename)) {
				$model->file_path_5 = $filename; // upload title
			}
		}

		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/membership/index');
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		// ตรวจสอบ permission
		ChkPerm('membership-delete', 'membership');

		if ($rs = Membership::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/membership/index');
	}

	public function getView($id)
	{
		$data['rs'] = Membership::find($id);
		return view('fdadmin.membership.view', $data);
	}

	public function getFiledownload($id,$field_name,$file_name){
		$rs = Membership::find($id);
		return downloadFile('uploads/membership',$rs->{$field_name}, $rs->name.'_'.$file_name);
	}

}
