<?php

//echo password_hash("adminpw",PASSWORD_BCRYPT);


include("dbconnect.php");
$filename = "../madinah.sql";
    if (!file_exists($filename)) {
      echo "FAILED";
    }
    $querys = explode(";", file_get_contents($filename));
    foreach ($querys as $q) {
      $q = trim($q);
      if (strlen($q)) {
        $conn->query($q) or die($q."<br>".$conn->error);
      }      
    }
	echo "DONE";
/*
if ($result = $conn->query("SELECT InfoCode,Question FROM qualify_questions WHERE InfoCode LIKE '%C%'"))
{
    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
        //print_r($row);
		$newValue = substr($row['InfoCode'],1).'. '.$row['Question'];
		$newValue = str_replace("_",".",$newValue);
		$infocode = $row['InfoCode'];
		echo $newValue;
		$conn->query("UPDATE qualify_questions SET Question = '$newValue' WHERE InfoCode = '$infocode' ");
		echo "<br>";
    }
}*/
//echo password_hash("contructorpw",PASSWORD_BCRYPT);
/*$questions = [
',"Material","M1","المادة تساهم في رفع كفاءة البيئية الداخلية للمبنى لخلوها من المواد المحظورة والمعروفة مسبقا ","YN_Doc"',
',"Material","M2","المادة ذات مرونة عالية ولا تحتاج الصيانه الدائمة ","YN_Doc"',
',"Material","M3","المادة تعتمد في تصنيعها بنسب متفاوتة على المواد المعاد تدويرها","YN_Doc"',
',"Material","M4","المادة من الممكن تكوينها من مباني قديمة تم التخلص منها ","YN_Doc"',
',"Material","M5","المادة تم تصنيعها بالاعتماد على المصادر الطبيعية او المتجدده","YN_Doc"',
',"Material","M6","المادة تستخدم جزء بسيط من الطاقة في عملية تصنيعها ","YN_Doc"',
',"Material","M7","المادة لا تحتوي كلوروفلوركربونز والذي يتسبب في ضرر طبقة الأوزون ","YN_Doc"',
',"Material","M8","المادة لاتحتوي على مواد سمية قد ثؤثر على الصحة والبيئة العامة ","YN_Doc"',
',"Material","M9","المادة المستخدمة يتم أنتاجها و تصنيعها محليا ","YN_Doc"',
',"Material","M10","المواد المصنعه من الخشب يتم تصنيعها من قبل مصانع تتبع ممارسة مبادئ الإستدامة ","YN_Doc"',
',"Material","M11","المادة يمكن ان يعاد استخدامها كليا اوجزئيا دون بذل الكثير من الجهد ","YN_Doc"',
',"Material","M12"," المادة المصنعه قابلة للتحلل بواسطة البكتيريا ","YN_Doc"',
',"Material","M13","  المادة تم دراستها بيئيا باحدى الطرق المعروفه مثل ال سي ايه أو حاصلة على احدى الشهادات من الجهات العالمية في المجال البيئي مثل المجلس الأمريكي للمباني الخضراء، نظام المنتجات الخضراء او صديقة البيئة ","YN_Doc"',
',"Material","M14","المادة تم تصنيعها في جهات تتبع ممارسات هدفها الحفاظ على البيئة وتقليل استخدام الموارد الطبيعية ","YN_Doc"'
];

	$i = 0;
	$j = 39;
	foreach($questions as $question) {
		echo "INSERT INTO qualify_questions VALUES (";
		echo (++$j).$question.");<br>";
	}*/
/*
function array_search_partial($SearchStr, $Array) {
	foreach ($Array as $Index => $ArrElement) {
		if (strpos($ArrElement,$SearchStr) !== FALSE) {
			echo $SearchStr.' found in '.$ArrElement.'<br>';
			return $Index;
		}
	}
	return FALSE;
}
$array = array(
    "C1" => null,
    "C2" => "",
	"C3" => "f33doo",
	"C3_1" => "f33344foo",
	"C5" => "5msa",
	"C5_2" => "cr3rfoo",
	"C3_2" => "",
	"C3_3" => "",
	"C3_Doc" => "talt",
	"C4" => "arb3",
	"C5_3" => "cr3rfo234324o",
);
$POST_Filtered = array();
$hasChild = '';
$childNames = '';
$i = 0;
ksort($array);
foreach ( $array as $key => $postValue ) {
	$i++;

		
		if ( htmlentities( trim( $postValue ) ) !== FALSE ) {
			if (strpos($key,"_") !== false) {
				if (strpos($key,"Doc") !== false) {
					//Document
					//Child Question
					if ($hasChild != '' && $i == count($array)) {
						$POST_Filtered[$hasChild][1] = $childNames;
						$hasChild = '';
					}
					continue;
				}
				//Child Question
				if ($hasChild == '') {
					$hasChild = substr($key,0,strpos($key,"_"));
					$childNames = $key;
				} else {
					$childNames .= ','.$key;
				}
				if ($i == count($array)) {
					$POST_Filtered[$hasChild][1] = $childNames;
					$hasChild = '';
				}
				continue;
			} else {
				$POST_Filtered[$key][0] = $postValue;
				$POST_Filtered[$key][1] = 0;
			}
			if ($hasChild != '') {
				$POST_Filtered[$hasChild][1] = $childNames;
				$hasChild = '';
			}
	}
	
}
echo array_search("C1",array_keys($POST_Filtered))."<br><br>";
print("<pre>".print_r($POST_Filtered,true)."</pre>");
*/

?>