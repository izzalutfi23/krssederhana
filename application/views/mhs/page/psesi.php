Silahkan pilih sesi kuliah !<br>
<?php 
	foreach ($waktu as $w => $row) {
 ?>
<a href="<?=base_url('mhs/pmatkul/'.$row->waktu);?>"><button class="menu-jam"><?=$row->waktu;?></button></a>
<?php } ?>
<br><a href="<?=base_url('login/logout');?>">Logout</a>