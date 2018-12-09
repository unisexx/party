<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Form;
use DB;
use Auth;
use Image;

class UserController extends Controller
{

	public function getIndex()
	{
		// ตรวจสอบ permission
		ChkPerm('user-view');
		
		$data['rs'] = new User;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.user.index', $data);
	}

	public function getForm($id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('user-add', 'user', $id);

		$data['rs'] = User::find($id);
		return view('fdadmin.user.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('user-add', 'user', $id);

		$this->validate($rq, [
			'role'     => 'required',
			'name'     => 'required',
			'email'    => 'required|email|unique:users,email,'.$id,
			'password' => 'required_if:edit,==,0|min:4|confirmed',    // ถ้าเป็นฟอร์มเพิ่ม ให้ required รหัสผ่าน แต่ถ้าเป็นแก้ไข ไม่ต้อง required
        ], [
			'role.required'        => 'สิทธิ์การใช้งาน ห้ามเป็นค่าว่าง',
			'name.required'        => 'ชื่อ ห้ามเป็นค่าว่าง',
			'email.required'       => 'อีเมล์ ห้ามเป็นค่าว่าง',
			'email.unique'         => 'อีเมล์นี้ไม่สามารถใช้ได้',
			'email.email'          => 'อีเมล์ ไม่ถูกต้อง',
			'password.required_if' => 'รหัสผ่าน ห้ามเป็นค่าว่าง',
			'password.confirmed'   => 'ยืนยันหรัสผ่านต้องตรงกับรหัสผ่าน',
			'password.min'         => 'รหัสผ่านความยาวอย่างน้อย 4 ตัวอักษร'
		]);

		// Save
		$model = $id ? User::find($id) : new User;
		// $model->fill($rq->all());
		$model->fill([
			'id'       => @$model->id,
			'name'     => @$rq->input('name'),
			'email'    => @$rq->input('email'),
			'status'   => @$rq->input('status'),
		]);

		// ถ้ามีการกรอกรหัสผ่าน ให้เพิ่มฟิล์ด์รหัสผ่านไปบันทึกด้วย
		if($rq->input('password')) {

			$model->fill([
				'password' => bcrypt($rq->input('password'))
			]);

		}
		
		$model->save();

		$user = User::find($model->id);
		// $user->assignRole($rq->input('role'));
		$user->syncRoles([$rq->input('role')]);

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/user/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('user-delete', 'user');

		if ($rs = User::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/user/index');
	}

	public function getView($id)
	{
		$data['rs'] = User::find($id);
		return view('fdadmin.user.view', $data);
	}

}
