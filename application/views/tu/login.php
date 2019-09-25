<!DOCTYPE html>
<html>
<head>
	<title><?=$judul;?></title>
</head>
<body>
	<?=form_open('tu/auth');?>
		<table>
			<tr>
				<td>NIM</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	<?=form_close();?>
</body>
</html>