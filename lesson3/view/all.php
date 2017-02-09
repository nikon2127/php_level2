<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p><a href="/lesson3/admin/add">добавить новость</a></p>
<p><a href="/lesson3/admin/logs">просмотреть лог файл</a></p>
<?php foreach ($item as $vol): ?>
    <h1><a href="/lesson3/<?php echo 'news/one/' . $vol->id; ?>"><?php echo $vol->header; ?></a></h1>
    <p><?php echo $vol->text; ?></p>
    <p><a href="/lesson3/<?php echo 'admin/edit/' . $vol->id; ?>">редактировать новость</a></p>
    <p><a href="/lesson3/<?php echo 'admin/delete/' . $vol->id; ?>">удалить новость</a></p>
<?php endforeach; ?>
</body>
</html>