<?php

include('user_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$id = '';
$msg = "";

if (!empty($_GET['id']))
    $id = $_GET['id'];


$user = new Users;
$user->connect_DB();

$u_data = $user->getUserById($id);
$result = $u_data->fetch(PDO::FETCH_ASSOC);

$user->close_db();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: rgb(236, 236, 236);
        }

        .custome-container {
            width: 800px;
            display: flex;
            background-color: white;
            padding: 0;
        }

        .title {
            color: rgb(10, 76, 175);
            font-size: 25px;
            font-weight: bold;
            padding: 0px 50px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .radio-label {
            color: rgba(10, 76, 175, 0.788);
            font-weight: 400;
        }

        .c-color {
            color: rgba(0, 45, 112, 0.788);
            font-weight: 600;
        }

        .green {
            background-color: rgb(7, 199, 87);
            color: white;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container custome-container shadow mt-5">
        <!-- <div class="cover"><img src="./images/cover-2.jpg" width="300px" height="592px" alt=""></div> -->
        <div class="form w-100">
            <div class="logo py-5 d-flex justify-content-center"><img src="./images/Transferwise_logo.png" width="150px" alt="">
            </div>
            <div class="title">Edit User</div>

            <div class="text-success text-center"> <?php echo $msg; ?></div>

            <form action="edit_user_server.php" method="POST" class="mx-5 my-3">

                <div class="w-100 mb-3">
                    <input type="hidden" name="u_id" value="<?php echo $id; ?>">
                </div>
                <div class="w-100 mb-3">
                    <input type="text" name="name" value="<?php echo $result['name']; ?>" class="form-control" placeholder="Enter full name" required>
                </div>
                <div class="w-100 mb-3">
                    <input type="password" name="pwd" value="<?php echo $result['password']; ?>" class="form-control" placeholder="Create new password" required>
                </div>

                <div class="w-100 mb-3">
                    <div class="c-color text-muted">Country of residence</div>
                    <select name="country" id="" class="form-select fw-bold c-color" required>
                        <option value="<?php echo $result['country']; ?>"><?php echo $result['country'] ?></option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United State">United State</option>
                        <option value="Pakistan">Pakistan</option>
                    </select>
                </div>

                <div class="w-100 mb-3">
                    <input type="submit" value="Update" class="form-control btn green">
                </div>

                <div class="text-center text-muted">Or, continue with
                    <a href="#" class="text-info fw-bold">Google</a> or
                    <a href="#" class="text-info fw-bold">Facebook</a>
                </div>
            </form>

        </div>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>