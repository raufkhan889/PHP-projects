<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
</head>

<body>
    <div class="container">
        <a class="btn btn-primary d-block w-75 mx-auto my-5" href="#">click</a>
    </div>

    <script src="JS/jquery-3.6.0.js"></script>
    <script src="JS/sweetalert.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.btn').click(function() {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });
                // .then((willDelete) => {
                //     if (willDelete) {
                //         $.ajax({
                //             type: "POST",
                //             url: "delete_product.php",
                //             data: {

                //             },
                //             success: function(response) {
                //                 swal({
                //                     'Product has been deleted!',
                //                     icon: "success"
                //                 });
                //             }
                //         });
                //     }
                // });
            });
        });
    </script>
</body>

</html>