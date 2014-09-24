<?php //dont include this file ?>
<?php if(false){ ?>



<?php 
/*
you can show four msgs using dialogs. basic, inline, big, big_inline
below is the sample code to use in your controller.
*/

		$mymsg1 = 'Something error.';

		// set a info message.
		$this->Session->setFlash($mymsg1, 'Dialogs/dialogs/basic', array('type'=>'error'), 'dialogs_basic');
		
		// set a info message.
		$this->Session->setFlash($mymsg1, 'Dialogs/dialogs/inline', array('type'=>'error'), 'dialogs_inline');
		
		// set a info message.
		$this->Session->setFlash($mymsg1, 'Dialogs/dialogs/big', array('type'=>'error'), 'dialogs_big');

		// set a info message.
		$this->Session->setFlash($mymsg1, 'Dialogs/dialogs/big_inline', array('type'=>'error'), 'dialogs_big_inline');

?> 

<?php // use these lines in view or elemet HTML where you want to show message.?>

<?php  echo $this->Session->flash('dialogs_basic'); ?>
<?php  echo $this->Session->flash('dialogs_inline'); ?>
<?php  echo $this->Session->flash('dialogs_big'); ?>
<?php  echo $this->Session->flash('dialogs_big_inline'); ?>      


<?php } ?>