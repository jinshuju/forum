<?php if (!defined('APPLICATION')) exit();

class OrchidThemeHooks extends Gdn_Plugin {	
	public function Base_AfterJsCdns_Handler($Sender,$Args){
		$Args['Cdns'] = array('jquery.js' => 'http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.2.min.js');
	}
}

if (!function_exists('UserPhotoDefaultUrl')) {
   function UserPhotoDefaultUrl($User) {
      return Url('/themes/orchid/design/default-avatar.jpg',TRUE);
   }
}