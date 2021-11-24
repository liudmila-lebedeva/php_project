<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form>
            <div class="emailBox">
                <label for="yourname" name="name">Your e-mail address</label><br>
                <input id="yourname" name="email" type="text" size="64" maxLength="64" required
                       placeholder="type your name, please"><br><br>
                <label for="emailAddress">Your e-mail address</label><br>
                <input id="emailAddress" name="email" type="email" size="64" maxLength="64" required
                       placeholder="username@beststartupever.com">
                <label for="subject">Subject</label><br><br>
                <input id="subject" name="subject" type="text" size="64" maxLength="64" required
                       placeholder="subject of your request">
            </div><br><br>

            <div class="messageBox">
                <label for="message">Request</label><br>
                <textarea id="message" cols="80" rows="8" required
                          placeholder="My shoes are too tight, and I have forgotten how to dance."></textarea>
            </div>
            <input type="submit" value="Send Request">
        </form>
    </body>
</html>
