<?php
$name = "Trần Quang Hoài";
$name1 = str_replace(" ","", $name);
//In Số Ký Tự
echo "Số kí tự : " . strlen($name1);
echo "</br>";
//In Số Từ
echo "Số từ: " . str_word_count($name1,0);
echo "<br/>";
//Tìm vị trí chữ n trong chuỗi nếu có
$timkiem = strpos($name1, "n");
if ($timkiem == true) {
	echo "Vị trí của n là: " . $timkiem;;
} else {
	echo "Không tìm thấy chữ n";
}
echo "<br/>";
//In hoa chữ cái đầu tiên (sử dụng mb_strtoupper thay cho strtoupper để in hoa chữ cái có dấu).
echo mb_strtoupper($name);
echo "<br/>";
//Thay tên bằng PHP
echo str_replace("Hoài", "PHP", $name);
?>