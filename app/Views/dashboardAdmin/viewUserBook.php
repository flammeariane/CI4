<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
</head>

<body>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-info">livre des membres</h3>
        </div>

        <select name="user" id="user" class="form-control input-lg">
            <option value="">Select user</option>
            <?php
            foreach ($listUsers as $row) {
                echo '<option value="' . $row->id . '">' . $row->firstname . '</option>';
            }
            ?>
        </select>

        <div class="form-group">
            <select name="book" id="book" class="form-control input-lg">
                <option value=""> selected book</option>
            </select>

        </div>



        <script>
            $(document).ready(function() {
                $('#user').change(function() {

                    var user_id = $('#user').val();


                    if (user_id != '') {
                        $.ajax({
                            url: "<?= base_url() ?>/dashboardAdmin/action/",
                            method: "POST",
                            data: {
                                user_id: user_id,
                            },
                            dataType: "JSON",
                            success: function(data) {
                                console.log(data);
                                var html = '<option value="" >Select book</option>';
                                for (var count = 0; count < data.length; count++) {
                                    html += '<option value="' + data[count].id_users + '">' + data[count].isbn + '</option>';
                                }

                                $('#book').html(html);
                            }
                        });

                    } else {
                        $('#book').val('');

                    }

                });
            });
        </script>



</body>

</html>