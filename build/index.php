<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AUX Form Challenge</title>

    <script type="text/javascript" src="//use.typekit.net/ric2xcj.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    
    <link href='http://fonts.googleapis.com/css?family=Kreon:300' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
    <script src="assets/js/lib/modernizr.js" type="text/javascript"></script>
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
            $emailTo = "yifan.zhangxu@freshtilledsoil.com";
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
                echo 'Oops, we encounter a problem.';
            }
        
        } else {
    ?>
        <header>
                <h1>Sign up for Whoo!</h1>
                <p>50 projects, 500 images, 10 videos, domain binding, and technical support.</p>
        </header>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <fieldset><span>1</span>
                <legend>First, name your portfolio</legend>
                <div class="graybox">
                    <label for="title">Portfolio title</label>
                    <input type="text" id="title" name="title" minlength="2" required />
            
                    <label for="address">Portfolio address</label>
                    <input type="url" id="address" name="address" minlength="2" required />
                </div> <!--graybox-->
            </fieldset>

            <fieldset><span>2</span>
                <legend>Now, enter your account details</legend>  
                
                <div class="graybox">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" minlength="2" required />
         
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" minlength="2" required />
                    <label for="email-note">NOTE: We'll never share your email, promise.</label>
    
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" minlength="5" required />
                    <label for="show_pass"><input type="checkbox" id="show_pass" name="show_pass">Show Password</label>    
                </div> <!--graybox-->
            </fieldset>

            <fieldset><span>3</span>
                <legend>Finally, enter your payment information</legend>

                <div class="graybox">
                    <label for="cardNumber">Card number</label>
                    <input type="text" id="cardNumber" name="cardNumber" minlength="13" required />
                    
                    <div id="selectCard">
                        <label for="cardType">Select your card type</label>
                        <select id="cardType" name="CardType" required />
                            <option>Card Type</option>
                            <option value="amex">American Express</option>
                            <option value="visa">VISA</option>
                            <option value="discover">Discover</option>
                            <option value="mastercard">Mastercard</option>
                        </select>
                    </div><!--selectCard-->

                    <div id="credit_img"></div>

                    <label for="cvvNumber">Security code
                        <input type="text" id="cvvNumber" name="cvvNumber" minlength="3" required />
                        <div id="security_img"></div>
                    </label>

                    <label for="expiration">Expiration date</label>
                    <select id="expirationMonth" name="expirationMonth" required />
                        <option>Month</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <select id="expirationYear" name="expirationYear" required />
                        <option>Year</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                    </select>

                    <div id="lock_img"></div>

                </div> <!--graybox-->
            </fieldset>

    
            <button type ="submit" name="send">Create your portfolio</button>
        

        </form>
    
    <?php
        }
    ?>

    <script src="assets/js/lib/jquery.js" type="text/javascript"></script>
    <script src="assets/js/lib/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/script.js" type="text/javascript"></script>
</body>
</html>
