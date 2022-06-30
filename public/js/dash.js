
data();
function data()
 {
  $(document).ready(function()
     {       
     
     //localStorage.setItem("userid", "fa487e6a");
     var siteName, 
     username, 
     baseURL, 
     newEntrypassword, 
     password_id,
     userid;

     userid = $("#userid").val();
     //alert(userid)

     $.ajax({
         url : "/get_data",
         type : "POST",
         data : {
             userid : userid
          },
         success : function(res)
         {
             var len = JSON.parse(res)
             var template = "";
             for(elem in len)
             {
                 template += `
                 <div class="col-4 col-s-6 col-m-6">
                     <div class="p-5-10 p510">
                         <div class="border-bottom box-shadow1 b-r-10">
                             <div class="p-20-10" style="position: relative; display:block;">
                                 <div class="float-right c-pointer options-menu-btn" style="position: absolute; right: 10px;">
                                     <div class="bg-inherit b-n" id="open">
                                         <button onclick="openCurrent(event, '${len[elem]['password_id']}')" class="b-n c-pointer bg-inherit">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#5F6368"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>       
                                         </button>                    
                                         <div class="action-menu p-10 box-shadow2 b-r-8 hide" style="position: absolute;  right:30px; top:8px; width: 150px; background: rgb(255, 255, 255);">
                                             <p class="p-2-0">change password</p>
                                             <p class="p-2-0">Copy password</p>
                                             <p class="p-2-0">Remove</p>
                                         </div>
                                         <input type="text" name="" id="" value="12bskjdvgh8" class="w-10" style="position:absolute; opacity:0">
                                         <input type="text" name="" id="selectid" value="user_1234" hidden>
                                     </div>
                                 </div>
                                 <div style="display: grid; ">
                                     <div class="p-t-10 p-l-10 " style="display: flex; align-items: center;">
                                         <div class="h-40 w-40 b-r-50" style="background: rgb(139, 139, 139); display: grid; place-items: center;">
                                             <h1 class="f-s-18" style=" color: antiquewhite;">
                                                 
                                             </h1>
                                         </div>
                                         <div class="p-10">
                                             <div class="">
                                                 <p >${len[elem]['siteName']}</p>
                                                 <p>${len[elem]['username']}</p>
                                                 <p style=" line-break: auto;">
                                                     <a href="'.$dataqry[$key]['siteLink'].'"  target="_blank">${len[elem]['siteLink']}</a>
                                                 </p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="w-p-80 m-a">
                                     <div class="display-flex p-2-0" id="tooglepass" style="align-items: center;">
                                         <input type="text" name="" id="" value="${len[elem]['password']}" class="w-10" style="position:absolute; opacity:0;">
                                         <input readonly type="password" style="flex: 1;" id="savedPassword" class="f-s-17 b-n pass outline-none p-5-15 w-p-100 " value="${len[elem]['password']}">
                                         <img onclick="tooglePassword(event, '1')" id="savedPasswordImg"   class="w-20 m-r-10" style="filter:blur(1px); cursor: pointer;" src="http://127.0.0.1/shoetailor//kicks_files/svgs/eye-solid.svg">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 
                 `;
             }
             $("#diiiiiiiv").html(template);


         }
     });
     
    
 });
}
 function tooglePassword(evt, input)
 {
     var password = evt.currentTarget.parentElement.children[1], img;
     img = evt.currentTarget;

     if(password.type == "password")
     {
         img.src = "http://127.0.0.1/shoetailor//kicks_files/svgs/eye-slash-solid.svg"
         password.type = "text";
     }
     else
     {
         img.src = "http://127.0.0.1/shoetailor//kicks_files/svgs/eye-solid.svg";
         password.type = "password";
     }
 }
 function editDetails(id)
 {
     
     var templates ='';
     var xhr = new XMLHttpRequest();
     xhr.open(
         "POST", 
         "/edit", 
         true
         );
     xhr.onload = ()=>
     {
         if(xhr.readyState === XMLHttpRequest.DONE)
         {
             if(xhr.status === 200){
                 let templates = "";
                 let data = JSON.parse(xhr.responseText);
                 templates += `
                 <div class="name-place display-flex">
                     <div class="Firstname col-6 ">
                         <div class="b-one p-5-15 m-t-5 ">
                             <input type="text" class="b-n outline-none p-10-15 w-p-100" placeholder="Site Name" id="siteName" value="${data['siteName']}">
                         </div>
                     </div>
                     <div class="Lastname col-6 ">
                         <div class="b-one p-5-15 m-t-5">
                             <input type="text" class="b-n outline-none p-10-15 w-p-100" placeholder="Your Username/ Email" id="username"  value="${data['username']}">
                         </div>
                         <input type="text" id="userid" hidden value="${data['userid']}">
                     </div>
                 </div>
                 <div class="b-one p-5-15 m-t-10 ">
                     <input type="text" id="baseURL"  placeholder="https://www.google.com" class="f-s-17 color_fade b-n outline-none p-10-15 w-p-100"   value="${data['siteLink']}">
                 </div>
                 <input type="text" id="password_id" class="f-s-17 b-n outline-none p-10-15 w-p-100" hidden  value="${data['password_id']}">

                 <div class="b-one p-5-15 m-10-0 display-flex" style="align-items: center;">
                     <input type="test" style="flex: 1;" id="newEntrypassword" placeholder="Password" class="f-s-17 b-n pass outline-none p-10-15 w-p-100"  value="${data['password']}">
                 </div>                       
                 `;        
                 var div = document.querySelector(".d");
                 div.innerHTML = templates;
                 console.log(templates); 
             }
         }
     }
     xhr.setRequestHeader(
         "Content-type", 
         "application/x-www-form-urlencoded"
         );
     xhr.send("id="+id);
 }
 var changePasswordForm, changePasswordFormDiv, changePasswordFormDivBtn, close, blur_style;

 changePasswordFormDivBtn = document.querySelector("#changePasswordFormDivBtn");
 changePasswordFormDiv = document.querySelector("#changePasswordFormDiv");
 changePasswordForm = document.querySelector("#changePasswordForm");

 blur_style = document.querySelector(".blur");

 
 close = document.querySelector("#close");
 close.addEventListener("click", ()=>
 {
     changePasswordFormDiv.classList.add("hide");
     blur_style.classList.remove("blur-style");
 });

 blur_style = document.querySelector(".blur");

 changePasswordForm.addEventListener("submit", (e)=>
 {
     e.preventDefault()
 });


 changePasswordFormDivBtn.addEventListener("click", ()=>
 {

     $(document).ready(function()
     {
         var siteName, password_id , username, baseURL, newEntrypassword, userid;

         siteName = $("#siteName").val();
         username = $("#username").val();
         baseURL = $("#baseURL").val();
         newEntrypassword = $("#newEntrypassword").val();
         userid = $("#userid").val();
         password_id = $("#password_id").val();

         //alert("\nsiteName = "+ siteName + "\nusername =" + username + "\nbaseURL =" + baseURL + "\nnewEntrypassword = "+newEntrypassword);

         $.ajax({
             url : "./php/update.php",
             type : "POST",
             data : 
             {
                 siteName : siteName, 
                 username : username,
                 baseURL : baseURL,
                 newEntrypassword : newEntrypassword,
                 userid : userid,
                 password_id : password_id
             },
             success : function(res)
             {
                 data();
                 popupConsole("Changed successfully");
                 setTimeout(()=>
                 {
                     changePasswordFormDiv.classList.add("hide")
                     blur_style.classList.remove("blur-style");
                 },2000);
                
             }
         });
     });
    
 });
