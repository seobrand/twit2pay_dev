<?php  echo $this->Session->flash('notification_top'); ?>
<?php  echo $this->Session->flash('notification_bottom'); ?>
<?php  echo $this->Session->flash('notification_target'); ?>

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
		$this->Session->setFlash($mymsg1, 'Dialogs/enotify/notification/top', array('type'=>'info'), 'notification_top');
		// set a error message.
		$this->Session->setFlash($mymsg2, 'Dialogs/enotify/notification/bottom', array('type'=>'error'), 'notification_bottom');
		// set a success message.
		$this->Session->setFlash($mymsg3, 'Dialogs/enotify/notification/target', array('type'=>'success','target'=>'#logo'), 'notification_target');
?>       
<?php } ?>