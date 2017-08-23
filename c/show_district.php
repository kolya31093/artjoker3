<?php

require "../m/db.php"; //Подключаем БД
////----Делаем запорос на НП
//$query ="select ter_name from address where ter_level=2 and (ter_type_id=2 or ter_type_id=1) and reg_id=".$_REQUEST['selected_city']." ORDER BY ter_name;";
if ($_REQUEST['selected_region'] == 80 || $_REQUEST['selected_region'] == 85) {
    $query = "select * from address where ter_level=2 and ter_type_id=3  and reg_id=" . $_REQUEST['selected_region'] . " ORDER BY ter_name;";

} else {
//    $query = "select * from address where ter_level=2  and ter_type_id=2  and reg_id=" . $_REQUEST['selected_region'] . " ORDER BY ter_name;";
    $query = "select * from address where  (ter_type_id=2 or ter_type_id=1)  and reg_id=" . $_REQUEST['selected_region'] . " ORDER BY ter_type_id;";

};
//$query = "select * from address where   ter_id=".$_REQUEST['selected_city']." ORDER BY ter_name;";
//$query = "select * from address where  ter_level=2 and ter_type_id=2 and reg_id=01 ORDER BY ter_name;";

$result = mysql_query($query) or die(mysql_error());
// выводим товары полученные по запросу
//----Выводим районы
print "<select name=" . district . " class='chzn-select district'>";
print "<option value='no_select'></option>";

while ($row = mysql_fetch_array($result)) {
    print "<option  class=" . $row['ter_id'] . ">";
    print $row['ter_name'] . "<br>";
    echo("</option>");

}

print '</select>';
?>
<script>
    $('.district').chosen({
        width: "300px",
        disable_search: false,
        disable_search_threshold: 5,
        enable_split_word_search: false,
        no_results_text: "Ничего не найдено",
        placeholder_text_multiple: "Выберите несколько параметров",
        placeholder_text_single: "Оберіть місто або район",
        search_contains: true,
        display_disabled_options: false,
        display_selected_options: false,
        max_shown_results: Infinity,
//            allow_single_deselect: true,
        inherit_select_classes: true,
        'max_selected_options': 1
    });

</script>

