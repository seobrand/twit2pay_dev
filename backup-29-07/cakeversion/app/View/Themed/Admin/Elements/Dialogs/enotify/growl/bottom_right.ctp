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
			case 'info': 
				$className = 'growl-white'; 
				$title = 'Information! ';
				break;			
			case 'msg':
				$className = 'growl-white'; 
				$title = 'Message! ';
				break;
			case 'success':
				$className = 'growl-white'; 
				$title = 'Success! ';
				break;
			case 'warning':
				$className = 'growl-white'; 
				$title = 'Success! ';
				break;
			case 'error':
				$className = 'growl-white'; 
				$title = 'Error! ';
				break;
			default:
				$className = 'growl-white'; 
				$title = 'Information! ';
				break;
		}
	}else{
		$className = 'growl-white'; 
	}

	
	/* 	This is the position of the growl. You can choose from 4 different positions, right-top, right-bottom,
		left-top, left-bottom.
	
	'postion'=>'right-top'
	'postion'=>'right-bottom'
	'postion'=>'left-top'
	'postion'=>'left-bottom'
	
	*/
	if(!isset($position)){
		$position = 'right-bottom';
	}
			
	
	/*	Show a growl with a delay. if you want to delay your msg then put time here in ms.
		
		'delay'=>'1000' // it will give a delay of 1000 ms = 1s
	*/
	if(!isset($delay)){
		$delay = 0;
	}	
	
	/*	This is the time that a growl is visible. if you set this then you have to set 'sticky'=>'false' by default it is true.
		
		'time'=>'3000'
		'sticky'=>'false'
	*/
	if(!isset($time)){
		$time = 2500;
	}
	
	/*	This is the speed of the of the effect or animation speed.
		
		'spped'=>'500'
	*/
	if(!isset($speed)){
		$speed = 500;
	}
	
	/*	animation effect. all posible jquery effects.
		
		'effect'=>'slide'
		'effect'=>'fade'
	
	*/
	if(!isset($effect)){
		$effect = 'fade';
	}
	
	
	/*	You can set a growl to sticky mode, this means the growl wont be removed after xxx seconds.
		
		'sticky'=>'true'
		'sticky'=>'false'
	
	*/
	if(!isset($sticky)){
		$sticky = 'true';
	}
	
	/*	Allow users to remove the growl. (add event handeler to close button)
		
		'closable'=>'true'
		'closable'=>'false'
	
	*/
	if(!isset($closable)){
		$closable = 'true';
	}
	
	/*	You can set per growl the number of open growls per placeholder(position).
		
		'maxOpen'=>'10'
		'maxOpen'=>'3'
	
	*/
	if(!isset($maxOpen)){
		$maxOpen = 5;
	}
	
	/*	This is an optional image. The size of the image is 40 x 40.
		
		'image'=>'image name'		
	
	*/
	if(!isset($image)){
		$image = '';
	}
	
	
	 	
	
?>

<script type="text/javascript">
	/**
	 * Name        : eNotify
	 * Description : Notification plugin
	 * File Name   : e_notify.js
	 * Plugin Url  :  
	 * Version     : 1.0	
	 * Updated     : --/--/---
	 * Dependency  :
	 * Developer   : Mark
	**/		
	/* Sticky */
	$(document).ready(function(){
		 $.e_notify.growl({
			 title: '<?php echo $title; ?>',
			 text: '<?php echo $message; ?>',
			 <?php if($image !== ''){?>
			 image: '<?php echo $this->webroot?>img/<?php echo $image; ?>',
			 <?php } ?>
			 position: '<?php echo $position; ?>',
			 delay: <?php echo $delay; ?>,
			 time: <?php echo $time; ?>,
			 speed: <?php echo $speed; ?>,
			 effect: '<?php echo $effect; ?>',
			 sticky: <?php echo $sticky; ?>,
			 closable: <?php echo $closable; ?>,
			 maxOpen: <?php echo $maxOpen; ?>,
			 className:'<?php echo $className; ?>',
			 onShow: function(){},
			 onHide: function(){}
		});	
		
	});
	
</script>