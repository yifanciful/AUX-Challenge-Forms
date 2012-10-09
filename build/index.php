<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AUX Form Challenge</title>

    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>

</head>

<body>

    <?php
        // if the form has been submitted, process it - otherwise, just display the form normally
        if(isset($_POST['send'])){
            
            // pull the name out of the submitted for
            $name = strip_tags($_POST['name']);
            
            // pull the email out of the submitted form
            $emailFrom = strip_tags($_POST['email']);
            
            // who you're sending the email to (probably change this)
            $emailTo = "apprentices@freshtilledsoil.com";
            $subject = "Submission";
            
            // inset information into the body of the email
            $body = "Name: ".$name."\n";
            $body .= "Email: ".$emailFrom."\n";
            
            // set the email headers
            $headers = "From: ".$emailFrom."\n";
            $headers .= "Reply-To:".$emailFrom."\n";    
            
            $success = mail($emailTo, $subject, $body, $headers);
            
            // this is the message that gets displayed after submission
            if ($success){
                echo 'sent';
            } else {
                echo 'not sent';
            }
        
        } else {
    ?>
        <header>
                <h1>Sign up for Whoo!</h1>
                <p>50 projects, 500 images, 10 videos, domain binding, and technical support.</p>
        </header>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <fieldset>
                <legend><span>1</span>First, name your portfolio</legend>
                <section>
                    <label for="title">Portfolio title</label>
                    <input type="text" id="title" name="title" minlength="2" />
            
                    <label for="address">Portfolio address</label>
                    <input type="url" id="address" name="address" minlength="2" />
                </section>
            </fieldset>

            <fieldset>
                <legend><span>2</span>Now, enter your account details</legend>  
                
                <section>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required />
         
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required />
                    <aside>NOTE: We'll never share your email, promise.</aside>
    
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required />
                    <input type="checkbox" id="show_pass" name="show_pass" value="1">
                    Show Password    
                </section>
            </fieldset>

            <fieldset>
                <legend><span>3</span>Finally, enter your payment information <a href="#">Use PayPal</a></legend>

                <section>
                    <label for="number">Card number</label>
                    <input type="text" id="number" name="cardnumber" required />
           
      
                    <label for="security">Security code</label>
                    <input type="text" id="security" name="security" required />
         
          
                    <label for="expiration">Expiration date:</label>
                    <select id="expiration_month" name="expiration_month">
                        <option value="">Month</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select id="expiration_year" name="expiration_year">
                        <option value="">Year</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    </select>
                </section>
            </fieldset>

    
            <button type ="submit" name="send">Create your portfolio</button>
        

        </form>
    
    <?php
        }
    ?>



</body>
</html>
