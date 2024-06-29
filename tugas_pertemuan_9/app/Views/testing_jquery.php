<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <button class="testingButton headings helloWorld" id="HELLO">
        <h2>THIS IS TESTING</h2>
    </button>
    <div><?= base_url('data_print'); ?></div>
    <script>
        $(document).ready(function() {
            $(".testingButton").click(function() {
                var idData = $(this).attr('id');
                $.ajax({
                    url: '<?= base_url('data_print'); ?>',
                    type: "post",
                    dataType: "json",
                    data: {
                        'inData': idData,
                    },
                    success: function(response) {
                        // alert(response['status']);
                        if (response['status'] == 'success') {
                            alert(response['body']);
                            // $('div').text(response['body']);
                            // alert(response['body']);
                        } else {
                            alert('Err');
                        }
                    },
                });
            });
        });
    </script>
</body>

</html>