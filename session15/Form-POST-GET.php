<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
<?php
$file = @fopen("filetxt/demo.txt", "r");
if (!$file) {
	echo "File không tồn tại";
} else {
	$data = fread($file, filesize('filetxt/demo.txt'));
}
	$number = range(0, 9);
	$letters = range('A', 'Z');
	str_replace($number, "", $data, $countNumber);
	str_replace($letters,  "", $data, $countLetters);
	echo "Số chữ số là :" . $countNumber;
	echo "<br/>";
	echo "Số chữ in hoa là: " . $countLetters;
	echo "<br/>";
	echo $data;
	echo "<br/>";
	$countSon = stripos($data, ".");
	echo $countSon;
	$fson1 = substr($data, 0, $countSon);
	$fson2 = str_replace($fson1, "", $data);
	echo "<br/>";
	echo $fson2;
	$demo1 = fopen("filetxt/demo1.txt", "w");
	fwrite($demo1, $fson1);
	$demo2 = fopen("filetxt/demo2.txt", "w");
	fwrite($demo2, $fson2);
	
?>