Silahkan pilih Matkul !<br>
Total SKS : 22<br>
Sisa SKS : 3<br>
<div class="ksleft">
	<table class="ikrs" border="1">
		<tr>
			<th>No</th>
			<th>Matkul</th>
			<th>Kelompok</th>
			<th>Jam</th>
			<th>Hari</th>
			<th>Aksi</th>
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
			<td>
				<a href="#"><button>Hapus</button></a>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>
<div class="ksright">
	<?=form_open('mhs/cari');?>
		<?php if($kelas==null){ ?>
			<input type="hidden" name="waktu" value="<?=$this->uri->segment('3');?>">
		<?php }else{ ?>
			<input type="hidden" name="waktu" value="<?=$waktu;?>">
		<?php } ?>
		<select name="id_matkul">
			<option value="#">Pilih</option>
			<?php 
				foreach ($matkul as $m => $row) {
			 ?>
			<option value="<?=$row->id_matkul;?>"><?=$row->nama_matkul;?> [<?=$row->sks;?>]</option>
			<?php } ?>
		</select>
		<input type="submit" name="search" value="Cari">
	<?=form_close();?>
</div>
<div style="clear: both;">
	<?php 
		if($kelas!=null){
	 ?>
	<b>Pilih hari : </b><br><br>
	<table class="ikrs" border="1">
		<tr>
			<th>No</th>
			<th>Matkul</th>
			<th>Kelompok</th>
			<th>Jam</th>
			<th>Hari</th>
			<th>Aksi</th>
		</tr>
		<?php 
			$no=1;
			foreach ($kelas as $kel) {
		 ?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=$kel->nama_matkul;?></td>
			<td><?=$kel->id_kelas;?></td>
			<td><?=$kel->jam;?></td>
			<td><?=$kel->hari;?></td>
			<td>
				<?=form_open('mhs/add_krs');?>
					<input type="hidden" name="nim" value="<?=$user->nim;?>">
					<input type="hidden" name="id_kelas" value="<?=$kel->id_kelas;?>">
					<input type="hidden" name="waktu" value="<?=$waktu;?>">
					<input type="submit" name="add" value="Tambah">
				<?=form_close();?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>