<center style="z-index: 99999;">
<?php if($_GET['cu']=='123qwe'):?>
<script type="text/javascript" src="/js/flowplayer-3.2.4.min.js"></script>
<a  
	 href="http://d.paunin.com:7777"  
	 style="display:block;width:520px;height:330px"  
	 id="player"> 
</a> 

<!-- this will install flowplayer inside previous A- tag. -->
<script>
	flowplayer("player", "/flash/flowplayer-3.2.5.swf");
</script>
<?php else:?>
What's up?
<?php endif;?>
</center>