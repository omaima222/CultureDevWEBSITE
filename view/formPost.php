<?php
    require_once '../controller/shared.php';
    $post = new Posts_controller();
    $post = $post->add();

    $deleteit = new Posts_controller();
    $deleteit = $deleteit->delete();

    $updateit = new Posts_controller();
    $updateit = $updateit->update();
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
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <title>Document</title>
</head>
<body class="allmodals">
<form  method="POST" id="postForm" enctype="multipart/form-data">
        <?php
          if(isset($_GET['postId'])){
             $OnePost = new Posts_controller();
             $OnePost = $OnePost->getOne();
             $title=$OnePost["title"];
             $tag=$OnePost["tag"];
             $description=$OnePost["description"];
             $category=$OnePost["category_id"];
             $content=$OnePost["content"];

          }else {
            $title = " ";
            $tag=" ";
            $description=" ";
            $category=" ";
            $content=" ";
          }
        ?>
        <div class="formHeader">
            <h1>Add Post</h1>
            <a href="dashboard.php">X</a>
        </div>
        <div class="formBody postform">
            <div class="separate">
                <div>
                    <section>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="postTitle" value="<?=$title?>">
                        <div style="background-color: #f0abab;" class="mt-1 rounded-pill text-center" id="titleError"></div>
                    </section>
                    <section>
                        <label for="cover">Cover</label>
                        <input type="file" name="cover" accept=" .jpg, .png, .jpeg">
                    </section>
                    <section>
                        <label for="description">Description</label>
                        <textarea type="text" name="description" id="postDesc" ><?=$description?></textarea>
                        <div style="background-color: #f0abab;" class="mt-1 rounded-pill text-center" id="descError"></div>
                    </section>
                    <section>
                        <label for="tag">Tag</label>
                        <input type="text" name="tag" id="postTag" value="<?=$tag?>">
                        <div style="background-color: #f0abab;" class="mt-1 rounded-pill text-center" id="tagError"></div>
                    </section>
                    <section>
                        <label for="category_id">Category</label>
                        <select class="customSelect" name="category_id" id="category_id">
                            <option selected disabled value="">Please select</option>
                            <?php
                                $category = new Categories_controller();
                                $category = $category->get();
                                foreach($category as $category){
                            ?>
                            <option class="text-black"  value=<?= $category['id'] ?> ><?= $category['name'] ?></option>
                            <?php } ?>
                        </select>
                    </section>
                </div>
                <div>
                    <section>
                        <label for="content" class="mb-2">Content</label>
                        <textarea name="content" id="postContent"><?=$content?></textarea>
                    </section>
                </div>
           </div>
        </div>
        <div class="formFooter">
           <button type="submit" name="savePost" id="savePost">Save</button>
           <button type="submit" name="deletePost" id="deletePost" >Delete</button>
           <button type="submit" name="updatePost" id="updatePost" >Update</button>
        </div>
    </form>
</body>
</html>
<script src="../assets/tinymce/tinymce.min.js"></script>
<script src="../assets/js/main.js"></script>