<?php


// подключение библиотек
require "m/db.php";
require "m/lib.inc.php";

?>
<html>
<head>
    <title>Каталог товаров</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="chosen/chosen.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!--<form action="m/form.php" method="post">-->
<form action="v/list.php" method="post">


    <p><b>Введите ваши данные:</b></p>

    <p><input id="fio" type="text" name="name" required>ФІО<Br>

    <p><input type="email" name="email" required>email<Br><br>

        <?php

        //---выборка областей
        $reg = selectRegion();
        $str = '';

        foreach ($reg as $item) {
            $str = $str . "<option  class=" . $item[1] . ">" . $item[0] . '</option>';

        }


        print <<<HTML
        <select name="region" class="chzn-select region" required>
            <option value="no_select"></option>
             $str
        </select>
HTML;

        //-----Выборка районов
        ?>

    <div id="district" required></div>


    <div id="city" value="" required>

    </div>


    <p><input value="Відправити запит" id='submit' type="submit"></p>
</form>


<!--//Подключаем jQuery-->

<script src="js/jquery.min.js" type="text/javascript"></script>

<script src="chosen/chosen.jquery.min.js" type="text/javascript"></script>

<!--//Включаем плагин-->

<script type="text/javascript">
    $(".chzn-select").chosen({
        disable_search: false,
        disable_search_threshold: 5,
        enable_split_word_search: false,
        no_results_text: "Ничего не найдено",
        placeholder_text_multiple: "Выберите несколько параметров",
        placeholder_text_single: "Оберіть область",
        search_contains: true,
        display_disabled_options: false,
        display_selected_options: false,
        max_shown_results: Infinity,
        inherit_select_classes: false,
        'max_selected_options': 1
    });


;

</script>


<script src="js/js.js" type="text/javascript"></script>


</body>
</html>