<?php 

// logic to show page name

if ($isset($_GET['page']) && ($_GET['page']=='bloglist')) {
	$current_pagetitle = 'Blog List';
	echo $current_pagetitle;
}

$sql = "select * from blog";
$query = mysql_query($sql);
$result = mysql_fetch_array($query);

 ?>

 <table>
 	<tr>
 		<td>Title</td>
 		<td>Date Posted</td>
 		<td>Category</td>
 	</tr>

 	<?php while($row = mysql_fetch_array($result)){ ?>
 	
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
 	<?php } ?>
 </table>