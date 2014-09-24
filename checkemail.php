<?php
$directory = realpath(dirname(__FILE__)).'/'; // path to joomla installation
define( '_JEXEC', 1 );
define( 'JPATH_BASE', $directory);
define( 'DS', '/' );

require_once ( JPATH_BASE .DS . 'configuration.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

require_once ( JPATH_BASE .DS.'libraries'.DS.'joomla'.DS.'factory.php' );

$email	=	$_REQUEST['email'];

$db =& JFactory::getDBO();
$qu = "SELECT id FROM #__users where `email` = '$email'";
$db->setQuery($qu);
$db->query();
$userId = $db->getNumRows();

if($userId != ''){
	echo 'exist';
}
?>