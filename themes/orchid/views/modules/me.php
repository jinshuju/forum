<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();
$User = $Session->User;
if ($Session->IsValid()):
   echo '<div class="MeBox">';
   echo UserPhoto($User);
   echo '<div class="WhoIs">';
      echo UserAnchor($User, 'Username');
      echo '<div class="MeMenu">';
         // Notifications
         $CountNotifications = $User->CountNotifications;
         $CNotifications = is_numeric($CountNotifications) && $CountNotifications > 0 ? '<span class="Alert">'.$CountNotifications.'</span>' : '';
         $ProfileSlug = urlencode($User->Name) == $User->Name ? $User->Name : $UserID.'/'.urlencode($User->Name);
         echo Anchor(Sprite('SpNotifications', 'Sprite16').Wrap(T('Notifications'), 'em').$CNotifications, '/profile/'.$ProfileSlug, array('title' => T('Notifications')));

         // Inbox
         $CountInbox = GetValue('CountUnreadConversations', Gdn::Session()->User);
         $CInbox = is_numeric($CountInbox) && $CountInbox > 0 ? ' <span class="Alert">'.$CountInbox.'</span>' : '';
         echo Anchor(Sprite('SpInbox', 'Sprite16').Wrap(T('Inbox'), 'em').$CInbox, '/messages/all', array('title' => T('Inbox')));

         // Bookmarks
         echo Anchor(Sprite('SpBookmarks', 'Sprite16').Wrap(T('Bookmarks'), 'em'), '/discussions/bookmarked', array('title' => T('Bookmarks')));

         // Dashboard
         if ($Session->CheckPermission('Garden.Settings.Manage'))
            echo Anchor(Sprite('SpDashboard', 'Sprite16').Wrap(T('Dashboard'), 'em'), '/dashboard/settings', array('title' => T('Dashboard')));

         // Sign Out
         echo Anchor(Sprite('SpSignOut', 'Sprite16').Wrap(T('Sign Out'), 'em'), SignOutUrl(), array('title' => T('Sign Out')));

      echo '</div>';
   echo '</div>';
   echo '</div>';
endif;