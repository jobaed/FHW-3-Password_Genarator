<?php

if (isset($_POST['submit'])) {
    $langth = $_POST['langth'];
    $checkNumbers = isset($_POST["numbers"]);
    $checkSpecial = isset($_POST["special"]);
    $normalChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $specialChar = "!@#$%^&*()-_=+";
    $numbers = "0123456789";
    $password = '';

    // echo $checkNumbers;
    // echo $checkSpecial;



    // add special Charecter
    if ($checkSpecial) {
        $normalChars .= $specialChar;
    }

    // add Numbers
    if ($checkNumbers) {
        $normalChars .= $numbers;
    }


    for ($i = 0; $i < $langth; $i++) {
        $password .= $normalChars[rand(0, strlen($normalChars) - 1)];
    }

    echo $password;
}



?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="w-50 mx-auto mt-5">
            <div class="bg-dark text-light w-100 p-5 rounded shadow">
                <h3 class="text-light mb-4 text-uppercase text-center">password genarator</h3>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="mb-3">
                        <input type="number" name="langth" class="form-control" placeholder="Enter Langth Of Password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="special" class="form-check-input" id="speciall">
                        <label class="form-check-label" for="speciall">Include Special Charecter</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="numbers" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Include Numbers</label>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

                <div class="pt-2">
                    <h5 class="text-center ">Your Password:</h5>
                    <div class="alert alert-success mt-3">
                        <?php echo isset($password) ? $password : '' ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>



</html>