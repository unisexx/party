<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Info;
use App\Models\Announce_type;
use App\Models\Person_type;
use App\Models\Hilight;
use App\Models\Page;

use DB;
use SEO;
use SEOMeta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SEO::setTitle('รวมสติ๊กเกอร์ไลน์ขายดี แนะนำ ฮิตๆ ยอดนิยม');
        // SEO::setDescription('รวมสติ๊กเกอร์ไลน์ขายดี แนะนำ ฮิตๆ ยอดนิยม จากครีเอเทอร์');
        // SEO::opengraph()->setUrl(url()->current());
        // SEO::addImages('https://i.imgur.com/M1FvcTu.png');
        // SEO::twitter()->setSite('@line2me_th');
        // SEOMeta::setKeywords('line, sticker, theme, creator, animation, sound, popup, ไลน์, สติ๊กเกอร์, ธีม, ครีเอเทอร์, ดุ๊กดิ๊ก, มีเสียง, ป๊อปอัพ');
        // SEOMeta::addKeyword('line, sticker, theme, creator, animation, sound, popup, ไลน์, สติ๊กเกอร์, ธีม, ครีเอเทอร์, ดุ๊กดิ๊ก, มีเสียง, ป๊อปอัพ');

        // ข่าวสารพรรค
        $data['info'] = new Info;
        $data['info'] = $data['info']->where('info_type_id',1)->where('status','public')->orderBy('id', 'desc')->take(6)->get();

        // ข่าวสารจากสาขาพรรค
        $data['info_sub'] = new Info;
        $data['info_sub'] = $data['info_sub']->where('info_type_id',2)->where('status','public')->orderBy('id', 'desc')->take(3)->get();

        // ข่าวสารจากเยาวชนคนรุ่นใหม่
        $data['info_youth'] = new Info;
        $data['info_youth'] = $data['info_youth']->where('info_type_id',3)->where('status','public')->orderBy('id', 'desc')->take(6)->get();

        // หมวดหมู่ผู้บริการพรรค
        $data['person_type'] = new Person_type;
        $data['person_type'] = $data['person_type']->orderBy('id', 'asc')->get();

        // หมวดหมู่ประกาศพรรค
        $data['announce_type'] = new Announce_type;
        $data['announce_type'] = $data['announce_type']->orderBy('id', 'asc')->get();

        // ไฮไลท์รูปแบนเนอร์
        $data['hilight'] = new Hilight;
        $data['hilight'] = $data['hilight']->where('status', 'public')->orderBy('id', 'asc')->get();

        // เกี่ยวกับพรรค
        $data['page'] = new Page;
        $data['page'] = $data['page']->orderBy('id', 'asc')->get();
        
        return view('home',$data);
    }

}
