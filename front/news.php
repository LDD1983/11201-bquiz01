<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<?php include "marquee.php";?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->

	<?php 
		$News->moreNews(); //顯示更多消息的列表
	?>
	<div style="text-align:center;">
		<!--顯示分頁連結-->
		<?=$News->links();?>
	</div>
</div>