<?php if (!defined('APPLICATION')) exit(); ?>

<div class="ProfileFields">
   <dl>
      <dt class="Roles"><?php echo T('Roles'); ?></dt>
      <dd class="Roles"><?php echo implode(', ', $this->Roles); ?></dd>
      <?php
      // Email
      if ($this->User->ShowEmail == 1 || $Session->CheckPermission('Garden.Registration.Manage')) {
         echo '<dt class="Email">'.T('Email').'</dt>
         <dd class="Email">'.Gdn_Format::Email($this->User->Email).'</dd>';
      }
      
      // Invited By
      if ($this->User->InviteUserID > 0) {
         $Inviter = new stdClass();
         $Inviter->UserID = $this->User->InviteUserID;
         $Inviter->Name = $this->User->InviteName;
         echo '<dt class="Invited">'.T('Invited by').'</dt>
         <dd class="Invited">'.UserAnchor($Inviter).'</dd>';
      }
      
      $this->FireEvent('AfterProfileFields'); ?>
   </dl>
</div>