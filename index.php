<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title></title>
    </head>
    <body>

       
            <?php

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            require __DIR__ . "/libs/PHPMailer/Exception.php";
            require __DIR__ . "/libs/PHPMailer/PHPMailer.php";
            require __DIR__ . "/libs/PHPMailer/SMTP.php";

            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                
                
                //не допускаем пустых полей от пользователя

                $errors = [];

                if (empty($name)) {
                    $errors['name'] = "is-invalid";
                }
                if (empty($email)) {
                    $errors['email'] = "is-invalid";
                }
                if (empty($subject)) {
                    $errors['subject'] = "is-invalid";
                }
                if (empty($message)) {
                    $errors['message'] = "is-invalid";
                }


//                    $mail - переменная для работы с отправкой писем
                $mail = new PHPMailer(true);
//                    переменная mail будет использовать протокол smtp
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = 'cherubina2014@gmail.com';                     //SMTP username
                $mail->Password = 'bzhvfbzwcwkummja';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port = 465;

                $mail->setFrom('cherubina2014@gmail.com', "php project 2021"); //TCP port to connect to;
                $mail->addAddress("cherubina2014@gmail.com", 'Liudmila');     //Add a recipient, myself on this case

                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "php project 2021: $subject";
                $mail->Body = "Name: $name<br> E-mail: $email<br> Message: $message <br>";
 
                try {
                   $mail->send();
                    ?>
                    <div class="alert alert-success" role="alert">
                        Message sent
                    </div>
                    <?php
                } catch (Exception $exception) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $exception->getMessage() ?>
                    </div>
                    <?php
                }
            }
            ?>
            
            
            <form action="index.php" method="post"> <!--ссылается сам на себя-->
                <div class="row">

                    <div class="col-md-6 mb-2">
                        <label for="yourname" >Your e-mail address</label><br>
                        <input id="yourname" name="name" type="text" value="john" size="64" maxLength="64"
                               placeholder="type your name, please" class="form-control <?= $errors["name"] ?? "main" ?>" ><br>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="emailAddress">Your e-mail address</label><br>
                        <input id="emailAddress" name="email" type="email" value="john@mail.com" size="64" maxLength="64"
                               placeholder="username@beststartupever.com" class="form-control <?= $errors['email'] ?? "main" ?>" ><br><br>  
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="subject">Subject</label><br>
                        <input id="subject" name="subject" type="text" value="Best Idea" size="64" maxLength="64" 
                               placeholder="subject of your request" class="form-control <?= $errors['subject'] ?? "main" ?>" >
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="message">Request</label><br>
                        <textarea id="message" cols="80" rows="8" name="message" 
                                  placeholder="My shoes are too tight, and I have forgotten how to dance." class="form-control" <?= $errors['message'] ?? "main" ?>>I have a best idea!</textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-main-md btn-success" type="submit">Send message</button>
                    </div>

                </div>





            </form>
        



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
