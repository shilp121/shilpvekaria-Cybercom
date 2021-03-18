<table width="100%" border="1px">
	<tbody>
		<tr>
			<td colspan="2">
				<?php echo $header =$this->createBlock('Block\Core\Layout\Header')->toHtml();?>	
			</td>
		</tr>
		<tr>
			<td  width="200px" height="500px">	
				<?php echo $tab = $this->getChild('left')->toHtml();?>	
			</td>
			<td>
				<?php echo $content =$this->getchild('content')->toHtml();?>	
			</td>
		</tr>
			
		</tr>	
	</tbody>
</table>