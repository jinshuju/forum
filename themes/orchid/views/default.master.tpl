<!DOCTYPE html>
<html>
<head>
  {asset name='Head'}
</head>

<body id="{$BodyID}" class="{$BodyClass}">
<a href="https://github.com/chuck911/vanilla4china" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="http://vanillaforums.cn/themes/orchid/design/github.png" alt="Fork me on GitHub"></a>
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
			{asset name="Foot"}
    </div>
  </div>
</div>
{event name="AfterBody"}
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc2ffd5136ef2ac7f0803dbaa7de208a6' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>