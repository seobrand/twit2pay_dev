<!--<table id="datatable-1">-->
<table class="clean-table" id="clean-table">
	<thead>
		<?php echo $headers ?>
	</thead>

	<tbody>
		<?php echo $results ?>
	</tbody>
         <tfoot>
                                            	<tr>
                                                	<td colspan="10">
   <div class="left">  
    <?php if($this->Paginator->numbers()){?>
    <div id="paging" class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
     | 	<?php echo $this->Paginator->numbers();?>
 |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));
		
		?>
    </div>
    <?php } ?>
    </div>
   
     <div class="right"><?php if(isset($totalRecords)) echo $totalRecords;   ?> records in the database</div>
                                                    </td>
                                                </tr>
                                            </tfoot>
</table>
