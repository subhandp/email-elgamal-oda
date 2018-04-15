
<div class="container">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/login.css">
    <script type="text/javascript" src="assets/bootstrap/js/login.js"></script>
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="images/user.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="post" action="#" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
           
        </div><!-- /card-container -->
    </div>


    <?php 
        session_start();
        unset($_SESSION['email']);
        unset($_SESSION['pass']);
        require_once 'vendor/autoload.php';
        Eden::DECORATOR;

        if (isset($_POST['email']) && isset($_POST['pass'])) {
            $imap = eden('mail')->imap(
                'imap.gmail.com', 
                $_POST['email'], 
                $_POST['pass'], 
                993, 
                true);


            try {
              $imap->setActiveMailbox('INBOX');
              $_SESSION['email'] = $_POST['email'];
              $_SESSION['pass'] = $_POST['pass'];  
              header('Location: inbox.php');
              exit();
            } catch (Exception $e) {
               echo '<script type="text/javascript">alert("Password/Username salah!");</script>';
            }

        }

            

     ?>

    <!-- /container -->