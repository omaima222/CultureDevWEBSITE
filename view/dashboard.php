
<?php
    require_once '../controller/shared.php';

    if(!isset($_SESSION['Admin'])) header('Location: login.php');
    else{
        $admin = new Admin_controller();
        $admin = $admin->displayUser();
    }

    if(isset($_POST['logout'])){
        $logout = new Admin_controller();
        $logout->logout();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body class="dashbody">
   <div class="navBar">
      <section class="navBar_user">
        <img src="../assets/users pfp/<?=$admin['image']?>" alt="user pfp">
        <h1>Welcome <span><?= $admin['first_name']?></span></h1>
      </section>
      <h1  class="navBar_title">DASHBOARD</h1>
      <form action="" method="POST">
      <button type="submit" name="logout"><i class="bi bi-box-arrow-left fa-x3"></i>Log out</button>
      </form>
   </div>
   <section class="content">
        <div class="sideBar">
            <h1 onclick="post()">POSTS</h1>
            <h1 onclick="categories()">CATEGORIES</h1>
            <h1 onclick="statics()">STATISTICS</h1>
        </div>
        <section class="postSection" id="postSection">
            <section>
                <?php if (isset($_SESSION['post'])) { ?>
                    <div class="saved"><?= $_SESSION['post']; ?></div>
                <?php }
                unset($_SESSION['post']); ?>
            </section>
            <section class="tableHead">
                <h1>POSTS</h1>
                <div class="searchBar">
                    <form action="" method="POST">
                        <label for="search">SEARCH : </label>
                        <input type="text" name="searchTitle" placeholder="By title or Category">
                        <button name="searchButton" class="searchButton"><i class="bi bi-search fa-1x"></i></button>
                    </form>
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
                            if(isset($_POST['searchButton'])) $post = $post->search();
                            else $post = $post->get();
                            foreach( $post as $post){
                                if(strlen($post['description']) > 30){
                                    $desc = substr($post['description'],0,30).' ...';
                                }else $desc = $post['description'];
                        ?>
                        <tr class="arow clickable " onclick="window.location='formPost.php?postId=<?=$post['post_id'];?>'">
                            <td><?= $post['post_id']; ?></td>
                            <td><img style="width:10rem;" class="rounded-3" src="../assets/covers/<?= $post['cover']; ?>" alt="cover"></td>
                            <td><?= $post['title']; ?></td>
                            <td title="<?= $post['description']; ?>"><?= $desc; ?></td>
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
        <section class="staticSection" id="staticSection"style="display: none;" >
            <?php
                $countPost = new Posts_controller();
                $countPost=$countPost->countit();

                $countCategorie = new Categories_controller();
                $countCategorie=$countCategorie->countit();

                $countUsers = new Admin_controller();
                $countUsers=$countUsers->countit();
            ?>
            <div class="cards">
                <h1>Posts total</h1>
                <div class="postsNum"><?=$countPost?></div>
            </div>
            <div class="cards">
                <h1>Developers total</h1>
                <div class="autorsNum"><?=$countUsers?></div>
            </div>
            <div class="cards">
                <h1>Categories total</h1>
                <div class="DautorsNum"><?=$countCategorie?></div>
            </div>
        </section>
   </section>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
