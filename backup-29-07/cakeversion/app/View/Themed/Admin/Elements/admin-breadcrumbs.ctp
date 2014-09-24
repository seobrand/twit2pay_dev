<?php 
	
	 
$pageName = (isset($pageName)) ? $pageName : 'home';
//Add Bread curmbs
echo $this->Html->addCrumb('Home', '/admin/dashboard');
switch($pageName) {
	case 'home' :
		break;
	case 'ProjectCategories' :
		echo $this->Html->addCrumb('Project Category List', '');
		break;
}	


if($this->Html->getCrumbs(' > ','Home')) {
	   echo '<div class="home_link">';
	   echo $this->Html->getCrumbs(' > ','');
	   echo '</div>';
	 }			 			
?>
<br/>
