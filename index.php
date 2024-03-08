<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop Table Sorting</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<table id="sortable">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
        <tr data-id="1">
            <td>1</td>
            <td>John Doe 1</td>
            <td>john@example.com 1</td>
        </tr>
        <tr data-id="2">
            <td>2</td>
            <td>Jane Doe 2</td>
            <td>jane@example.com 2</td>
        </tr>
        <tr data-id="3">
            <td>3</td>
            <td>Jane Doe 3</td>
            <td>jane@example.com 3</td>
        </tr>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#sortable tbody").sortable({
            helper: fixWidthHelper,
            stop: function(event, ui) {
                saveOrder();
            }
        }).disableSelection();

        function fixWidthHelper(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        }

        function saveOrder() {
            var order = [];
            $("#sortable tbody tr").each(function(index) {
                var id = $(this).data('id');
                order.push({
                    id: id,
                    position: index + 1
                });
            });

            // AJAX isteği ile sıralama bilgisi PHP dosyasına gönderiliyor
            $.ajax({
                url: 'save_order.php',
                method: 'POST',
                data: {order: order},
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    });
</script>

</body>
</html>
