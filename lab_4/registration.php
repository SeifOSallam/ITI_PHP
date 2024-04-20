<?php
    if(isset($_GET['errors'])){
        $errors = json_decode($_GET["errors"], true);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="w-50 m-auto border-0">
        <form action="validate.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
            <?php
                if(isset($errors['email']))
                    echo "<span style='color:red'>{$errors['email']}</span>"
             ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName">
            <?php
                if(isset($errors['firstName']))
                    echo "<span style='color:red'>{$errors['firstName']}</span>"
             ?>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
            <?php
                if(isset($errors['lastName']))
                    echo "<span style='color:red'>{$errors['lastName']}</span>"
             ?>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <select class="form-select" id="country" name="country">
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="UK">UK</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-select" id="department" name="department">
                <option value="IT">IT</option>
                <option value="Marketing">Marketing</option>
                <option value="Finance">Finance</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-3 w-100 d-flex">
            <div class="w-25">
                Skills
            </div>
            <div class="w-100 container">
                <div class="row">
                    <div class="col form-check">
                        <input value="Football" type="checkbox" name="skill[]" class="form-check-input" id="skill1">
                        <label class="form-check-label" for="skill1">Football</label>       
                    </div>
                    <div class="col form-check">
                        <input value="Baseball" type="checkbox" name="skill[]" class="form-check-input" id="skill2">
                        <label class="form-check-label" for="skill2">Baseball</label>   
                    </div>
                </div>

                <div class="row">
                    <div class="col form-check">
                        <input value="Basketball" type="checkbox" name="skill[]" class="form-check-input" id="skill3">
                        <label class="form-check-label" for="skill3">Basketball</label>   
                    </div>
                    <div class="col form-check">
                        <input type="checkbox"
                        name="skill[]" 
                        class="form-check-input" 
                        id="skill4"
                        value="The other foot-ball">
                        <label class="form-check-label" for="skill4">The other foot-ball</label>       
                    </div>
                </div>
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="male" type="radio" name="gender" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Male
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" value="female" type="radio" name="gender" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
</body>
</html>