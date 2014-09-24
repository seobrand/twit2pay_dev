<?php if($twitter_details == 1) { ?>
<script type="text/javascript">
<!--
window.close();
//-->
</script>
<?php } else{ ?>
<center>
	<span>Unable to get profile details. Please try again</span><br>
	<span>this window will close automatically in 5 seconds.</span>
</center>
<script type="text/javascript">
<!--
setTimeout(function(){
    self.close();
},5000);
//-->
</script>
<?php }?>