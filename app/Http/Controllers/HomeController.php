<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Info;

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
        $data['info'] = $data['info']->where('info_type_id',1)->orderBy('id', 'desc')->take(6)->get();

        // ข่าวสารจากสาขาพรรค
        $data['info_sub'] = new Info;
        $data['info_sub'] = $data['info_sub']->where('info_type_id',2)->orderBy('id', 'desc')->take(3)->get();

        // ข่าวสารจากสาขาพรรค
        $data['info_youth'] = new Info;
        $data['info_youth'] = $data['info_youth']->where('info_type_id',3)->orderBy('id', 'desc')->take(6)->get();
        
        return view('home',$data);
    }

}
