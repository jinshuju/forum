<?php if (!defined('APPLICATION')) exit();

$PluginInfo['BaiduLike'] = array(
	'Name' => 'BaiduLike',
	'Description' => 'Show Baidu-Like-Button after discussion',
	'Version' => '0.1a',
	'RequiredApplications' => array('Vanilla' => '2.0.18.4'),
	'RequiredTheme' => FALSE,
	'RequiredPlugins' => FALSE,
	'MobileFriendly' => TRUE,
	// 'SettingsUrl' => '/dashboard/settings/baidulike',
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
	}
}
