<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Membership;

use DB;
use SEO;
use SEOMeta;
use Session;
use OpenGraph;


class MembershipController extends Controller
{
	public function getForm()
	{
		// SEO
		SEO::setTitle('สมัครสมาชิกพรรค');
		SEO::setDescription('แบบฟอร์มสมัครสมาชิกพรรคพลังประชารัฐ');

		return view('membership.form');
	}

	public function postSave(Request $rq)
	{
		// Save
		$model = new Membership;

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
		return Redirect('membership/success');
	}

	public function getSuccess()
	{
		echo "success";
		// return view('membership.form');
	}
}
