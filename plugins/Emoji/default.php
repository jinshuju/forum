<?php if (!defined('APPLICATION')) exit();

$PluginInfo['Emoji'] = array(
	'Name' => 'Emoji',
	'Description' => 'Show Emoji in discussions and comments',
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

class EmojiPlugin extends Gdn_Plugin {
	public function __construct() {
		require_once(dirname(__FILE__).'/emoji.php');
	}

	public function DiscussionController_Render_Before(&$Sender) {
		$Sender->AddCssFile('emoji.css', 'plugins/Emoji');
	}
	
	public function CommentModel_BeforeSaveComment_Handler($Sender,$arg) {
		$arg['FormPostValues']['Body'] = $this->Emojify($arg['FormPostValues']['Body']);
	}

	public function DiscussionModel_BeforeSaveDiscussion_Handler($Sender,$arg) {
		$arg['FormPostValues']['Body'] = $this->Emojify($arg['FormPostValues']['Body']);
	}

	private function Emojify($data) {
		$data = emoji_docomo_to_unified($data);   # DoCoMo devices
    $data = emoji_kddi_to_unified($data);     # KDDI & Au devices
    $data = emoji_softbank_to_unified($data); # Softbank & (iPhone) Apple devices
    $data = emoji_google_to_unified($data);   # Google Android devices
		return emoji_unified_to_html($data);	
	}
}
