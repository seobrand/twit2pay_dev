<?php
$userGroupId=$this->Session->read('UserAuth.User.user_group_id');

foreach($actions as $title => $action)
{ 

if($title=='Edit')
{

if($common->isUserGroupAccesss($actions['Edit']['urls']['controller'],$actions['Edit']['urls']['action'],$userGroupId))
{
	?>
        <a class="button-icon tip-s" href="<?php echo $action['url'] ?>" original-title="Edit">
            <span class="pencil-10 plix-10"></span>
        </a>
	<?php
}
}elseif($title=='Delete')
{
	if($actions['Delete']['urls']['controller']=='Ve0ndors')
	{
		$actions['Delete']['urls']['controller']='Vendors';
		$action['url']=str_replace('Ve0ndors','Vendors',$action['url']);
	}
	if($common->isUserGroupAccesss($actions['Delete']['urls']['controller'],$actions['Delete']['urls']['action'],$userGroupId))
	{
	
		if(isset($action['options']['onclick']) && $action['options']['onclick']!='')
			$alertmsg="onclick=\"".$action['options']['onclick'].'"';
		else
			$alertmsg="onclick=\"return confirm('Are you sure you want to delete? Delete it your own risk');\"";
		?>
			 <a class="button-icon tip-s" <?php echo $alertmsg; ?> href="<?php echo $action['url']; ?>" original-title="Delete">
			<span class="trashcan-10 plix-10"></span>
			</a>
	<?php
	}

}elseif($title=='View')
{

	if($common->isUserGroupAccesss($actions['View']['urls']['controller'],$actions['View']['urls']['action'],$userGroupId))
	{
?>
	<a class="button-icon tip-s ajax cboxElement" href="<?php echo $action['url'] ?>" >
<span class="note-16 plix-16"></span>
</a>
	<?php
	
	}
   
}else
{
	 if ( isset($action['options']['type']) and $action['options']['type'] == 'postLink') {
        unset( $action['options']['type']);
   	    echo $this->Form->postLink($title, $action['url'], $action['options'] + array('class' => 'button-icon tip-s ajax cboxElement pencil-10 plix-10'));

    }else
    {
        echo $this->Html->link($title, $action['url'], $action['options'] + array('class' => 'button-icon tip-s ajax cboxElement pencil-10 plix-10')); 
    }
}
}
?>