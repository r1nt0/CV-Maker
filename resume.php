<?php
include('dbconnect.php');

?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $uname = $_POST['uname'];
    $degree = $_POST['degree'];
    $gdate = $_POST['gdate'];
    $gpa = $_POST['gpa'];
    $cname = $_POST['cname'];
    $jtitle = $_POST['jtitle'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $jdesc = $_POST['jdesc'];

    function validate_phone_number($phone)
    {
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        if (strlen($phone_to_check) != 10) {
            return false;
        } else {
            return true;
        }
    }

    function validate_gpa($gpa)
    {

        if (preg_match('/^\d{1}\.\d$/', $gpa) && $gpa < 10) {
            return true;
        } else {
            return false;
        }

    }
    function validate_alpha($alpha)
    {
        $pattern = '/^[a-zA-Z\s]+$/';
        $length = strlen($alpha);
        if ($length > 49) {
            echo "length should not exceed 49 characters";
            echo "<br />";
        } else {
            if (preg_match($pattern, $alpha)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function validate_address($add)
    {

        $length = strlen($add);
        if ($length > 49) {
            echo "length should not exceed 49 characters";
            echo "<br />";
            return false;
        } else {
            return true;
        }
    }

    function validate_date($date)
    {
        $selecteddate = new DateTime($date);
        $maxalloweddate = (new DateTime())->modify('+3 years');
        $minalloweddate = new DateTime('1960-01-01');
        if ($selecteddate <= $maxalloweddate && $selecteddate > $minalloweddate) {
            return true;
        } else {
            return false;
        }
    }

    function validate_edate($myedate)
    {
        $selecteddate = new DateTime($myedate);
        $minalloweddate = (new DateTime())->modify('-60 years');
        $maxalloweddate = (new DateTime())->modify('+2 years');
        if ($selecteddate <= $maxalloweddate && $selecteddate > $minalloweddate) {
            return true;
        } else {
            return false;
        }
    }



    if (validate_phone_number($phone) == false) {
        echo "number should be 10 digits";
    }
    echo " ";
    if (validate_gpa($gpa) == false) {
        echo "gpa must be less than 10 with one digit and decimal point value(eg: 8.7)";
    }
    echo " ";
    if (validate_alpha($name) == false) {
        echo "Name should not exceed 49 characters";
    }
    echo " ";
    if (validate_alpha($uname) == false) {
        echo "University name should not exceed 49 characters";
    }
    echo " ";
    if (validate_alpha($degree) == false) {
        echo "Degree should not exceed 49 characters";
    }
    echo " ";
    if (validate_alpha($cname) == false) {
        echo "Company name should not exceed 49 characters";
    }
    echo "<br />";
    if (validate_alpha($jtitle) == false) {
        echo "job title should not exceed 49 characters";
    }
    echo " ";
    if (validate_alpha($jdesc) == false) {
        echo "job description should not exceed 49 characters";
    }
    echo " ";
    if (validate_date($gdate) == false) {
        echo "Sorry, Your graduation date does not qualify";
    }
    echo " ";
    if (validate_edate($sdate) == false) {
        echo "Start date must be betwee 1964 and 2025";
    }
    echo " ";
    if (validate_edate($edate) == false) {
        echo "End date must be between 1964 and 2025";
    }
    echo " ";
    if (validate_address($address) == false) {
        echo "Address should not exceed 49 characters";
    }

    if (
        validate_alpha($name) && validate_edate($edate) && validate_date($gdate) && validate_edate($sdate) && validate_gpa($gpa) && validate_phone_number($phone)
        && validate_address($address) && validate_alpha($uname) && validate_alpha($degree) && validate_alpha($jtitle)
        && validate_alpha($jdesc) && validate_alpha($cname)
    ) {
        $qry = "INSERT INTO info(name, email, phone, address, uname, degree, gdate, gpa, cname, jtitle, sdate, edate, jdesc) VALUES 
        ('$name','$email','$phone','$address','$uname','$degree','$gdate','$gpa', '$cname','$jtitle','$sdate','$edate','$jdesc')";
        $result = mysqli_query($conn, $qry);
    } else {
        echo "<script>alert('Error in the input')</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mystyle.css"> <!-- Font-Awesome-Icons-CSS -->
    <title>My Resume</title>
    <style>

    </style>
</head>

<body>


    <header>
        <h1>
            <?php echo $name ?>
        </h1>
    </header>

    <section>
        <h2>Personal Information</h2>
        <ul>
            <li>Email:
                <?php echo $email ?>
            </li>
            <li>Phone:
                <?php echo $phone ?>
            </li>
            <li>Address:
                <?php echo $address ?>
            </li>
        </ul>
    </section>

    <section class="education">
        <h2>Education</h2>
        <h3>
            <?php echo $degree ?>
        </h3>
        <h4>
            <?php echo $uname ?>
        </h4>
        <h5>Graduation date:
            <?php echo $gdate ?>
        </h5>
        <h5>GPA:
            <?php echo $gpa ?>
        </h5>
    </section>

    <section class="experience">
        <h2>Work Experience</h2>
        <h3>
            <?php echo $jtitle ?>
        </h3>
        <h4>
            <?php echo $cname ?>
        </h4>
        <p>
            <?php echo $jdesc ?>
        </p>
        <h5>From:
            <?php echo $sdate ?>
        </h5>
        <h5>To:
            <?php echo $edate ?>
        </h5>
    </section>

    <!-- Add more sections for skills, projects, certifications, etc. -->

</body>

</html>