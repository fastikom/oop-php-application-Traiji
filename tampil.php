<?php
	include "class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbForum", '*', "idTopik=$_GET[id]");
	$hasil = $db->hasil();
?>
<table>
	<?php foreach($hasil as $komen){?>
	<tr>
		<td>hai</td><td> : </td>
		<td><?php echo $komen['pesan']; ?></td>
	</tr>
	<?php } ?>
</table>