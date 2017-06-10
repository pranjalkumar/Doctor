$(function () {
    $("#text").keyup(function () {
        $("#completion").html("");
        var val= $("#text").val();
        if(val.length>2)
        {   $.ajax({
            url:'search.php',
            data: 'name='+val,
            success:function (data) {
                var parsed = JSON.parse(data);

                var result_count=parsed.length;
                var list = [];

                for (var i = 0; i < parsed.length; ++i)
                {
                    list.push(parsed[i].id);

                    
                    var x = $("<option></option>");

                    x.attr("value", parsed[i].id);

                    $("#completion").append(x);
                }


            //    $('#text').autocomplete({
            //        data: list,
            //        limit: 4
            //    });
            }
        });
        }
    });
});