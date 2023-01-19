
<?php
    require_once '../controller/Admin_controller.php';

    if(!isset($_SESSION['Admin'])) header('Location: signup.php');
    else{
        $admin = new Admin_controller();
        $admin = $admin->displayUser();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/sass/main.css">
    <link href="../assets/css/vendor.min.css" rel="stylesheet" />
   	<link href="../assets/css/app.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body class="dashbody">
   <div class="navBar">
      <section class="navBar_user">
        <img src="../assets/users pfp/<?=$admin['image']?>" alt="user pfp">
        <h1>Welcome <span><?= $admin['first_name']?></span></h1>
      </section>
      <h1  class="navBar_title">DASHBOARD</h1>
   </div>
   <section class="content">
        <div class="sideBar">
            <h1>POSTS</h1>
            <h1>CATEGORIES</h1>
            <h1>STATISTICS</h1>
        </div>
        <section class="postSection" hidden>
            <section class="tableHead">
                <h1>POSTS</h1>
                <div class="searchBar">
                    <label for="search">SEARCH : </label>
                    <input type="text" name="search">
                </div>
                <button class="addButton">ADD</button>
            </section>
            <table class="table ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Autor</th>
                            <th>Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="arow clickable">
                            <td>Id</td>
                            <td>Cover</td>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Category</td>
                            <td>Autor</td>
                            <td>Tags</td>
                        </tr>
                    </tbody>
            </table>
        </section>
        <section class="categorySection">
            <section>
                <?php if (isset($_SESSION['categorySaved'])) { ?>
                    <div class="saved"><?= $_SESSION['categorySaved']; ?></div>
                <?php }
                unset($_SESSION['categorySaved']); ?>
            </section>
            <section class="tableHead">
              <h1>CATEGORIES</h1>
              <button class="addButton"  onclick="window.location='addCategory.php'">ADD</button>
            </section>
            <table class="table ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once '../controller/Categories_controller.php';
                            $category = new Categories_controller();
                            $category=$category->get();
                            foreach($category as $category){
                        ?>
                        <tr class="arow clickable " id="tableRow" onclick="window.location='addCategory.php?categoryId=<?=$category['id'];?>';">
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
            </table>
        </section>
   </section>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
