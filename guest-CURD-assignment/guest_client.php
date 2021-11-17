<?php

$msg = "";
// error messages 
$err_name = '';
$err_email = '';
$err_gender = '';
$err_nationality = '';
$err_skills = '';
$err_post = '';
$err_textarea = '';
$err_terms = '';
// data values 
$name = '';
$email = '';
$gender = '';
$nationality = '';
$skills = '';
$post = '';
$textarea = '';
$terms = '';

// initilize all error messages
if (!empty($_GET['err_name'])) {
    $err_name = $_GET['err_name'];
}
if (!empty($_GET['err_email'])) {
    $err_email = $_GET['err_email'];
}
if (!empty($_GET['err_gender'])) {
    $err_gender = $_GET['err_gender'];
}
if (!empty($_GET['err_nationality'])) {
    $err_nationality = $_GET['err_nationality'];
}
if (!empty($_GET['err_skills'])) {
    $err_skills = $_GET['err_skills'];
}
if (!empty($_GET['err_post'])) {
    $err_post = $_GET['err_post'];
}
if (!empty($_GET['err_textarea'])) {
    $err_textarea = $_GET['err_textarea'];
}
if (!empty($_GET['err_terms'])) {
    $err_terms = $_GET['err_terms'];
}

// initialize data
if (!empty($_GET['name'])) {
    $name = $_GET['name'];
}
if (!empty($_GET['email'])) {
    $email = $_GET['email'];
}
if (!empty($_GET['gender'])) {
    $gender = $_GET['gender'];
}
if (!empty($_GET['nationality'])) {
    $nationality = $_GET['nationality'];
}
if (!empty($_GET['skills'])) {
    $skills = $_GET['skills'];
}
if (!empty($_GET['post'])) {
    $post = $_GET['post'];
}
if (!empty($_GET['textarea'])) {
    $textarea = $_GET['textarea'];
}
if (!empty($_GET['terms'])) {
    $terms = $_GET['terms'];
}

// successful insertion case 
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 600px;
            margin-right: auto;
            margin-left: auto;
            font-size: 17px;
        }

        .btn-div {
            display: flex;
            justify-content: flex-end;
            width: 250px;
        }

        .btn-div input {
            margin-left: 10px;
            padding: 5px 10px;
        }

        span {
            color: red;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <form class="container" action="guest_server.php" method="GET">
        <h1 style="text-align: center;">Apply for Job! <a href="view_server.php">View All</a> </h1>
        <div style="color: green; text-align: center;"> <?php echo $msg; ?> </div>
        <fieldset>
            <legend>Application Form</legend>
            <div style="margin-bottom: 10px;">
                <div style="width: 200px; float: left;"> <label> Full Name </label> </div>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span> <?php echo $err_name; ?> </span>
            </div>
            <div style="margin-bottom: 10px;">
                <div style="width: 200px; float: left;">Email</div>
                <input type="email" name="email" value="<?php echo $email; ?>">
                <span> <?php echo $err_email; ?> </span>
            </div>
            <div style="margin-bottom: 10px;">
                <div style="width: 200px; float: left;">Gender</div>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
                <span> <?php echo $err_gender; ?> </span>
            </div>
            <div style="margin-bottom: 10px;">
                <div style="width: 200px; float: left;">Nationality</div>
                <select name="nationality">
                    <option value="">--- Select ---</option>
                    <option value="Pakistani">Pakistani</option>
                    <option value="Amercian">Amercian</option>
                    <option value="Indian">Indian</option>
                </select>
                <span> <?php echo $err_nationality; ?> </span>
            </div>
            <div style="margin-bottom: 10px;">
                <div style="width: 200px; height: 40px; float: left;">Skills</div>
                <div style="width: 500px;">
                    <input type="checkbox" name="skills[]" value="Asp.Net"> Asp.Net
                    <input type="checkbox" name="skills[]" value="jQuery"> jQuery
                    <span> <?php echo $err_skills; ?> </span>
                    <br>
                    <input type="checkbox" name="skills[]" value="MVC"> MVC
                    <input type="checkbox" name="skills[]" value="Sql Server"> Sql Server
                </div>
            </div>
            <div style="margin-bottom: 10px;">
                <div style="width: 200px; float: left;">Post applying</div>
                <input type="radio" name="post" value="Trainee"> Trainee
                <input type="radio" name="post" value="Software Engineer"> Software Engineer
                <span> <?php echo $err_post; ?> </span>
            </div>
            <div name="row-7" style="margin-bottom: 10px;">
                <div style="width: 200px; float: left;">for</div>
                <input type="radio" name="post" value="Team Leader"> Team Leader
                <input type="radio" name="post" value="Project manager"> Project manager
            </div>
            <div style="height: 40px;">
                <div style="width: 200px; float: left;">Upload <br> Resume</div>
                <input type="file" name="file">
            </div>
            <div style="margin-bottom: 10px;">
                <div style="width: 200px; float: left;">Text</div>
                <textarea cols="30" rows="2" name="textarea"></textarea>
                <span> <?php echo $err_textarea; ?> </span>
            </div>

            <div name="row-6" style="margin-bottom: 10px;">
                <div style="width: 100%;">
                    <input type="checkbox" name="via_email" value="Notify via Email"> Notify me the status via Email
                </div>
            </div>
            <div name="row-6" style="margin-bottom: 20px;">
                <div style="width: 100%;">
                    <input type="radio" name="terms" value="agreed"> I agree to terms & conditions
                    <span> <?php echo $err_terms; ?> </span>
                </div>
            </div>

            <div style="margin-bottom: 20px; clear: left; ">
                <div class="btn-div">
                    <input type="submit" name="" id="">
                    <input type="reset" name="" id="">
                </div>
            </div>
        </fieldset>
    </form>
</body>

</html>