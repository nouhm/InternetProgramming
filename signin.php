<?php 
session_start();
include 'config.php';

error_reporting(0);

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pw = md5($_POST['pw']);

    $sql = "SELECT * FROM MEMBERS WHERE email='$email' AND password='$pw' ";
    $result = mysqli_query($conn, $sql);

    if( $result->num_rows > 0 ) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        if( $_SESSION['id'] == 1) {
            echo "<script>window.location.href='admin_dashboard.php';</script>";
        } else {
            // the link to which the page is redirected to
            echo "<script>window.location.href='studentsHomePage.php';</script>";
        }
        
        exit;
    } else {
        echo "<script> alert('Incorrect Email or Password.') </script>";
    }
}

?>

<html>
    
    <head>
        <title> Welcome back! </title>
        <link href="../stylesheets/signing.css" type="text/css" rel="stylesheet"/>
    </head>

    <body class="signPg">

        <div class="signHeader">
            <a> Sign in </a>
            <a href="signup.php"> Sign up</a>  
        </div>

        <svg width="104" height="6" viewBox="0 0 104 6" id="underlineIn" xmlns="http://www.w3.org/2000/svg">
                <rect width="104" height="6" fill="#D9EAD3"/>
        </svg>

        <div class="signBody">
            <br>
            <a id="signinSign"> Sign in </a>
            <br>
            <a id="signinSlogan">Sign in and start managing your library!</a>
        </div> 

        <form method="POST" class="signBody">

            <table>
                <tr>
                    <td>
                        <pre><label>Email:</label>
<input type="email" name="email" required="required" value="<?php echo $email; ?>">
                        </pre>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre><label>Password:</label>
<input type="password" name="pw" required="required" value="<?php echo $_POST['pw']; ?>">

                        </pre>
                    </td>
                </tr> 
                    <td id="fp">
                        <a id="forgotpw">Forgot password?</a>
                        <br>
                    </td>
                </tr> 
                <tr id="submitBtnRow">
                    <td>
                        <br>
                        <button type="submit" name="submit" value="submit" id="submitBtn"> Login </button>
                        <br> 
                        <br>
                    </td>
                </tr>
            </table>
        </form>

    </body>
    <br> <br> <br> <br> <br>
    <footer class="signFooter">
        <img src="../images/footer.png" alt="Copyright" width="100%">
    </footer> 
</html>