
<?php
    require_once '../controller/Categories_controller.php';
    $category = new Categories_controller();
    $category = $category->add();

    $deleteit = new Categories_controller();
    $deleteit = $deleteit->delete();

    $updateit = new Categories_controller();
    $updateit = $updateit->update();
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
    <form calss="forms" action="" method="POST" >
        <?php
          if(isset($_GET['categoryId'])){
             $Onecategory = new Categories_controller();
             $Onecategory = $Onecategory->getOne();
             $name=$Onecategory["name"];

          }else $name = " ";
        ?>
        <div class="formHeader">
            <h1>Add Category</h1>
            <a href="dashboard.php">X</a>
        </div>
        <div class="formBody">
            <section>
                <label for="category">Category name</label>
                <input type="text" name="category" value="<?= $name?>">
            </section>
        </div>
        <div class="formFooter">
           <button type="submit" name="saveCategory" id="saveCategory">Save</button>
           <button type="submit" name="deleteCategory" id="deleteCategory" >Delete</button>
           <button type="submit" name="updateCategory" id="updateCategory" >Update</button>
        </div>
    </form>
</body>
</html>
<script src="../assets/js/main.js"></script>
