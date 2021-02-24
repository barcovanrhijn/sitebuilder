<html>
    <head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/form.js"></script>
    </head>
<body>

<form id="form" action="form-post.php" method="post">
Name: <input type="text" name="name" value="<?php echo $name;?>"><br>
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail:<input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Comment: <textarea name="comment" rows="5" cols="40" value="<?php echo $comment;?>"></textarea>
<input type="submit">
</form>

</body>
</html>
