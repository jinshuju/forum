<!DOCTYPE html>
<html>
<head>
  {asset name='Head'}
</head>
<body id="{$BodyID}" class="{$BodyClass}">
  <div id="Frame">
	 <div class="Banner">
		<ul>
		  {home_link}
		  {profile_link}
		  {inbox_link}
		  {custom_menu}
		  {event name="BeforeSignInLink"}
		  {if !$User.SignedIn}
			 <li class="SignInItem">{link path="signin" class="SignIn"}</li>
		  {/if}
		</ul>
	 </div>
	 <div id="Body">
       <div class="BreadcrumbsWrapper">
         {breadcrumbs homelink="0"}
       </div>
		<div id="Content">
		  {asset name="Content"}
		</div>
	 </div>
	 <div id="Foot">
		<div class="FootMenu">
        {nomobile_link wrap="span"}
		  {dashboard_link wrap="span"}
		  {signinout_link wrap="span"}
		</div>
      <a class="PoweredByVanilla" href="{vanillaurl}"><span>Powered by Vanilla</span></a>
		{asset name="Foot"}
	 </div>
  </div>
{event name="AfterBody"}
</body>
</html>
