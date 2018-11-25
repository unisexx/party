<?php
namespace App\Http\Controllers\Fdadmin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Gallery;
use App\Models\Gallery_pic;

use Form;
use DB;
use Auth;
use Image;

class GalleryController extends Controller
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

		$data['rs'] = new Gallery;
		$data['rs'] = $data['rs']->orderBy('id', 'desc')->get();
		return view('fdadmin.gallery.index', $data);
	}

	public function getForm($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		$data['rs'] = Gallery::find($id);
		return view('fdadmin.gallery.form', $data);
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
        ], [
			'title_th.required' => 'หัวข้อกิจกรรม (ภาษาไทย) ห้ามเป็นค่าว่าง',
			'title_en.required' => 'หัวข้อกิจกรรม (ภาษาอังกฤษ) ห้ามเป็นค่าว่าง',
		]);
		
		// Save Gallery
		$model = $id ? Gallery::find($id) : new Gallery;
		$model->slug = generateUniqueSlug($rq->input('title'));
		$model->fill($rq->all());
		$model->save();

		// -- clear old file.
        $except_id = array();
        foreach($rq->attach_imgs_id as $i) {
            if(!empty($i)) { $except_id[] = $i; }
        }
        foreach($model->attach_imgs()->whereNotIn('id',$except_id)->get() as $i) {
            if($i->file_path && file_exists($i->getPath())) {
                unlink($i->getPath());
            }
        }
		$model->attach_imgs()->whereNotIn('id',$except_id)->delete();
		
		// Save Gallery-Pic
		foreach($rq->attach_imgs_id as $k => $i) {
            $model_imgs = empty($rq->attach_imgs_id[$k])?new Gallery_pic:Gallery_pic::find($rq->attach_imgs_id[$k]);
            $model_imgs->fill([
                'gallery_id' => @$model->id, 
                // 'detail_th'  => @$rq->attach_imgs_detail_th[$k],
                // 'detail_en'  => @$rq->attach_imgs_detail_en[$k],
            ]);
            if(!empty($rq->attach_imgs_file[$k])) {
                // delete files
                if(!empty($model_imgs->file_path)) {
                    if(!empty($model_imgs->getPath()) && file_exists($model_imgs->getPath())) {
                        unlink($model_imgs->getPath());
                    }
                }
				
				// upload รูป
				$image = $rq->attach_imgs_file[$k];
				$filename  = genFilename($image->getClientOriginalName());
				$path = public_path('uploads/gallery/' . $filename);
				Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
					$constraint->aspectRatio();
				})->save($path); // resize width 600 height aspectRatio.
				$model_imgs->file_path = $filename;
				$model_imgs->file_name = $rq->attach_imgs_file[$k]->getClientOriginalName();

            }
            if(!empty($rq->attach_imgs_detail_th[$k]) || !empty($rq->attach_imgs_detail_th[$k]) || !empty($model_imgs->file_path)) {
                $model_imgs->save();
            }
        }

		set_notify('success', trans('message.completeSave'));
		return Redirect('fdadmin/gallery/index');
		// return redirect()->back();
	}

	public function getDelete($id = null)
	{
		//permission
		// if (Auth::user()->level != 99) {
		// 	set_notify('error', trans('คุณไม่มีสิทธิ์เข้าใช้งาน'));
		// 	return back()->send();
		// }

		if ($rs = Gallery::find($id)) {
			$rs->delete(); // Delete process
			set_notify('error', trans('message.completeDelete'));
		}
		return Redirect('fdadmin/gallery/index');
	}

	public function getView($id)
	{
		$data['rs'] = Gallery::find($id);
		return view('fdadmin.gallery.view', $data);
	}

}
