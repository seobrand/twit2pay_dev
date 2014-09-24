 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%">
	<tr>
    	<td align="center">
			<table width="900px">
                <tr>
                    <td align="center">
                         <?php echo $this->fetch('content'); ?>
                             <?php echo $this->element('sql_dump'); ?> 
                    </td>
                    
                </tr>
            </table>        
        </td>
    </tr>
</table>
</body>
</html>
<?php echo $this->fetch('content'); ?>
<?php echo $this->element('sql_dump'); ?> 