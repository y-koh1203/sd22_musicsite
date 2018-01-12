<?php
//DB呼び出し
require '../../modules/class/models/database.php';

//ユーザ情報取得
$var = new Database(); //インスタンスの生成
$sql = 'select * from members 
		left join member_status on members.m_status_id = member_status.m_status_id'; //sql文
$result = $var->select($sql); //select文を実行、$resultに結果を連想配列で格納
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ユーザ管理画面</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<table>
	<tr>
	<th>key</th><th>member_id</th><th>member_name</th><th>nickname</th><th>password</th><th>mail_address</th><th>login_id</th><th>m_status_id</th>
	</tr>
	<?php
	foreach($result as $key=>$val){	//表示
	?>
	<tr>
		<th><?php echo $key; ?></th>
		<td><?php echo implode('</td><td>', $val);?></td>
	</tr>
	<?php }
	?>
</table>
<br>
<!--
<form action="administrate_process.php" method="post">
<table>
	<tr>
		<th>会員名</th>
		<td>
			会員名
		</td>
	</tr>

	<tr>
		<th>ニックネーム</th>
		<td><input type="text" name="nickname"></td>
	</tr>

	<tr>
		<th>現在のパスワード</th>
		<td><input type="password" name="oldPass"></td>
	</tr>

	<tr>
		<th>新規パスワード</th>
		<td><input type="password" name="newPass"></td>
	</tr>

	<tr>
		<th>変更種別</th>
		<td>
			<input type="radio" name="type" value="modify" default>変更
			<input type="radio" name="type" value="delete">削除
		</td>
	</tr>
</table>
<input type="submit" value="送信">
</form>
-->
</body>
</html>