function openCurrent(evt, targetid)
{
    var status;
    var currentTargetMenu = evt.currentTarget.parentElement.children[1];

    if(currentTargetMenu.classList.contains("hide")){
         status = 0;
     }
    if(status == 0){
         currentTargetMenu.classList.remove("hide");
         status = 1;
    }
    else{
         currentTargetMenu.classList.add("hide");
         status = 0;
    }

     var change  = evt.currentTarget.parentElement.children[1].children[0];
     var copy  = evt.currentTarget.parentElement.children[1].children[1];
     var remove  = evt.currentTarget.parentElement.children[1].children[2];
    
     remove.addEventListener("click", function(){

        let confirm = popup("Are you sure you wanna delete this?");
         currentTargetMenu.classList.add("hide");
         
         popupConsole("Successfully removed")
         
         var xhr = new XMLHttpRequest();

         xhr.open(
             "POST", 
             "./php/delete.php", 
             true
             );
         xhr.onload = ()=>{
             if(xhr.status === 200)
             {
                 var data = xhr.responseText;
                 popupConsole(data);
                 data();
                 console.log(data)
             }
         }
         xhr.setRequestHeader(
             "Content-type", 
             "application/x-www-form-urlencoded"
             );
         xhr.send("id="+targetid);
         
     });
     change.addEventListener("click",function()
     {
         editDetails(targetid); 

         currentTargetMenu.classList.add("hide");
         changePasswordFormDiv.classList.remove("hide");
         blur_style.classList.add("blur-style");
     })
    
     copy.addEventListener("click",function(event)
     {
         currentTargetMenu.classList.add("hide");
         console.log(
             event.
             target.
             parentElement.
             parentElement.
             parentElement.
             parentElement.
             parentElement.
             children[0].
             children[2].
             children[0].
             children[0])
        
         event.target.parentElement.parentElement.parentElement.parentElement.parentElement.children[0].children[2].children[0].children[0].select();
         if(document.execCommand("copy"))
         {
             popupConsole("Copied successfully")
         }
     });
}

function popupConsole(data)
{
     var popup  = document.querySelector("#popup");
     popup.classList.remove("hide");

     var popupdata = document.querySelector("#popup p");
     popupdata.innerHTML = data;
     
     setTimeout(()=>
     {
         popup.classList.add("hide");
     },2000);
}