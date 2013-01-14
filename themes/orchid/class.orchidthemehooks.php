<?php if (!defined('APPLICATION')) exit();

class OrchidThemeHooks extends Gdn_Plugin {	
	public function Base_AfterJsCdns_Handler($Sender,$Args){
		$Args['Cdns'] = array('jquery.js' => 'http://lib.sinaapp.com/js/jquery/1.6.2/jquery.min.js');
	}
}

// if (!function_exists('UserPhotoDefaultUrl')) {
//    function UserPhotoDefaultUrl($User) {
//       return Url('/themes/orchid/design/default-avatar.jpg',TRUE);
//    }
// }