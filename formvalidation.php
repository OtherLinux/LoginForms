<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="form_helper.js"></script>
    <link rel="stylesheet" href="index.css">

    <?php

    $full_name = $favorite_day = $email = $password = $passwordrepeat = $age = "";
    $tos = false;

    $err_msg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = test_input($_POST["fullname"]);
        $favorite_day = test_input($_POST["favoriteday"]);

        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $passwordrepeat = test_input($_POST["passwordrepeat"]);

        $age = test_input($_POST["age"]);




        if (array_key_exists('acceptedtos', $_POST)) {
            $tos = true;
        }



        if ($password !== $passwordrepeat) {
                $err_msg = "Passwords do not match";
        }

        if (!$tos) {
            $err_msg = "Please accept terms and conditions";
        }


    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

</head>
<body>
<main>
    <section id="RegisterPage">
        <h1 id="Regh1">Get Started</h1>
        <p id="Regp">Create your account now!</p>
        <p id="RegReq">* are required</p>
        <p id="RegErr"><?php echo $err_msg?></p>
        <form id="RegisterForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

            <label for="fullname">Full Name*</label>
            <input type="text" id="fullname" name="fullname" class="TextInputField" value="<?php echo $full_name ?>" required maxlength="50">

            <label for="favoriteday">Favorite Day*</label>
            <input type="date" id="favoriteday" name="favoriteday" class="DateInputField" value="<?php echo $favorite_day ?>" required>

            <label for="email">Email*</label>
            <input id="email" type="email" name="email" class="TextInputField" value="<?php echo $email ?>" required>

            <label for="password">Password*</label>
            <input id="password" type="password" name="password" class="TextInputField" value="<?php echo $password ?>" required minlength="8">

            <label for="passwordrepeat" id="labelpasswordrepeat" class="HiddenPass">Please Repeat Password*</label>
            <input id="passwordrepeat" type="password" name="passwordrepeat" class="TextInputField HiddenPass"  value="<?php echo $passwordrepeat ?>" required
                   minlength="8">

            <button id="ShowButton" type="button">Show Passwords</button>

            <div id="agediv">
                <label for="agenum">What is your age*</label>
                <input id="agenum" type="number" name="age" required min="1" value="<?php echo $age ?>" max="128" placeholder="13">
            </div>

            <div id="tosdiv">
                <label for="tosbutton">I agree to the TOS and Privacy Policy*</label>
                <input id="tosbutton" type="checkbox" name="acceptedtos">
            </div>

            <input id="SubmitButton" type="submit" value="Register" class="RegisterButton">

        </form>
        <span class="LogInTxt">Have an account? <a class="LogInTxt" target="_self" href="formvalidation.php"
                                                   id="LogInText">Click here</a></span>

    </section>
</main>
</body>
</html>
