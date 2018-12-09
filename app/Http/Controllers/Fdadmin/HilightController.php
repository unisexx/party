<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Hilight;

use Form;
use DB;
use Auth;
use Image;

class HilightController extends Controller
{

	public function getIndex()
	{
		// ตรวจสอบ permission
        ChkPerm('hilight-view');

		$data['rs'] = new Hilight;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.hilight.index', $data);
	}

	public function getForm($id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('hilight-add', 'hilight', $id);
		
		$data['rs'] = Hilight::find($id);
		return view('fdadmin.hilight.form', $data);
	}

	public function postSave(Request $rq, $id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('hilight-add', 'hilight', $id);
		
		$this->validate($rq, [
			'title' => 'required',
        ], [
			'title.required' => 'หัวข้อ ห้ามเป็นค่าว่าง',
        ]);

		// Save
		$model = $id ? Hilight::find($id) : new Hilight;
		// upload รูป
		if ($rq->hasFile('imgUpload')) {
			$image = $rq->file('imgUpload');
			$filename  = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('uploads/hilight/' . $filename);
			// Image::make($image->getRealPath())->resize(1310, 384)->save($path);
			Image::make($image->getRealPath())->resize(1920, 800)->save($path);
			$model->image = $filename;
		}
		$model->slug = generateUniqueSlug($rq->input('title'));
		$model->fill($rq->all());
		$model->save();

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/hilight/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		// ตรวจสอบ permission
		ChkPerm('hilight-delete', 'hilight');
		
		if ($rs = Hilight::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/hilight/index');
	}

	public function getView($id)
	{
		$data['rs'] = Hilight::find($id);
		return view('fdadmin.hilight.view', $data);
	}

}
