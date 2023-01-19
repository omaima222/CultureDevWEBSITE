



  let updateCategory= document.getElementById("updateCategory");
  let deleteCategory= document.getElementById("deleteCategory");
  let saveCategory= document.getElementById("saveCategory");
   
  let postSection = document.getElementById("postSection");
  let categorySection = document.getElementById("categorySection");


function upAndDelete(){
    window.location='addCategory.php';
    console.log(saveCategory);
    saveCategory.style.display="none";
    deleteCategory.style.display="flex";
    saveCategory.style.display="flex";
}


function categories(){
  postSection.style.display="none";
  categorySection.style.display="block";
}

function post(){
  postSection.style.display="block";
  categorySection.style.display="none";
}
