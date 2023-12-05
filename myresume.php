<?php
session_start();
?>
<?php
include('dbconnect.php');
include('Common Page Header.php');

?>

<form action="resume.php" method="post">
    <table>
        <th>Personal Details</th>
        <tr>
            <td>Name</td>
            <td><input type="text" class="textbox" name="username"
                    value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                    placeholder="Name" required=""></td>

            <td>Email</td>
            <td><input type="email" class="textbox" name="email"
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                    placeholder="Email" required=""></td>

            <td>Phone</td>
            <td><input type="number" class="textbox" name="phone"
                    value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                    placeholder="Phone" required=""></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" class="textbox" name="address"
                    value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>"
                    placeholder="Address" required=""></td>
        </tr>
        <br />
        <th>Educational Details</th>
        <tr>
            <td>University Name</td>
            <td><input type="text" class="textbox" name="uname"
                    value="<?php echo isset($_POST['uname']) ? htmlspecialchars($_POST['uname']) : ''; ?>"
                    placeholder="University Name" required=""></td>
            <td>Degree</td>
            <td><input type="text" class="textbox" name="degree"
                    value="<?php echo isset($_POST['degree']) ? htmlspecialchars($_POST['degree']) : ''; ?>"
                    placeholder="Degree" required=""></td>
            <td>Graduation Date</td>
            <td><input type="date" class="textbox" name="gdate"
                    value="<?php echo isset($_POST['gdate']) ? htmlspecialchars($_POST['gdate']) : ''; ?>"
                    placeholder="Date of Graduation" required=""></td>
            <td>GPA</td>
            <td><input type="text" class="textbox" name="gpa"
                    value="<?php echo isset($_POST['gpa']) ? htmlspecialchars($_POST['gpa']) : ''; ?>" placeholder="GPA"
                    required=""></td>
        </tr>
        <br />
        <th>Work Experiance</th>
        <tr>
            <td>Company Name</td>
            <td><input type="text" class="textbox" name="cname"
                    value="<?php echo isset($_POST['cname']) ? htmlspecialchars($_POST['cname']) : ''; ?>"
                    placeholder="Company Name" required=""></td>
            <td>Job Title</td>
            <td><input type="text" class="textbox" name="jtitle"
                    value="<?php echo isset($_POST['jtitle']) ? htmlspecialchars($_POST['jtitle']) : ''; ?>"
                    placeholder="Job" required=""></td>
            <td>Start Date</td>
            <td><input type="date" class="textbox" name="sdate"
                    value="<?php echo isset($_POST['sdate']) ? htmlspecialchars($_POST['sdate']) : ''; ?>"
                    placeholder="Start Date" required=""></td>
            <td>End Date</td>
            <td><input type="date" class="textbox" name="edate"
                    value="<?php echo isset($_POST['edate']) ? htmlspecialchars($_POST['edate']) : ''; ?>"
                    placeholder="End Date" required=""></td>
        <tr>
            <td>Job description</td>
            <td><input type="text" class="textbox" name="jdesc"
                    value="<?php echo isset($_POST['jdesc']) ? htmlspecialchars($_POST['jdesc']) : ''; ?>"
                    placeholder="Description" required=""></td>
        </tr>
        </tr>
        <tr>
            <td><button type="submit" class="but" name="submit">Submit</button></td>
        </tr>
    </table>
</form>