<?php
use Waithira\Passwift\app\core\Application;
    use Waithira\Passwift\app\Http\Format\Str\Ellipsis;
    use Waithira\Passwift\app\Http\Format\Str\Slug;
    use Waithira\Passwift\app\Http\Security\Auth\Session;
    use Waithira\Passwift\app\Http\Security\Hash;
    
    Application::$app->router->resources('layouts.navigation');
    
    foreach (Session::get('message') as $key => $value)
    { ?>
        <p><?php echo  $key . " : ". $value ?></p>
    <?php }
    Session::clean('message');    

?>
<div class="w-p-90 m-a">
    <div class="display-flex p-t-20">
        <h1>Download images</h1>
    </div>
     <div class="display-flex">
     <div class="m-20-10">
        <div class="p-10">
            <div class="box-shadow p-10">
                
                <form action="">
                    <input type="text" id="val" class="p-7-5 b-n b-one" placeholder="paste the file link" style="outline: none;">
                    <button class="p-7-5 b-one bg-inherit" id="dbtn">Download</button>
                </form>
                <div class="div">
                    <div class="w-300">
                        <img src="" id="bg" alt="Invalid link">
                    </div>
                </div>
            </div>
        </div>
     </div>
     </div>
</div>
<script>
    let btn = document.querySelector("#dbtn");
    let form = document.querySelector("form");
    let bg = document.querySelector("#bg");
    let inpt = document.querySelector("#val");

    bg.style.display = "none"

    form.addEventListener("submit", (e)=>{
        e.preventDefault()
    })

    inpt.addEventListener("keyup", function(event){
        bg.style.display = "block"
        let check = true
        let xhr = new XMLHttpRequest();
        xhr.open("GET", inpt.value, true) 
        xhr.onload = ()=>{
           if(xhr.status == 400)
           {   
                check = false
                bg.style.display = "none"
              
           }
        }
        xhr.send()
       if(check == true)
       {
            bg.src = inpt.value
            console.log(bg.src)
       }
       else
       {
            console.log("Resource not found")
            bg.style.display = "none"
       }
    })
    btn.addEventListener("click", function(){

       if(inpt.value != "")
       {

            bg.style.display = "block"
            bg.src = inpt.value

            download(inpt.value)
            setTimeout(() => {
                inpt.value = ""; 
                bg.style.display = "none"
            }, 2000);
       }
    })
    function download(source){
        const fileName = Math.floor(Math.random(1000)*9999) + "-"+ source.split('/').pop();
        var el = document.createElement("a");
        el.setAttribute('href','data:application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9;charset=utf-8', source);
        el.setAttribute("download", fileName);
        document.body.appendChild(el);
        el.click();
        el.remove();
    }
</script>