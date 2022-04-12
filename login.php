<?php
$title = "Login";
include "header.php";
?>
<?php
$location = "contact.php";

if ($user->is_login()){
  header("location:$location");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_SESSION["username"] =  $_POST['username'];
  $password = $_SESSION["password"] =  $_POST['password'];
  $username = $_SESSION["username"];
  $password = $_SESSION["password"];

  if ($user->login($username,  $password) == true) {
    header("location:$location");
  } else {
    $login_error = '<div class="alert alert-danger">
                <strong>Incorrect</strong> username or password.
              </div>      
          ';
  }
} else {
  $username = "";
  $password = "";
  $login_error = "";
  if ($user->is_login()) {
    header("location:$location");
  }
}
?>
        <section>
            <div class="title">
                <h1><span class="fn">Login</h1>
            </div>
            <div class="login">
                <div class="login-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <div class="input100">
                                <input type="email" class="form-control" id="username" name="username" placeholder="Email" value="<?= $username; ?>"  required />                                
                            </div>
                            <div class="input100">
                                <input type="password" id="password" name="password" placeholder="Password" value="<?= $password; ?>" required />
                            </div>
                        </div>                        
                            <input class="btn btn-success" type="submit" value="Login" />
                    </form>
                    <?php
                        echo '<br>' . $login_error;
                    ?>                    
                </div>
            </div>
        </section>
<?php
  include "footer.php";
?>