<?php
class AssetController {
	
	static function js($script) {
		return js('js/'.$script); 
	}
	
	static function css($css) {
		return css('css/'.$css); 
	}

}

