<?php


// подключение библиотек

require "../m/form.php";

?>
<html>
<head>
    <title>Каталог товаров</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../style.css">
</head>

    <body id="list">
        <div class="list">
            <?
                print $view;
            ?>
        </div>
    </body>
</html>
