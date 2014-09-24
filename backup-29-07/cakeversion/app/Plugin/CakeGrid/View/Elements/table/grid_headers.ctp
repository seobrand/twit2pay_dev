
<tr>
	<?php foreach($headers as $header): ?>
    <?php $width = (isset( $header['options']['width'] ))?  'width="'.$header['options']['width'].'"' : "" ;?>
    <?php $width = (isset( $header['options']['width'] ))?  'width="'.$header['options']['width'].'"' : "" ;?>
    <?php
		

		$header['valuePath'] = substr( $header['valuePath'],1);
	    $header['valuePath'] = str_replace('/','.',$header['valuePath']);
		 ?>
   <?php
   		
		
       $temp = explode('.',$header['valuePath']);
       $isSortable = false; 
       if ( ( count($temp) == 2 ) and ( isset($this->request->params['paging'][$temp[0]] ) )){
        $isSortable = true;
        }
      if ($isSortable):  
    ?>
	<th <?php echo $width ?> scope="col" ><?php echo $header['title'] == 'Actions' ? 'Actions' :  $this->Paginator->sort($header['valuePath'],$header['title']) ?></th>
    <?php else: ?>
	<th <?php echo $width ?> scope="col" ><?php echo $header['title'] == 'Actions' ? 'Actions' : $header['title'] ?></th>
    <?php endif; ?>
	<?php endforeach; ?>
</tr>

                                              
                                           