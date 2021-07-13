<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>

</head>
<body>
    <p> Fungsi get_tree() <br>
        <?php $tree = get_tree();
    echo json_encode($tree);
    ?>
    <p> Fungsi get_parents() <br>
    <?php $parent = get_parents('Derpina');
    echo json_encode($parent);
    ?>
    <p> Fungsi get_children() <br>
    <?php $children = get_children('Samantha');
    echo json_encode($children);
    ?>
    </p>
</body>
</html>