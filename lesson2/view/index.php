<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="view/style.css">
    <title>Главная</title>
</head>
<body>
<div>
<h1><a href="add.php">добавить новость</a></h1>
<?php foreach ($article as $vol): ?>
<div>
    <h2><a href="article.php?id=<?php echo $vol[0]; ?>"><?php echo $vol[1]; ?></a></h2>
    <p><?php echo $vol[2]; ?></p>
</div>
    <a href="edit.php?id=<?php echo $vol[0]; ?>">Редактировать новость</a>
    <a href="delete.php?id=<?php echo $vol[0]; ?>">Удалить новость</a>
    <hr>
<?php endforeach; ?>
</div>
</body>
</html>
