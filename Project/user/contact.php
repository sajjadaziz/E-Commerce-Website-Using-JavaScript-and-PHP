<?php
require('header.php');
require('connection.php');
require('functions.php');
if(isset($_POST['submit']))
{
    $name=get_safe_value($con,$_POST['name']);
    $email=get_safe_value($con,$_POST['email']);
    $message=get_safe_value($con,$_POST['message']);
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into contact(name,email,message,dated) values('$name','$email','$message','$added_on')");
}
?>
<div class="container1">
    <h1> Contact Us</h1>
    <form method="post">
        <br><label for="Full-Name">First Name</label>
        <br><input style="width: 25rem; height: 2.5rem" type="text" id="name" name="name" placeholder="Your name..." required>
        <br><label for="Email">Email</label>
        <br><input style="width: 25rem; height: 2.5rem" type="text" id="email" name="email" placeholder="abc@gmail.com"required>
        <br><label for="subject">Message</label>
        <br><textarea style="width: 31.25rem; height: 3.75rem" id="message" name="message" placeholder="Write something..." style="height:12.5rem" required></textarea>
        <br><button type="submit" class="button" name="submit">Send</button>
    </form>
</div>
<?php
require('footer.php');
?>