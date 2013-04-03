<?php if (!defined('APPLICATION')) exit();

$PluginInfo['Floor'] = array(
	'Name' => 'Floor 楼层',
	'Description' => 'Show floor number in discussion',
	'Version' => '1.1.1',
	'RequiredApplications' => array('Vanilla' => '2.0.18.4'),
	'RequiredTheme' => FALSE,
	'RequiredPlugins' => FALSE,
	'MobileFriendly' => TRUE,
	'SettingsPermission' => 'Garden.Settings.Manage',
	'HasLocale' => TRUE,
	'RegisterPermissions' => FALSE,
	'Author' => "chuck911",
	'AuthorEmail' => 'contact@with.cat',
	'AuthorUrl' => 'http://vanillaforums.cn/profile/chuck911'
);

class FloorPlugin extends Gdn_Plugin {
	public function DiscussionController_DiscussionInfo_Handler($Sender) {
		if(C('Plugins.Floor.FirstFloor',true))
			$this->showFloorNumber(0);
	}

	public function DiscussionController_CommentInfo_Handler($Sender,$Args) {
		$number = $Args['CurrentOffset'];
		if($number<=0) return;
		$comment = $Args['Object'];
		$this->showFloorNumber($number,$comment->CommentID);
	}

	protected function showFloorNumber($number,$fragment = null)
	{
		echo ' <span class="MItem Floor">';
		if($fragment)
			echo '<a href="#Comment_'.$fragment.'">'.T('#'.$number).'</a>';
		else
			echo T('#'.$number);
		echo '</span>';
	}

	public function DiscussionController_Render_Before($Sender) {
		$Sender->AddCssFile('floor.css', 'plugins/Floor');
	}
}
