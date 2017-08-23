<?php
require "../m/db.php";//Подключаем БД
////----Делаем запорос на районы
//select * from address where  ter_pid=0120400000  ORDER BY ter_name;
//echo $_REQUEST['selected_region'];
//$reg_id = $_REQUEST['selected_region'];
//if($_REQUEST['selected_region'] == 80 || $_REQUEST['selected_region'] == 85) {
//    echo "kiev sevastopol";
//echo $_REQUEST['selected_district'];
$query = "select * from address where    ter_id=" . $_REQUEST['selected_district'] . " ;";

$result = mysql_query($query) or die(mysql_error());

$row = mysql_fetch_array($result);
if ($row['ter_type_id'] == 1) {
    return;
};

$query = "select * from address where    ter_pid=" . $_REQUEST['selected_district'] . " ;";
//$query = "select * from address where  ter_type_id!=0 and ter_type_id!=2 and ter_type_id!=3 and reg_id=63 ORDER BY ter_type_id;";
//    $query ="select ter_name from address where ter_level=2 and (ter_type_id=2 or ter_type_id=1) and reg_id=".$_REQUEST['selected_city']." ORDER BY ter_name;";

// $query = "SELECT ter_name FROM address WHERE ter_level=1 ORDER BY ter_name;";
$result = mysql_query($query) or die(mysql_error());
// выводим товары полученные по запросу
//----Выводим районы
print "<select name=" . city . " class='chzn-select city'>";
print "<option value='no_select'></option>";
while ($row = mysql_fetch_array($result)) {
    print "<option  class=" . $row['ter_pid'] . ">";
    print $row['ter_name'] . "<br>";
    echo("</option>");

}

print '</select>';
?>
<script>
    $('.city').chosen({
////            width: "0%",
        disable_search: false,
        disable_search_threshold: 5,
        enable_split_word_search: false,
        no_results_text: "Ничего не найдено",
        placeholder_text_multiple: "Выберите несколько параметров",
        placeholder_text_single: "Оберіть населеній пункт",
        search_contains: true,
        display_disabled_options: false,
        display_selected_options: false,
        max_shown_results: Infinity,
//            allow_single_deselect: true,
        inherit_select_classes: false,
        'max_selected_options': 1
    });

</script>
<? // }else{
//$query = "select * from address where  ter_type_id!=0 and ter_type_id!=2 and ter_type_id!=3 and reg_id=".$_REQUEST['selected_region']." ;";
////$query = "select * from address where  ter_type_id!=0 and ter_type_id!=2 and ter_type_id!=3 and reg_id=63 ORDER BY ter_type_id;";
//
//// $query = "SELECT ter_name FROM address WHERE ter_level=1 ORDER BY ter_name;";
//$result = mysql_query($query) or die(mysql_error());
//// выводим товары полученные по запросу
////----Выводим районы
//print "<select name=".city." class='chzn-select city'>";
//print "<option value=''></option>";
//while ($row=mysql_fetch_array($result))
//{
//    print "<option  ter_id=".$row['ter_pid']." class=".$row['ter_pid'].">";
//    print $row['ter_name']."<br>";
//    echo("</option>");
////    $str_city =  $str_city."<option value=$item[1] class=".$item[1].">".$item[0].'</option>';
//}
//
//print '</select>';
//?>
<!--<script>-->
<!--    $('.city').chosen({-->
<!--        width: "300px",-->
<!--        disable_search: false,-->
<!--        disable_search_threshold: 5,-->
<!--        enable_split_word_search: false,-->
<!--        no_results_text: "Ничего не найдено",-->
<!--        placeholder_text_multiple: "Выберите несколько параметров",-->
<!--        placeholder_text_single: "Выберите Населеній пункт",-->
<!--        search_contains: true,-->
<!--        display_disabled_options: false,-->
<!--        display_selected_options: false,-->
<!--        max_shown_results: Infinity,-->
<!--//            allow_single_deselect: true,-->
<!--        inherit_select_classes: false,-->
<!--        'max_selected_options': 1-->
<!--    });-->
<!---->
<!--</script>-->
<? //}?>
