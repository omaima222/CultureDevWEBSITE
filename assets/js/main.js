



  let updateCategory= document.getElementById("updateCategory");
  let deleteCategory= document.getElementById("deleteCategory");
  let saveCategory= document.getElementById("saveCategory");
   
  let postSection = document.getElementById("postSection");
  let categorySection = document.getElementById("categorySection");
  let staticSection = document.getElementById("staticSection");;

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
  staticSection.style.display="none";
}

function post(){
  postSection.style.display="block";
  categorySection.style.display="none";
  staticSection.style.display="none";
}

function statics(){
  postSection.style.display="none";
  categorySection.style.display="none";
  staticSection.style.display="block";
}


tinymce.init({
  selector: 'textarea#postContent',
  width: 700,
  height: 420,
  plugins:[
      'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
      'table', 'emoticons', 'template', 'codesample'
  ],
  toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
  'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
  'forecolor backcolor emoticons',
  menu: {
      favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
  },
  menubar: 'favs file edit view insert format tools table',
  content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
});



// ______________________POST FORM VALIDATION _________________________//

let postForm = document.getElementById("postForm");
let postTitle = document.getElementById("postTitle");
let postTag = document.getElementById("postTag");
let postDesc = document.getElementById("postDesc");
let postContent = document.getElementById("postContent");

let TitleError = document.getElementById("titleError");
let TagError = document.getElementById("tagError");
let DescError= document.getElementById("descError");
let contentError= document.getElementById("contentError");

postForm.addEventListener('submit', (e)=>{

  if(postTitle.value == ""){
    e.preventDefault();
    TitleError.innerText= "This input is required";
  }else if(postTitle.value.length < 5){
    e.preventDefault();
    TitleError.innerText= "This title is too short";
  }

  if(postTag.value == ""){
    e.preventDefault();
    TagError.innerText= "This input is required";
  }else if(postTag.value[0] != "#"){
    e.preventDefault();
    TagError.innerText= "A tag should start with a #";
  }else if(postTag.value.includes(" ")){
    e.preventDefault();
    TagError.innerText= "A tag should not contain any spaces";
  }


  if(postDesc.value == ""){
    e.preventDefault();
    DescError.innerText= "This input is required";
  }

  if(postContent.value == ""){
    e.preventDefault();
    contentError.innerText= "This input is required";
  }
})



