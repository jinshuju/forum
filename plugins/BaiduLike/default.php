<?php if (!defined('APPLICATION')) exit();

$PluginInfo['BaiduLike'] = array(
	'Name' => 'BaiduLike',
	'Description' => 'Show Baidu-Like-Button after discussion',
	'Version' => '0.1a',
	'RequiredApplications' => array('Vanilla' => '2.0.18.4'),
	'RequiredTheme' => FALSE,
	'RequiredPlugins' => FALSE,
	'MobileFriendly' => TRUE,
	// 'SettingsUrl' => '/dashboard/settings/emoji',
	'SettingsPermission' => 'Garden.Settings.Manage',
	// 'HasLocale' => TRUE,
	'RegisterPermissions' => FALSE,
	'Author' => "chuck911",
	'AuthorEmail' => 'contact@with.cat',
	'AuthorUrl' => 'http://vanillaforums.cn/profile/chuck911'
);

class BaiduLikePlugin extends Gdn_Plugin {
	public function DiscussionController_BeforeDiscussionDisplay_Handler(&$Sender) {
		$View = $Sender->FetchView('baidulike','','plugins/BaiduLike');
		echo $View;
		// $Sender->AddCssFile('emoji.css', 'plugins/Emoji');
	}
	
	
	
	// public function CommentModel_BeforeSaveComment_Handler($Sender,$arg) {
	// 	$arg['FormPostValues']['Body'] = $this->Emojify($arg['FormPostValues']['Body']);
	// }
	// 
	// public function DiscussionModel_BeforeSaveDiscussion_Handler($Sender,$arg) {
	// 	$arg['FormPostValues']['Body'] = $this->Emojify($arg['FormPostValues']['Body']);
	// }
	// 
	// private function Emojify($data) {
	// 	$data = emoji_docomo_to_unified($data);   # DoCoMo devices
	//     $data = emoji_kddi_to_unified($data);     # KDDI & Au devices
	//     $data = emoji_softbank_to_unified($data); # Softbank & (iPhone) Apple devices
	//     $data = emoji_google_to_unified($data);   # Google Android devices
	// 	return emoji_unified_to_html($data);	
	// }
}
