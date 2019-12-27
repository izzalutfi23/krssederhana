KRS Sementara <br><br>
<table class="ikrs" border="1">
	<tr>
		<th>No</th>
		<th>Matkul</th>
		<th>Kelompok</th>
		<th>Jam</th>
		<th>Hari</th>
	</tr>
	<?php 
	$no=1;
	foreach ($krs as $kr) {
		?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=$kr->nama_matkul;?></td>
			<td><?=$kr->id_kelas;?></td>
			<td><?=$kr->jam;?></td>
			<td><?=$kr->hari;?></td>
		</tr>
	<?php } ?>
</table>