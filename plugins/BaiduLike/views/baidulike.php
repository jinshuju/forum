<!-- 将此标记放在您希望显示like按钮的位置 -->
<div style="float:right;margin: 8px 8px 0 0;">
<div class="bdlikebutton"></div>	
</div>

<script id="bdlike_shell"></script>
<script>
var bdShare_config = {
	"type":"medium",
	"color":"red",
	"uid":"677623",
	"likeText":"对我有帮助",
	"likedText":"已顶过"
};
$(function(){
	document.getElementById("bdlike_shell").src="http://bdimg.share.baidu.com/static/js/like_shell.js?t=" + Math.ceil(new Date()/3600000);
});
</script>