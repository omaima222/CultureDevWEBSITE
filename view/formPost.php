<?php
    require_once '../controller/shared.php';
    if(!isset($_SESSION['Admin'])) header('Location: login.php');

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
             $categoryid=$OnePost["category_id"];
             $content=$OnePost["content"];
          }else {
            $title = " ";
            $tag=" ";
            $description=" ";
            $categoryid=" ";
            $content=" ";
          }
        ?>
        <div class="formHeader">
            <h1>Add Post</h1>
            <a href="dashboard.php">X</a>
        </div>
        <div class="formBody postform" id="formPostBody">
            <div class="separate" id="theActuallInputs">
                <div>
                    <input type="text" name="idPostforLoop[]" hidden>
                    <section>
                        <label for="title">Title</label>
                        <input type="text" name="title[]" id="postTitle" value="<?=$title?>">
                        <div class="inputError" id="titleError"></div>
                    </section>
                    <section>
                        <label for="cover">Cover</label>
                        <input class="cover" type="file" name="cover[]" accept=" .jpg, .png, .jpeg">
                    </section>
                    <section>
                        <label for="description">Description</label>
                        <textarea type="text" name="description[]" id="postDesc" ><?=$description?></textarea>
                        <div class="inputError" id="descError"></div>
                    </section>
                    <section>
                        <label for="tag">Tag</label>
                        <input type="text" name="tag[]" id="postTag" value="<?=$tag?>">
                        <div class="inputError" id="tagError"></div>
                    </section>
                    <section>
                        <label for="category_id">Category</label>
                        <select class="customSelect text-white" name="category_id[]" id="category_id" required>
                            <option class="options" selected disabled value="">Please select</option>
                            <?php
                                $category = new Categories_controller();
                                $category = $category->get();
                                foreach($category as $category){
                            ?>
                            <option class="options" value="<?=$category['id']?>"  <?php echo $category['id']==$categoryid ? 'selected':'';?> ><?= $category['name'] ?></option>
                            <?php } ?>
                        </select>
                    </section>
                </div>
                <div>
                    <section>
                        <label style="margin-bottom: 1rem;" for="content" class="mb-2">Content</label>
                        <textarea name="content[]" id="postContent"><?=$content?></textarea>
                        <div  class="inputError" id="contentError"></div>
                    </section>
                </div>
           </div>
        </div>
        <div class="formFooter">
           <button type="submit" name="savePost" id="savePost" >Save</button>
           <button type="submit" name="addOneMore" id="addOneMore" >Add More</button>
           <button type="submit" name="deletePost" id="deletePost" style="display: none;" >Delete</button>
           <button type="submit" name="updatePost" id="updatePost" style="display: none;" >Update</button>
        </div>
    </form>
</body>
</html>

<?php
    if(isset($_GET['postId'])){
?>
<script>
    let  deletePost=document.getElementById("deletePost");
    let  updatePost=document.getElementById("updatePost");
    let  savePost=document.getElementById("savePost");
    let  addOneMore=document.getElementById("addOneMore");

    deletePost.style.display = "block";
    updatePost.style.display = "block";
    savePost.style.display = "none";
    addOneMore.style.display = "none";
</script>
<?php }?>

<script src="../assets/tinymce/tinymce.min.js"></script>
<script src="../assets/js/main.js"></script>
