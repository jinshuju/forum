<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();
if (Gdn::Config('Garden.Profile.ShowAbout')) {
?>
<div class="Box About">
   <h4><?php echo T('UserStatistics', 'Member Stats'); ?></h4>
   <dl>
      <dt class="Joined"><?php echo T('Joined'); ?></dt>
      <dd class="Joined"><?php echo Gdn_Format::Date($this->User->DateFirstVisit); ?></dd>
      <dt class="LastActive"><?php echo T('Last Active'); ?></dt>
      <dd class="LastActive"><?php echo Gdn_Format::Date($this->User->DateLastActive); ?></dd>
      <dt class="Visits"><?php echo T('Visits'); ?></dt>
      <dd class="Visits"><?php echo number_format($this->User->CountVisits); ?></dd>
      
      <?php if ($Session->CheckPermission('Garden.Moderation.Manage')): ?>
      <dt class="IP"><?php echo T('Register IP'); ?></dt>
      <dd class="IP"><?php 
         $IP = IPAnchor($this->User->InsertIPAddress);
         echo $IP ? $IP : T('n/a');
      ?></dd>
      <dt class="IP"><?php echo T('Last IP'); ?></dt>
      <dd class="IP"><?php
         $IP = IPAnchor($this->User->LastIPAddress);
         echo $IP ? $IP : T('n/a');
      ?></dd>
      <?php endif; ?>
      
      <?php $this->FireEvent('OnBasicInfo'); ?>
   </dl>
</div>
<?php
}