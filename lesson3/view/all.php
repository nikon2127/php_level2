<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p><a href="index.php?act=Add">добавить новость</a></p>
<?php foreach ($news as $vol): ?>
    <h1><a href="index.php?<?php echo 'ctrl=News&act=One&id=' . $vol->id_news; ?>"><?php echo $vol->header; ?></a></h1>
    <p><?php echo $vol->text; ?></p>
    <p><a href="index.php">удалить новость</a></p>
<?php endforeach; ?>
</body>
</html>