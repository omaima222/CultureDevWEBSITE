
<?php
    require_once '../controller/Categories_controller.php';
    $category = new Categories_controller();
    $category = $category->add();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/sass/main.css">
    <title>Document</title>
</head>
<body class="allmodals">
    <form action="" method="POST" calss="allForms">
        <div class="formHeader">
            <h1>Add Category</h1>
            <a href="dashboard.php">X</a>
        </div>
        <div>
            <section>
                <label for="category">Category name</label>
                <input type="text" name="category">
            </section>
            <button type="submit" name="saveCategory">Save</button>
        </div>
    </form>
</body>
</html>