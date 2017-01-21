<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p><a href="index.php?ctrl=Admin&act=Add">добавить новость</a></p>
<?php foreach ($item as $vol): ?>
    <h1><a href="index.php?<?php echo 'ctrl=News&act=One&id=' . $vol->id_news; ?>"><?php echo $vol->header; ?></a></h1>
    <p><?php echo $vol->text; ?></p>
    <p><a href="index.php?<?php echo 'ctrl=Admin&act=Edit&id=' . $vol->id_news; ?>">редактировать новость</a></p>
    <p><a href="index.php?<?php echo 'ctrl=Admin&act=Delete&id=' . $vol->id_news; ?>">удалить новость</a></p>
<?php endforeach; ?>
</body>
</html>