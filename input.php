<?php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>入力画面</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<form action="uploading_process.php" method="post">
<table>
	<tr>
		<td>楽曲ファイル</td>
		<td><input type="file" name="musicFile"></td>
	</tr>

	<tr>
		<td>ジャケット</td>
		<td><input type="file" name="artWork"></td>
	</tr>

	<tr>
		<td>アルバム名</td>
		<td><input type="text" name="album"></td>
	</tr>

	<tr>
		<td>楽曲名</td>
		<td><input type="text" name="musicName"></td>
	</tr>

	<tr>
		<td>ジャンル</td>
		<td>
			<select name="genre">
				<option value="01">サンプル1</option>
				<option value="02">サンプル2</option>
				<option value="03">サンプル3</option>
			</select>
		</td>

	<tr>
		<td>価格</td>
		<td><input type="text" name="price"></td>
	</tr>

	<tr>
		<td>歌詞</td>
		<td><textarea name="lyrics"></textarea></td>
	</tr>
</table>
<input type="submit" value="アップロード">
</form>
</body>
</html>