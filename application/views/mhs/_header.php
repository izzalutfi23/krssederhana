<!DOCTYPE html>
<html>
<head>
	<title><?=$judul;?></title>
	<style type="text/css">
		.menu-jam{
			padding: 10px;
			font-size: 15px;
			margin: 10px;
			display: inline-grid;
			cursor: pointer;
		}
		a{
			text-decoration: none;
		}
		.menu{
			padding: 0;
			margin: 0;
		}
		.menu li{
			padding: 7px;
			color: #FFF;
			border:1px solid#CCCACA;
			font-family: Arial Narrow;
			list-style: none;
			display: inline-grid;
			margin-left: 2px;
			color:#000;
		}
		.menu li:hover{
			background-color: #CCCACA;
			cursor: pointer;
		}
		.active-menu{
			background: #CCCACA;
			color: #FFF;
		}
		.ksleft{
			width: 35%;
			margin-top: 10px;
			margin-bottom: 20px;
			height: auto;
			float: left;
			padding-bottom: 15px;
			border-bottom: 1.5px solid#aaa;
		}
		.ksright{
			width: 20%;
			margin-top: 10px;
			margin-bottom: 10px;
			height: auto;
			float: left;
		}

		.ikrs{
			border-collapse: collapse;
		}
		.ikrs th,td{
			padding: 5px;
		}
		select[name="id_matkul"]{
			width: 80%;
			height: 30px;
			float: left;
		}
		input[name="search"]{
			margin-left: 2px;
			height: 30px;
		}
		.pkrs{
			border-collapse: collapse;
			float: left;
		}
	</style>
</head>
<body>
Selamat datang <b><?=$user->nama;?></b><br><br>
<ul class="menu">
	<a href="<?=base_url('mhs/sesi')?>"><li <?php if($this->uri->segment('2')=='pmatkul' || $this->uri->segment('2')=='sesi'){ ?>class="active-menu"<?php } ?>>Input/Edit KRS</li></a>
	<a href="<?=base_url('mhs/krssementara')?>"><li <?php if($this->uri->segment('2')=='krssementara'){ ?>class="active-menu"<?php } ?>>KRS Sementara</li></a>
	<a href="<?=base_url('login/logout')?>"><li>Logout</li></a>
</ul>
<hr>

