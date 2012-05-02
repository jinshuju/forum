<?php
class Chn_MentionsFormatter {
public static function GetMentions($String) {
  // This one grabs mentions that start at the beginning of $String
  preg_match_all(
		'/(?:^|[\s,\.])@([\S]{1,20})(?=[\s,\.!?]|$)/i',
     $String,
     $Matches
  );
  if (count($Matches) > 1) {
     $Result = array_unique($Matches[1]);
     return $Result;
  }
  return array();
}
public static function FormatMentions($Mixed) {
		if(C('Garden.Format.Mentions')) {
		    $Mixed = preg_replace(
						'/(^|[\s,\.])@([\S]{1,20})(?=[\s,\.!?]|$)/i',
		        '\1'.Anchor('@\2', '/profile/\\2'),
		       $Mixed
		    );
		}
		
		if(C('Garden.Format.Hashtags')) {
			$Mixed = preg_replace(
				// '/(^|[\s,\.>])\#([\w\-]+)(?=[\s,\.!?]|$)/i',
				'/(^|[\s,\.])\#([\S]{1,30}?)#/i',
				'\1'.Anchor('#\2#', '/search?Search=%23\2%23&Mode=like').'\3',
				$Mixed
			);
		}

    return $Mixed;
 }
}
Gdn::FactoryInstall('MentionsFormatter', 'Chn_MentionsFormatter', NULL, Gdn::FactoryInstance);

function CountString($Number, $Url = '', $Options = array()) {
   if (is_string($Options))
      $Options = array('cssclass' => $Options);
   $Options = array_change_key_case($Options);
   $CssClass = GetValue('cssclass', $Options, '');
	if ($Number === NULL) $Number = 0;
   if ($Number) {
      $Result = " <span class=\"Count\">$Number</span>";
   } else {
      $Result = '';
   }
   return $Result;
}