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





        <section class="contact-form" section action="index.php" method="post"> <!--ссылается сам на себя-->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-5 text-center">Drop us a email</h2>
                    </div>

                    <div class="col-12">

                        <?php

                        
                        require __DIR__ . "/functions.php";

                        if (isset($_POST["submit"])) {
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $subject = $_POST["subject"];
                            $message = $_POST["message"];
                            
                            $errors = validation($_POST);

                            //не допускаем пустых полей от пользователя

                            

                            if (empty($errors)) {
                                send($name, $email, $subject, $message);
                            } else {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Incorrect fields data
                                </div>
                                <?php
                            }
                        }


//                   
                        ?>
                        <form action="index.php" method="post">
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
                                              placeholder="My shoes are too tight, and I have forgotten how to dance." class="form-control <?= $errors['message'] ?? "main" ?>" >I have a best idea!</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-main-md btn-success" type="submit" name="submit">Send message</button>
                                </div> 


                            </div>
                        </form>
                    </div>



                </div>
            </div>





        </section>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
