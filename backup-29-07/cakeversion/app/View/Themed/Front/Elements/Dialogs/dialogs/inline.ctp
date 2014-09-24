<?php if(isset($message) && $message != '') { ?>
<?php 
	/*
	4 types of dialogs are suported now.. 
	'dtype'=>'basic'
	'dtype'=>'inline'
	'dtype'=>'big'
	'dtype'=>'big_inline'
	*/
	//echo $dtype;
	if(isset($dtype)){
		switch($dtype){
			case 'basic': $className = 'dialog'; break;
			case 'inline':$className = 'dialog-inline'; break;
			case 'big':$className = 'dialog-big'; break;
			case 'big_inline':$className = 'dialog-big-inline'; break;			
			default:$className = 'dialog-inline'; break;
		}
	}else{
		$className = 'dialog-inline'; 
	}
	
	
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
			case 'info': $className2 = 'info'; break;
			case 'msg':$className2 = 'msg'; break;
			case 'success':$className2 = 'success'; break;
			case 'warning':$className2 = '-warning'; break;
			case 'error':$className2 = 'error'; break;
			default:$className2 = 'info'; break;
		}
	}else{
		$className2 = 'info'; 
	}
	
	
	
	/*
	7 types of custome color masseges are suported now.. 
	'ctype'=>'red'
	'ctype'=>'green'
	'ctype'=>'orange'
	'ctype'=>'blue'
	'ctype'=>'purple'
	'ctype'=>'black'
	'ctype'=>'grey'
	
	*/
	//echo $ctype;
	if(isset($ctype)){
		switch($ctype){
			case 'red': $className2 = 'custom-red'; break;
			case 'green':$className2 = 'custom-green'; break;
			case 'orange':$className2 = 'custom-orange'; break;
			case 'blue':$className2 = 'custom-blue'; break;
			case 'purple':$className2 = 'custom-purple'; break;
			case 'grey':$className2 = 'custom-grey'; break;
			case 'black':$className2 = 'custom-black'; break;
			default:$className2 = 'custom-grey'; break;
		}
	}
	

/*
Available class 		Element 	Desctription 				Since
dialog 					div 			Main dialog class 		1.0
dialog-inline 			div 			Main inline dialog class 	1.0
dialog-big 				div 			Main big dialog class 	1.0
dialog-big-inline 		div 			Main big inline dialog class 	1.0
warning 				div 			Type of dialogs, these are used for the basic colors 	1.0
info 						div 			Type of dialogs, these are used for the basic colors 	1.0
message 				div 			Type of dialogs, these are used for the basic colors 	1.0
error 					div 			Type of dialogs, these are used for the basic colors 	1.0
success 				div 			Type of dialogs, these are used for the basic colors 	1.0
custom-red 			div 			Custom color: red 	1.0
custom-green 		div 			Custom color: green 	1.0
custom-orange 		div 			Custom color: orange 	1.0
custom-blue 			div 			Custom color: blue 	1.0
custom-purple 		div 			Custom color: purple 	1.0
custom-black 			div 			Custom color: black 	1.0
custom-grey 			div 			Custom color: grey 	1.0
*/



?>	





<div class="<?php echo $className . ' ' . $className2; ?>">          
    <p><?php echo $message; ?></p>
    <span>x</span>
</div>

<?php } ?>