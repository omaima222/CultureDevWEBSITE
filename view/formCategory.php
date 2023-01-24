
<?php
    require_once '../controller/shared.php';
    if(!isset($_SESSION['Admin'])) header('Location: login.php');

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
           <button type="submit" name="deleteCategory" id="deleteCategory" style="display: none;">Delete</button>
           <button type="submit" name="updateCategory" id="updateCategory" style="display: none;">Update</button>
        </div>
    </form>
</body>
</html>
<script src="../assets/js/main.js"></script>

<?php
          if(isset($_GET['categoryId'])){
?>
<script>
        let  deleteCategory=document.getElementById("deleteCategory");
        let  updateCategory=document.getElementById("updateCategory");
        let  saveCategory=document.getElementById("saveCategory");

        deleteCategory.style.display = "block";
        updateCategory.style.display = "block";
        saveCategory.style.display = "none";
</script>
<?php }?>