<?php 

session_start();
include 'config.php';

error_reporting(0);

if(isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNb = $_POST['phoneNb'];
    $pw = md5($_POST['pw']);
    $confirmpw = md5($_POST['confirmpw']);

    if($pw == $confirmpw) {
        $sql = "SELECT * FROM MEMBERS WHERE email = '$email' ";
        $result = mysqli_query($conn, $sql);
        if( !( $result->num_rows > 0 ) ) {
            $sql = "INSERT INTO MEMBERS (password, firstName, lastName, email, mobile) VALUES ('$pw', '$firstName', '$lastName', '$email', '$phoneNb'); ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $sql = "SELECT * FROM MEMBERS WHERE email='$email' AND password='$pw' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row['id'];
                echo "<script>window.location.href='studentsHomePage.php';</script>";
                $firstName = "";
                $lastName = "";
                $email = "";
                $phoneNb = "";
                $pw = "";
                $confirmpw = "";
            } else {
                echo "<script> alert('Woops! Something Went Wrong.') </script>";
            }
        }else {
            echo "<script> alert('Email Already Exists.') </script>";
        }
    } else {
        echo "<script> alert('Passwords Not Matching.') </script>";
    }
}
?>

<html>

    <head>
        <title> Register now! </title>
        <link href="../stylesheets/signing.css" type="text/css" rel="stylesheet"/>
    </head>

    <body class="signPg">

        <!-- Header -->  
        <div class="signHeader">
            <a href="signin.php"> Sign in </a>
            <a> Sign up</a>  
        </div>
        <svg width="104" height="6" viewBox="0 0 104 6" id="underlineUp" xmlns="http://www.w3.org/2000/svg">
                <rect width="104" height="6" fill="#D9EAD3"/>
        </svg>
        
        <!-- Sign Up Form -->
        <div class="signBody">
            <a id="signupSign"> Sign up </a>
            <br>
            <a id="signupSlogan">For librarian, student or any book lover!</a>
        </div> 
        
        <form method="POST" class="signBody">
            <table>
                <tr>
                    <td>
                        <pre><label>First Name:</label>
<input type="text" name="firstName" required="required" value="<?php echo $firstName; ?>">
                        </pre>  
                    </td>
                    <td>
                        <pre><label>Last Name:</label>
<input type="text" name="lastName" required="required" value="<?php echo $lastName; ?>">
                        </pre>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <pre><label>Email:</label>
<input type="email" name="email" required="required" value="<?php echo $email; ?>">
                        </pre>  
                    </td>
                    <td>
                        <pre><label>Phone Number:</label>
<input type="text" name="phoneNb" required="required" value="<?php echo $phoneNb; ?>">
                        </pre>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <pre><label>Password:</label>
<input type="password" name="pw" required="required" value="<?php echo $_POST['pw']; ?>">
                        </pre>  
                    </td>
                    <td>
                        <pre><label>Confirm Password:</label>
<input type="password" name="confirmpw" required="required" value="<?php echo $_POST['confirmpw']; ?>">
                        </pre>
                    </td>
                </tr> 
                <tr>
                    <td colspan="2" id="cbc">
                        <input type="checkbox" id="cb" required="required"> 
                        <label>I agree to all the 
                            <a class="tcc">Terms</a> 
                            and 
                            <a class="tcc">Privacy Policy</a>
                        </label>
                    </td>
                </tr> 
                <tr id="submitBtnRow">
                    <td colspan="2">
                        <br>
                        <br>
                        <button type="submit" name="submit" value="Sign up" id="submitBtn"> Create Account </button>
                    </td>
                </tr>
            </table>
        </form>
    </body>

    <!-- Footer -->
    <footer class="signFooter">
        <img src="../images/footer.png" alt="Copyright" width="100%">
    </footer> 

</html>