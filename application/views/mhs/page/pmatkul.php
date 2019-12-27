Silahkan pilih Matkul !<br>
Total SKS : 5<br>
Sisa SKS : <?=$user->kuota_sks;?><br>
<div class="ksleft">
	<?php 
		if($krs!=null){
	 ?>
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
				<a onclick="return confirm('Hapus KRS?')" href="<?=base_url('mhs/del_krs/'.$kr->id_krs.'/'.$kr->waktu.'/'.$kr->nim.'/'.$kr->sks)?>"><button>Hapus</button></a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
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
					<input type="hidden" name="sks" value="<?=$kel->sks;?>">
					<input type="hidden" name="id_kelas" value="<?=$kel->id_kelas;?>">
					<input type="hidden" name="waktu" value="<?=$waktu;?>">
					<button type="submit" <?php 
					foreach ($krs as $krk){
						if($kel->id_kelas==$krk->id_kelas || $kel->hari==$krk->hari && $kel->jam==$krk->jam){
					 ?>
					 disabled="disabled"
					 	<?php }} ?>
					 >Tambah</button>
			</td>
		</tr>
		<?php 
			foreach ($krs as $krk){
				if($kel->id_kelas==$krk->id_kelas || $kel->hari==$krk->hari && $kel->jam==$krk->jam){
		 ?>
		<tr>
			<td colspan="6">
				<?php foreach ($krs as $krt){ ?>
					<?php if($kel->id_kelas==$krt->id_kelas){ ?>
						Tabrakan dengan kelas <?=$kel->nama_matkul;?>
					<?php }else if($kel->hari==$krt->hari && $kel->jam==$krt->jam){ ?>
						Tabrakan dengan hari <?=$kel->hari;?> pada jam <?=$kel->jam;?>
					<?php } ?>
				<?php } ?>
			</td>
		</tr>
		<?php }} if($user->kuota_sks<$kel->sks){ ?>
			<tr style="border-top : 0.1px solid #FFF;"><td colspan="6">kurang</td></tr>
		<?php }} ?>
	</table>
	<?php } ?>