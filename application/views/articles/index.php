<!-- 3. Pada VIEW, tiada lagi logic dan juga database query  --> 
<!-- kita hanya perlu gunakan sahaja data yang di hantar oleh Controller 
iaitu $article_records dan $current_pagetitle -->

<?php echo $current_pagetitle; ?> 

 <table>
 	<tr>
 		<td>Title</td>
 		<td>Date Posted</td>
 		<td>Category</td>
 	</tr>

 	<?php 

 	if (!empty($article_records)) {
 		
 		foreach ($article_records as $key => $row) {

 	 ?>

 	<tr>
 		<td>
 			<?php echo $row['title']; ?>
 		</td>
 		<td>
 			<?php echo $row['date_published']; ?>
 		</td>
 		<td>
 			<?php echo $row['category_name']; ?>
 		</td>
 	</tr>

 	<?php } } ?>
 	
 </table>