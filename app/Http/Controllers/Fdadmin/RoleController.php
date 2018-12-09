<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Perm;

use Form;
use DB;
use Auth;

class RoleController extends Controller
{
	public function getIndex()
	{
		// ตรวจสอบ permission
		ChkPerm('role-view');
		
		$data['rs'] = new Role;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.role.index', $data);
	}

	public function getForm($id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('role-add', 'role', $id);

		$data['role'] = Role::find($id);
		$id ? $data['pm'] = $data['role']->permissions()->pluck('id')->toArray() : '';
        $data['perms'] = Perm::where('parent_id', 0)->orderBy('pos')->get();
		return view('fdadmin.role.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('role-add', 'role', $id);

		$this->validate($rq, [
			'name' => 'required',
        ], [
			'name.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
        ]);

		// Save
		$role = $id ? Role::find($id) : new Role;
        $role->name = $rq->name;
		$role->save();
		
		DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

        if ($rq->pm) {
            foreach ($rq->pm as $key => $value) {
                $role->revokePermissionTo($value);
            }

            $role->givePermissionTo($rq->pm);
        }

        $chk_data = Role::find($role->id);


		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/role/index');
		return redirect()->back();
	}

	public function getDelete($id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('role-delete', 'role');

		if ($rs = Role::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/role/index');
	}

	public function getView($id)
	{
		$data['rs'] = Role::find($id);
		return view('fdadmin.role.view', $data);
	}

}
