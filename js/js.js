
$(function () {
    var selected_region = '';
    $('.chzn-select.region').change(function () {
        var selected_regions = document.querySelectorAll(".result-selected");

        if (selected_regions[0].classList[2] == "result-selected") {
            selected_region = selected_regions[0].classList[1];

        } else {
            selected_region = selected_regions[1].classList[1];
        }

        if (selected_region == 85 || selected_region == 80) {
            $("#hidden_city").val("NO");
        } else {
            $("#hidden_city").val("YES");
        }
        $('#district').html("");
        $('#city').html("");


        $.ajax({
            type: "POST",
            url: "../c/show_district.php",
            data: {"selected_region": selected_region},
            response: 'text',//тип возвращаемого ответа text либо xml
            success: function (html) {
                $("#district").html(html);
            }
        });

        return false;

    });
//------------------region
    var district_div = document.getElementById('district');

    district_div.onclick = function (event) {

        var selected_district = '';
        $('#district >.chzn-select').change(function () {

            var selected_districts = document.getElementById('district').querySelectorAll(".result-selected");
            if (selected_region == 80 || selected_region == 85) {
                return;
            }
            if (selected_districts[0].classList[3]) {
            } else {


                if (selected_districts[0].classList[2] == "result-selected") {
                    selected_district = selected_districts[0].classList[1];

                } else {
                    selected_district = selected_districts[1].classList[1];
                }


                $.ajax({
                    type: "POST",
                    url: "../c/show_city.php",
                    data: {"selected_district": selected_district},
                    response: 'JSON',//тип возвращаемого ответа text либо xml
                    success: function (html) {
                        $("#city").html(html);
                    }
                });
                var is_city = document.querySelector('#city ul');
                console.log(is_city);
                if (!is_city) {
                    $("#hidden_city").val("no");
                } else {
                    $("#hidden_city").val("yes");
                }


                return false;

            }


        });

    };




//--------submit---------------------

    $('#submit').on("click", function (e) {
        var no_select = document.querySelector('.chosen-default');

        if (no_select) {
            e.preventDefault();
            alert('Заполните все поля');

        }
        var reg_name = /[а-яґєії][a-z]+\s[а-яґєії][a-z]+\s[а-яґєії][a-z]+$/gi;
        if (reg_name.test(document.getElementById("fio").value))//если есть несовпадение
        {
            err_msg += " * Поле \"Машиніст\" містить заборонені символи\n";//предупреждаем
            flag = false;
        }


    });

});
