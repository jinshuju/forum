<?php if (!defined('APPLICATION')) exit();

$PluginInfo['Floor'] = array(
	'Name' => 'Floor 楼层',
	'Description' => 'Show floor number in discussion',
	'Version' => '0.1a',
	'RequiredApplications' => array('Vanilla' => '2.0.18.4'),
	'RequiredTheme' => FALSE,
	'RequiredPlugins' => FALSE,
	'MobileFriendly' => TRUE,
	// 'SettingsUrl' => '/dashboard/settings/baidulike',
	'SettingsPermission' => 'Garden.Settings.Manage',
	'HasLocale' => TRUE,
	'RegisterPermissions' => FALSE,
	'Author' => "chuck911",
	'AuthorEmail' => 'contact@with.cat',
	'AuthorUrl' => 'http://vanillaforums.cn/profile/chuck911'
);

class FloorPlugin extends Gdn_Plugin {
	public $number = 1;

	public function DiscussionController_DiscussionInfo_Handler($Sender) {
		if(C('Plugins.Floor.FirstFloor',true))
			$this->showFloorNumber();
		else
			$this->number++;
	}

	public function DiscussionController_CommentInfo_Handler($Sender,$Args) {
		$comment = $Args['Object'];
		$this->showFloorNumber($comment->CommentID);
	}

	protected function showFloorNumber($fragment = null)
	{
		echo ' <span class="MItem Floor">';
		if($fragment)
			echo '<a href="#Comment_'.$fragment.'">'.T('#'.$this->number++).'</a>';
		else
			echo T('#'.$this->number++);
		echo '</span>';
	}

	public function DiscussionController_Render_Before(&$Sender) {
		$Sender->AddCssFile('floor.css', 'plugins/Floor');
	}
}
