<?php 
	/*
	5 types of masseges are suported now.. 
	'type'=>'info'
	'type'=>'msg'
	'type'=>'success'
	'type'=>'warning'
	'type'=>'error'
	*/
	//echo $type;
	if(isset($type)){
		switch($type){
			case 'info': $className = 'notification-info'; break;
			case 'msg':$className = 'notification-msg'; break;
			case 'success':$className = 'notification-success'; break;
			case 'warning':$className = 'notification-warning'; break;
			case 'error':$className = 'notification-error'; echo'asdfasd fsdf asdfr asdfasdfasd fdsfasd fsdf sfd'; break;
			default:$className = 'notification-info'; break;
		}
	}else{
		$className = 'notification-info'; 
	}

	/*
	'postion'=>'top'
	'postion'=>'bottom'
	
	if(!isset($position)){
		$position = 'top';
	}*/
		
	/*
	you can target your msg using this property to anywhere in the html.
	'target'=>'jquery selector'
	if no value given then it will be taken as body
	'target'=>'body'
	
	if(!isset($target)){
		$target = '';
	}*/
	
	/*
	if you want to delay your msg then put time here in ms.
	'delay'=>'1000' // it will give a delay of 1000 ms = 1s
	*/
	if(!isset($delay)){
		$delay = 0;
	}	
	
	/*
	'time'=>'3000'
	'sticky'=>'false'
	*/
	if(!isset($time)){
		$time = 2500;
	}
	
	/*
	animation speed
	'spped'=>'500'
	*/
	if(!isset($speed)){
		$speed = 500;
	}
	
	/*
	animation effect. all posible jquery effects.
	'effect'=>'slide'
	*/
	if(!isset($effect)){
		$effect = 'slide';
	}
	
	
	/*
	'time'=>'3000'
	'sticky'=>'false'
	*/
	if(!isset($sticky)){
		$sticky = 'true';
	}
	
	/*
	add a close button.
	'closable'=>'true'
	*/
	if(!isset($closable)){
		$closable = 'true';
	}
	
?>




<script type="text/javascript">
$(document).ready(function(){
	$.e_notify.notification({
		 text: '<?php echo $message; ?>',
		 position: 'bottom',
		 target: '',
		 delay: <?php echo $delay; ?>,
		 time: <?php echo $time; ?>,
		 speed: <?php echo $speed; ?>,
		 effect: '<?php echo $effect; ?>',
		 sticky: <?php echo $sticky; ?>,
		 closable: <?php echo $closable; ?>,
		 className:'<?php echo $className; ?>',
		 onShow: function(){},
		 onHide: function(){}
	});
});
/*
You can style the notification by using a custom classname. We have already made the custom classes: notification-success, notification-warning, notification-info, notification-error, notification-msg, notification-success-widget, notification-warning-widget, notification-info-widget, notification-error-widget, notification-msg-widget. Notifications do have a default class. 

positions, top, bottom.
*/
</script>
