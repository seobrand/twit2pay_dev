<?php  echo $this->Session->flash('top_right'); ?>
<?php  echo $this->Session->flash('top_left'); ?>
<?php  echo $this->Session->flash('bottom_right'); ?>
<?php  echo $this->Session->flash('bottom_left'); ?>

<?php if(false){ ?>

<?php 
/*
you can show three msgs using notification. top, bottom and target
below is the sample code to use iot in your controller.
*/
		$mymsg1 = 'Something info.';
		$mymsg2 = ' -- Something error.';
		$mymsg3 = ' -- Something success.';

		// set a info message.
		$this->Session->setFlash($mymsg1, 'Dialogs/enotify/growl/top_right', array('type'=>'info'), 'top_right');
		// set a error message.
		$this->Session->setFlash($mymsg2, 'Dialogs/enotify/growl/top_left', array('type'=>'error'), 'top_left');
		// set a success message.
		$this->Session->setFlash($mymsg3, 'Dialogs/enotify/growl/bottom_right', array('type'=>'success'), 'bottom_right');
		// set a success message.
		$this->Session->setFlash($mymsg3, 'Dialogs/enotify/growl/bottom_left', array('type'=>'success'), 'bottom_left');
?>       
<?php } ?>