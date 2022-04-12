<?php 
    $title = "Contact Me";
    include 'header.php';
?>    

<?php
$location = "index.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['firstname']) && 
        isset($_POST['lastname']) && 
        isset($_POST['email']) &&
        isset($_POST['subject']) && 
        isset($_POST['message']) 
      ){
        $firstname =  $_POST['firstname'];
        $lastname  =  $_POST['lastname'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $contact->insert($firstname,$lastname,$email,$subject,$message);
        header("location:$location");
    }    
}

if ($user->is_login()){
    $hidden = "hidden";
} else {$hidden = "";}
?>

        <section>
            <div class="title">
                <h1><span class="fn">Contact</span> <span class="ln">me</span></h1>
                <p>This is how you can reach me...</p>
            </div>
            <div class="contact <?= $hidden; ?>">
                <div class="contact-form">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <div class="input50">
                                <input type="text" placeholder="First Name" name="firstname" required/>
                            </div>
                            <div class="input50">
                                <input type="text" placeholder="Last Name"  name="lastname" required/>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="input50">
                                <input type="email" placeholder="Email" name="email" required/>
                            </div>
                            <div class="input50">
                                <input type="text" placeholder="Subject" name="subject" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input100">
                                <textarea placeholder="Message" name="message" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input100">
                                <input type="submit" value="Send" />
                            </div>
                        </div>                 
                    </form>                                           
                </div>

                <div class="contact-info">
                    <div class="info-box">
                        <img src="images/address.png" class="contact-icon" alt="">
                        <div class="details">
                            <h4>Address</h4>
                            <p>Via Gandhi 7, Caselle di Sommacampagna, Verona Italia</p>
                        </div>
                    </div>
                    <div class="info-box">
                        <img src="images/email.png" class="contact-icon" alt="">
                        <div class="details">
                            <h4>Email</h4>
                            <a href="mailto:vasilacheorionut@gmail.com">vasilacheorionut@gmail.com</a>
                        </div>
                    </div>
                    <div class="info-box">
                        <img src="images/call.png" class="contact-icon" alt="">
                        <div class="details">
                            <h4>Call</h4>
                            <a href="tel:+393774851337">+39 377 485 1337</a>
                        </div>
                    </div>                                        
                </div>
            </div>

                        <div class="row">
                            <div class="input100">
                                <p>I have been contacted <?= $contact->been_contacted(); ?> times!                              
                                <?php if ($user->is_login()) : ?>
                                    <a href="logout.php" class="btn">Logout</a></p>                                                                                                            
                                    <?php
                                            $result_array = $contact->read();                                                                        
                                            echo "
                                            <div style='overflow-x: auto;'>
                                            <table>
                                                <tr>
                                                    <th>#</th>
                                                    <th>First Name</th>      
                                                    <th>Last Name</th>    
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>      
                                                </tr>                                            
                                            ";
                                            foreach ($result_array as $key) {
                                            echo "                                        
                                                <tr>
                                                    <td>". $key['id'] ."</td>
                                                    <td>". $key['firstname'] ."</td>
                                                    <td>". $key['lastname'] ."</td>
                                                    <td>". $key['email'] ."</td>
                                                    <td>". $key['subject'] ."</td>
                                                    <td>". $key['message'] ."</td>     
                                                </tr>";
                                            }
                                            echo "                                                   
                                            </table>
                                            </div>   ";
                                    ?>                                                              
                                <?php else : ?>
                                    <a href="login.php" class="btn btn-success">Login</a></p>
                                <?php endif; ?>                                                                
                            </div>
                        </div>                
        </section>

<?php include 'footer.php';?>    