<?php
if (!function_exists('clean_url')) {
	function clean_url($text)
	{
		setlocale(LC_ALL, "Thai");
		$text = strtolower($text);
		$code_entities_match = array(' ', '--', '&quot;', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '{', '}', '|', ':', '"', '<', '>', '?', '[', ']', '\\', ';', "'", ',', '.', '/', '*', '+', '~', '`', '=');
		$code_entities_replace = array('-', '-', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
		$text = str_replace($code_entities_match, $code_entities_replace, $text);
		$text = @ereg_replace('(--)+', '', $text);
		$text = @ereg_replace('(-)$', '', $text);
		return $text;
	}
}

if (!function_exists('generateUniqueSlug')) {
	function generateUniqueSlug($title)
	{
		//and here you put all your logic that solve the problem
		$temp = clean_url($title, '-');
		if (!App\Models\Page::all()->where('slug', $temp)->isEmpty()) {
			$i = 1;
			$newslug = $temp . '-' . $i;
			while (!App\Models\Page::all()->where('slug', $newslug)->isEmpty()) {
				$i++;
				$newslug = $temp . '-' . $i;
			}
			$temp = $newslug;
		}
		return $temp;
	}
}

if (!function_exists('getUrlFromText')) {
	function getUrlFromText($text)
	{
		// $text = 'width: 122px; height: 140px; background-image:url(https://stickershop.line-scdn.net/stickershop/v1/sticker/2428/android/sticker.png;compress=true); background-size: 122px 140px;';
		preg_match('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $text, $matches);
		// print_r($matches);
		return $matches[0];
	}
}

if (!function_exists('deleteDuplicate')) {
	function deleteDuplicate()
	{
		DB::unprepared('delete n1 
        from
            stickers n1,
            stickers n2 
        where
            n1.id > n2.id 
            and n1.sticker_code = n2.sticker_code');
	}
}

// remove tag เพื่อตัดคำ
if (!function_exists('remove_tag')) {
	function remove_tag($str2)
	{
		$simple_search = array( 
			'/\[author\](.*?)\[\/author\]/is',
			'/\[h\](.*?)\[\/h\]/is',   
			'/\[b\](.*?)\[\/b\]/is',                                 
			'/\[i\](.*?)\[\/i\]/is',                                 
			'/\[u\](.*?)\[\/u\]/is',
			'/\[url=(.*?)\](.*?)\[\/url\]/is',
			'/\[img\](.*?)\[\/img\]/is',
			'/\[video\](.*?)\[\/video\]/is'
		); 
		$simple_replace = array( 
			'$1', 
			'$1', 
			'$1', 
			'$1', 
			'$1',
			'$2',
			'',
			''
		); 
		$str2 = preg_replace ($simple_search, $simple_replace, $str2); 
		$str2 = strip_tags($str2);
		// $this->str = $str2;
		return $str2;
	}
}

// ตัดคำแล้วเติมจุด
if (!function_exists('cuttext')) {
	function cuttext($str,$ncut,$minword = 50)
	{
		$str = remove_tag($str);
		$sub = '';
		$len = 0;
		foreach (explode(' ', $str) as $word)
		{
			$part = (($sub != '') ? ' ' : '') . $word;
			$sub .= $part;
			$len += strlen($part);
		   
			if (strlen($word) > $minword && strlen($sub) >= $ncut)
			{
				break;
			}
		}
	   
		return $sub . (($len < strlen($str)) ? '...' : '');
	}
}

// convert youtube link to embed code
function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		// "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
		"//www.youtube.com/embed/$2",
        $string
    );
}

if(!function_exists('ChkPerm')) {
	function ChkPerm($prem_name, $url_redirect = 'fdadmin/dashboard', $id = null) {

		if (is_numeric($id)) {
			$prem_name = str_replace('-add', '-edit', $prem_name);
		}
		// dd($prem_name);
		if (!Auth::user()->can($prem_name)) {
			set_notify('error', trans('message.errorNoaccess'));
			Redirect::to($url_redirect)->send();
		}
	}
}
