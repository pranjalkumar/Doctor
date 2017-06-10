$(function() {
    $("#add_more").click(function() {
        var files = $('#reportForm input[type="file"]');

        files.first().before('<p><input type="file" name="record_' + (files.length + 1) + '"></p>');
    })
})