<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php foreach ($news as $vol): ?>
    <h1><?php echo $vol->header; ?></h1>
    <p><?php echo $vol->text; ?></p>
<?php endforeach; ?>
</body>
</html>
