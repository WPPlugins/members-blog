<?php
class membersblog_actions extends wv48fv_action {
	private $excluded = array ();
	public function template_redirectWPaction() {
		global $wp_query;
		//var_dump(is_home());
		$home_allowed = (is_home() && $this->data()->options['public_home']);
		if (! is_user_logged_in () && !$home_allowed) //&& $current_blog->public == 0)
		{
			$url = explode ( '?', strtolower ( $_SERVER ['REQUEST_URI'] ) );
			$url = $url [0];
			if (! in_array ( $url, $this->excluded )) {
				if (is_feed ()) {
					$this->basic_auth();
				} // if
				else
				{
					$landing = $this->data()->options['landing'];
					$url = $this->data()->options['landings'][$landing];
					switch($landing)
					{
						case 'login':
							$url .= $_SERVER ['REQUEST_URI'];
						case 'home':
							$url = 	rtrim ( get_option ( 'siteurl' ), '/' ).$url;
							break;
						case 'other':
							$url = $this->data()->options['other'];
							break;
					}
					header ( 'Location: ' . $url );
					die ();
				}
			}
		}
	}
}
		