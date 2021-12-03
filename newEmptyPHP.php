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
                        <?= $exception -> getMessage() ?>
                    </div>
                    <?php
                }
            }
            ?>

