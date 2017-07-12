<?php
class membersblog_dashboard extends wv48fv_action {
	public function commonWPmenuMeta($return) {
		$return ['menu'] = 'Settings';
		$return ['slug'] = $this->application ()->slug;
		$return ['title'] = $this->application ()->name;
		return $return;
	}
	public function settingsActionMeta($return) {
		$return ['link_name'] = $return ['title'];
		$return ['classes'] [] = 'v48fv_16x16_settings';
		$return ['priority'] = - 1;
		return $return;
	}
	public function settingsAction()
	{
		$this->view->options = $this->data()->post('options');
		$this->view->column_count=2;
		$this->view->title = $this->help('settings')->render('Settings');
		$this->view->rows[] = $this->render_script('settings/row1.phtml');
		$this->view->rows[] = $this->render_script('settings/row2.phtml');
		return $this->render_table();
	}
}
		