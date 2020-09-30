<table border=1 width="100%">
	<tr>
		<th style="max-width: 50px">N</th>
		<th>Seller Email</th>
		<th>Product Image</th>
	</tr>
	<?php
		$i = 1;
		foreach($products as $product) {
			echo '<tr><td>' . $i++ . '</td><td>';
			
			echo $product->saler->email . '</td><td>';
			if(isset($product->images[0]))
			echo '<img src="/backend/web/upimages/' . $product->images[0]->path . '" style="max-width: 300px; max-height: 300px">';
			echo '</td></tr>';
		}
	?>
</table>