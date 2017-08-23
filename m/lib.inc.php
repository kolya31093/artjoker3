<?php


function db2Array($data)
{
    $arr = array();
    while ($row = mysql_fetch_array($data)) {
        $arr[] = $row;
    }
    return $arr;
}

//------ Всю таблицу
function selectAll()
{
    $sql = "SELECT * FROM address";
    $result = mysql_query($sql) or die(mysql_error());
    return db2Array($result);
}

//----Областей
function selectRegion()
{
    $sql = "SELECT ter_name, reg_id FROM address WHERE ter_level=1 ORDER BY ter_name;";
    $result = mysql_query($sql) or die(mysql_error());
    return db2Array($result);
}

//---Выборка городов
function selectCity()
{
    $sql = "select ter_name from address where ter_level=2 and ter_type_id=1 ORDER BY ter_name;";
    $result = mysql_query($sql) or die(mysql_error());
    return db2Array($result);
}

//---Выборка районов
function selectDistricts()
{
    $sql = "select ter_name from address where ter_level=2 and ter_type_id=2 ORDER BY ter_name;";
    $result = mysql_query($sql) or die(mysql_error());
    return db2Array($result);
}


