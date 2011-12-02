<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();

include($this->FetchViewLocation('profilefields'));

// Show activity?
if (C('Garden.Profile.ShowActivities', TRUE)) {
   if ($Session->IsValid() && CheckPermission('Garden.Profiles.Edit')) {
      $this->FireEvent('BeforeStatusForm');
      $HeadingText = $Session->UserID == $this->User->UserID ? 'What&rsquo;s going on?' : 'Leave a public comment';
      $ButtonText = $Session->UserID == $this->User->UserID ? 'Share' : 'Add Profile Comment';
      echo Wrap(T($HeadingText), 'h2', array('class' => 'ProfileActivityHeadline'));
      echo $this->Form->Open(array('action' => Url("/activity/post/{$this->User->UserID}?Target=".urlencode(UserUrl($this->User))), 'class' => 'Activity'));
      echo $this->Form->Errors();
      echo Wrap($this->Form->TextBox('Comment', array('MultiLine' => TRUE)), 'div', array('class' => 'TextBoxWrapper'));
      echo $this->Form->Button($ButtonText, array('id' => 'ProfileCommentSubmit'));
      echo $this->Form->Close();
   }
   
   // Include the activities
   include($this->FetchViewLocation('index', 'activity', 'dashboard'));
}