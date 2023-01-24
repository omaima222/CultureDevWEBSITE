



  let postSection = document.getElementById("postSection");
  let categorySection = document.getElementById("categorySection");
  let staticSection = document.getElementById("staticSection");;



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

//____________________multiple inserts_________________________________//

// function addMore(){
//   let formPostBody=document.getElementById("formPostBody");
//   postForm.addEventListener('submit', (e)=>{
//       e.preventDefault();
//       let count=0;
//       count++;
//       for( $i=0;$i<count;$i++){
//         formPostBody.innerHTML += `
//         <div class="separate">
//             <div>
//                 <section>
//                     <label for="title">Title</label>
//                     <input type="text" name="title" id="postTitle">
//                     <div style="background-color: #f0abab;" class="mt-1 rounded-pill text-center" id="titleError"></div>
//                 </section>
//                 <section>
//                     <label for="cover">Cover</label>
//                     <input type="file" name="cover" accept=" .jpg, .png, .jpeg">
//                 </section>
//                 <section>
//                     <label for="description">Description</label>
//                     <textarea type="text" name="description" id="postDesc" ></textarea>
//                     <div style="background-color: #f0abab;" class="mt-1 rounded-pill text-center" id="descError"></div>
//                 </section>
//                 <section>
//                     <label for="tag">Tag</label>
//                     <input type="text" name="tag" id="postTag">
//                     <div style="background-color: #f0abab;" class="mt-1 rounded-pill text-center" id="tagError"></div>
//                 </section>
//                 <section>
//                     <label for="category_id">Category</label>
//                     <select class="customSelect text-white" name="category_id" id="category_id">
//                         <option selected disabled value="">Please select</option>
//                         <?php
//                             $category = new Categories_controller();
//                             $category = $category->get();
//                             foreach($category as $category){
//                         ?>
//                         <option class="text-black" value="<?=$category['id']?>"><?= $category['name'] ?></option>
//                         <?php } ?>
//                     </select>
//                 </section>
//             </div>
//             <div>
//                 <section>
//                     <label for="content" class="mb-2">Content</label>
//                     <textarea name="content" id="postContent"></textarea>
//                     <div style="background-color: #f0abab;" class="mt-1 rounded-pill text-center" id="contentError"></div>
//                 </section>
//             </div>
//         </div>`;
//       }
//   })
// }


//________________________________texteditor______________________________//

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

//____________________multiple inserts______________________//


  document.getElementById("addOneMore").addEventListener("click",(e)=>{
        e.preventDefault();
        let theActuallInputs=document.getElementById("theActuallInputs");
      
        let CopyPost = theActuallInputs.cloneNode(true);
    
        formPostBody.appendChild(CopyPost);

        console.log(CopyPost);
  }); 
