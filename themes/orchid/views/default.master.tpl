<!DOCTYPE html>
<html>
<head>
  {asset name='Head'}
</head>

<body id="{$BodyID}" class="{$BodyClass}">
<a href="https://github.com/chuck911/vanilla4china"><img style="position: absolute; top: 0; left: 0; border: 0;" src="http://vanillaforums.cn/themes/orchid/design/github.png" alt="Fork me on GitHub"></a>
<div id="Frame">
 <div id="Head">
   <div class="Row">
     <strong class="SiteTitle"><a href="{link path="/"}">{logo}</a></strong>
     <ul class="SiteMenu">
      {dashboard_link}
      {discussions_link}
      {activity_link}
      {inbox_link}
      {custom_menu}
      {profile_link}
      {signinout_link}
     </ul>
     <div class="SiteSearch">{searchbox}</div>
   </div>
  </div>
  <div id="Body">
    <div class="Row">
      <!-- <div class="BreadcrumbsWrapper P">{breadcrumbs}</div> -->
      <div class="Column PanelColumn" id="Panel">
         {module name="MeModule"}
         {asset name="Panel"}
      </div>
      <div class="Column ContentColumn" id="Content">{asset name="Content"}</div>
    </div>
  </div>
  <div id="Foot">
    <div class="Row">
      powered by <a href="http://vanillaforums.org/">vanilla forums</a>
    </div>
  </div>
</div>
{event name="AfterBody"}
</body>
</html>