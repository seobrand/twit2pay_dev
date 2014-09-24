<?php
$directory = realpath(dirname(__FILE__)).'/'; // path to joomla installation
define( '_JEXEC', 1 );
define( 'JPATH_BASE', $directory);
define( 'DS', '/' );

require_once ( JPATH_BASE .DS . 'configuration.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

require_once ( JPATH_BASE .DS.'libraries'.DS.'joomla'.DS.'factory.php' );
require_once ( JPATH_BASE .DS.'libraries'.DS.'TwitterAPIExchange.php' );

class customFunctions {
	function __construct(){
	  $this->db =& JFactory::getDBO();
	}
	public function virtueProducts($hash){
		 
		 $sql = "select vp.virtuemart_product_id, vp.product_sku, vp.product_in_stock, vpp.product_price, vpe.product_desc, vpe.product_name from bhovt_virtuemart_products vp 
		 JOIN bhovt_virtuemart_product_prices vpp ON vp.virtuemart_product_id = vpp.virtuemart_product_id
		 JOIN bhovt_virtuemart_products_en_gb vpe ON vp.virtuemart_product_id = vpe.virtuemart_product_id
		 where vp.published = 1 and vp.product_sku = '$hash'";
	 
		 $this->db->setQuery($sql);
		 $this->db->query();
		 $pro = $this->db->loadObject();
		 return $pro;
	}
	
	public function getHash(){
		 $sql = "select vp.virtuemart_product_id, vp.product_sku, vp.product_in_stock, vpp.product_price, vpe.product_desc, vpe.product_name from bhovt_virtuemart_products vp 
		 JOIN bhovt_virtuemart_product_prices vpp ON vp.virtuemart_product_id = vpp.virtuemart_product_id
		 JOIN bhovt_virtuemart_products_en_gb vpe ON vp.virtuemart_product_id = vpe.virtuemart_product_id
		 where vp.published = 1";
		 $this->db->setQuery($sql);
		 $this->db->query();
		 $hash = $this->db->loadObjectList();
		 return $hash;
	}
	
	public function getCustomValues($proId, $cusId){
	    $sql = "select `custom_value` from `bhovt_virtuemart_product_customfields` where `virtuemart_custom_id` = '$cusId' and `virtuemart_product_id` = '$proId'";
		 $this->db->setQuery($sql);
		 $this->db->query();
		 $cnt = $this->db->getNumRows();
		 if($cnt == 0 || $cnt == ''){
            $sql = "select `custom_value` from `bhovt_virtuemart_customs` where `virtuemart_custom_id` = '$cusId'";
		 }
		 $this->db->setQuery($sql);
		 $this->db->query();
		 $tran_comment = $this->db->loadObject();
		 return $tran_comment;
	}

}
/*$virtue = new customFunctions();

$proInfo =  $virtue->virtueProducts('#tshirt');
print_r($proInfo);

$hash = $virtue->getHash();
print_r($hash);*/
?>