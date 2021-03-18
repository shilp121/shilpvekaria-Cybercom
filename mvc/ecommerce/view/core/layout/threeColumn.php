<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/<?php //echo $_GET['a'] ?>.css"> -->
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/admin/js/jquery-3.6.0.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/admin/js/index.php'); ?>"></script>

</head>

<body>
	<table  width="100%">
		<tbody> 
			<tr>
				<td>
					<?php echo $header = $this->createBlock('Block\Core\Layout\Header')->toHtml();?>	
				</td>
			</tr>
			<tr>			
				<td>
					<?php echo $message =  $this->createBlock('Block\Core\Layout\Message')->toHtml();?>	
					<?php echo $content = $this->getchild('content')->toHtml();?>	
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $header = $this->createBlock('Block\Core\Layout\Footer')->toHtml();?>	
				</td>
			</tr>
		</tbody>
	</table>
</body>
</div>
</html>