
<?php
    require_once '../controller/shared.php';

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
            <h1 onclick="post()">POSTS</h1>
            <h1 onclick="categories()">CATEGORIES</h1>
            <h1 onclick="statics()">STATISTICS</h1>
        </div>
        <section class="postSection" id="postSection" >
            <section class="tableHead">
                <h1>POSTS</h1>
                <div class="searchBar">
                    <label for="search">SEARCH : </label>
                    <input type="text" name="search">
                </div>
                <button class="addButton" onclick="window.location='formPost.php'">ADD</button>
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
                        <?php                            
                            $post = new Posts_controller();
                            $post = $post->get();
                            foreach( $post as $post){
                        ?>
                        <tr class="arow clickable" onclick="window.location='formPost.php?postId=<?=$post['post_id'];?>'">
                            <td><?= $post['post_id']; ?></td>
                            <td>Cover</td>
                            <td><?= $post['title']; ?></td>
                            <td><?= $post['description']; ?></td>
                            <td><?= $post['name']; ?></td>
                            <td><?= $post['first_name']; ?> <?= $post['last_name']; ?></td>
                            <td><?= $post['tag']; ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
            </table>
        </section>
        <section class="categorySection" id="categorySection" style="display: none;">
            <section>
                <?php if (isset($_SESSION['category'])) { ?>
                    <div class="saved"><?= $_SESSION['category']; ?></div>
                <?php }
                unset($_SESSION['category']); ?>
            </section>
            <section class="tableHead">
              <h1>CATEGORIES</h1>
              <button class="addButton"  onclick="window.location='formCategory.php'">ADD</button>
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
                            $category = new Categories_controller();
                            $category=$category->get();
                            foreach($category as $category){
                        ?>
                        <tr class="arow clickable " id="tableRow" onclick="window.location='formCategory.php?categoryId=<?=$category['id'];?>';">
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
