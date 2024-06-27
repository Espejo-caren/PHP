<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Barlow:wght@200..900&family=Dosis:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Radio Button and Checkboxes</title>
    <style>
       body {
            background-color: #FFFDF9;
            margin: 0;
            font-family: 'Barlow', sans-serif;
        }
        .top {
            background-color: #162F46; 
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center; 
            position: sticky; 
            top: 0; 
            z-index: 1000; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            width: 100%; 
            color: white; 
        }
        .top p {
            font-size: 25px;
            font-weight: bold;
        }
        .container {
            background-color: rgba(210, 224, 251, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 3px 3px 2px #162F46;
            width: 500px;
            margin: 20px auto; 
            margin-top: 60px;
        }
        .container p {
            font-weight: bold;
            margin-left: 100px;
        }
        .colored {
            color: #FF407D;
        }
        .textblue {
            color: #219291;
        }
        .head h4 {
            text-align: center;
            font-size: 30px;
            color: #1B1A55;
            font-family: "Roboto Condensed", sans-serif;
            margin-top:0;
            text-shadow: 2px 2px  4px gray;
        }
        .error {
            font-family: "Dosis", sans-serif;
            color: #D04848;
            font-weight:lighter;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #75A47F;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            text-align: center;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #799351;
        }
        .head img{
            width: 90px;
            height: 100px;
            margin-left: 200px;
            margin-top:20px;
            margin-bottom: 0;
        }


    </style>
</head>
<body>
    <div class="top">
        <p>Information Record</p>
    </div>
    <div class="container">
        <div class="head">
            <img src="15117892.png" alt=""/>
            <h4>Employee Information</h4>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <p>Employee Name: <span class="colored">*</span>
            <input type="text" name="employeeName" size="19" value="<?php if(isset($employeeName)) echo $employeeName; ?>"></p>
            <p>Employee Number: <span class="colored">*</span>
            <input type="tel" name="employeeNumber" size="17" value="<?php if(isset($employeeNumber)) echo $employeeNumber; ?>" placeholder="0999-999-9999"></p>
            <p>E-mail Address: <span class="colored">*</span>
            <input type="email" name="email" size="20" value="<?php if(isset($email)) echo $email; ?>" placeholder="yourname@gmail.com"></p>
            <p>Gender: <span class="colored">*</span>
            <input type="radio" name="gender" value="Male" <?php if(isset($gender) && $gender == "Male") echo "checked"; ?>>Male<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" value="Female" <?php if(isset($gender) && $gender == "Female") echo "checked"; ?>>Female</p>
            <p>Employee Status: <span class="colored">*</span>
            <input type="radio" name="status" value="Full Time" <?php if(isset($status) && $status == "Full Time") echo "checked"; ?>>Full Time<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="status" value="Part Time" <?php if(isset($status) && $status == "Part Time") echo "checked"; ?>>Part Time</p>
            <p>Inquiry/Comments: 
            <textarea name="inquiry" cols="20" rows="3" style="resize: none;"><?php if(isset($inquiry)) echo $inquiry; ?></textarea></p>
            <p>Educational Attainment: <span class="colored">*</span>
            <br /><input type="checkbox" name="underGrad" value="Undergraduate" <?php if(isset($underGrad) && $underGrad == "Undergraduate") echo "checked"; ?>>Undergraduate
            <br /><input type="checkbox" name="masters" value="Masters Degree" <?php if(isset($masters) && $masters == "Masters Degree") echo "checked"; ?>>Masters Degree
            <br /><input type="checkbox" name="doctor" value="Doctoral Degree" <?php if(isset($doctor) && $doctor == "Doctoral Degree") echo "checked"; ?>>Doctoral Degree</p>
            <input type="submit" class="btn" value="Submit Information">
        </form>

        <?php
        $employeeNameErr = $employeeNumberErr = $emailErr = $genderErr = $statusErr = ""; $employeeName = $employeeNumber = $email = $genderErr = $status = "";

        function test_input($data) {
            $data = trim($data); 
            $data = stripslashes($data); 
            $data = htmlspecialchars($data); 
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["employeeName"])) {
                $employeeNameErr = '<p class="error">Employee Name is required.<br></p>';
                echo $employeeNameErr;
            } else {
                $employeeName = test_input($_POST["employeeName"]);
            }
            if (empty($_POST["employeeNumber"])) {
                $employeeNumberErr = '<p class="error">Employee Number is required.<br></p>';
                echo $employeeNumberErr;
            } else {
                $employeeNumber = test_input($_POST["employeeNumber"]);
            }
            if (empty($_POST["email"])) {
                $emailErr = '<p class="error">Employee e-mail is required.<br></p>';
                echo $emailErr;
            } else {
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["gender"])) {
                $genderErr = '<p class="error">Please select your gender.<br></p>';
                echo $genderErr;
            } else {
                $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["status"])) {
                $statusErr = '<p class="error">Please select your employee status.<br></p>';
                echo $statusErr;
            } else {
                $status = test_input($_POST["status"]);
            }

            if (isset($_POST["underGrad"]) || isset($_POST["masters"]) || isset($_POST["doctor"])) {
                if (isset($_POST["underGrad"])) {
                    $underGradSelected = true;
                } else {
                    $underGradSelected = false;
                }
            
                if ($underGradSelected) {
                    echo "<p>Educational Attainment: ";
                    $selected = [];
                    if (isset($_POST["underGrad"])) {
                        $selected[] = $_POST["underGrad"];
                    }
                    if (isset($_POST["masters"])) {
                        $selected[] = $_POST["masters"];
                    }
                    if (isset($_POST["doctor"])) {
                        $selected[] = $_POST["doctor"];
                    }
                    echo implode(", ", $selected);
                    echo "</p>";
                } else {
                    echo '<p class="error">Please select Undergraduate before selecting Masters or Doctor.</p>';
                }
            } else {
                echo '<p class="error">Please select at least one educational attainment.</p>';
            }
            
        }
        ?>
    </div>
</body>
</html>
