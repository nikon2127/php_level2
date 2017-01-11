<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="index.php?act=Add">
    <p>заголовок: <input type="text" name="title" <?php if(!empty($_POST['title'])): ?>value="<?php echo $_POST['title']; ?>"<?php endif; ?>></p>
    <p>текст:<br>
    <textarea rows="25" cols="45" name="text"><?php if(!empty($_POST['text'])): echo $_POST['text']; endif; ?></textarea></p>
    <input type="submit">
</form>
</body>
</html>
