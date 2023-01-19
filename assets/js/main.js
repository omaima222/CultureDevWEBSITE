



  let updateCategory= document.getElementById("updateCategory");
  let deleteCategory= document.getElementById("deleteCategory");
  let saveCategory= document.getElementById("saveCategory");


function upAndDelete(){
    window.location='addCategory.php';
    console.log(saveCategory);
    saveCategory.style.display="none";
    deleteCategory.style.display="flex";
    saveCategory.style.display="flex";
}