<title>Login to Passwift</title>
<?php
    
    use Waithira\Passwift\app\core\Application;
    use Waithira\Passwift\Templates\Form;

?>
<style>
    .links{
        color: blue;
    }
    .links a{
       color: #1877f2;
       padding-left: 3px;
       font-size: 14px;
    }
    .links a:hover{
        text-decoration: underline;
        transition: 0.2s;
    }
</style>

<div class="p-20">
    <div class="col-4 col-m-6 col-s-8 m-a">
        <div class=" text-center p-20-0">
            <img class="w-150 m-a" src="https://johnwaithira.github.io/passwift/passwift-removebg-preview.png">

        </div>
        <div class="box-shadow b-r-6">
            <form id="form">
                <div class="p-20" >
                    <div class="form">
                    <h2 style="color: #1c1e21;" class="f-s-24 c-black text-center">Login to Passwift</h2>
                    </div>
                </div>
                <div class="p-10-20">
                    <input type="text" id="user" class="p-15-17 w-p-100 b-r-6" style="border: 1px solid #ccd0d5;" placeholder="Enter your email address">
                </div>

                <div class="p-l-20 p-r-20 p-b-10">
                    <input type="password" id="password" class="p-15-17 w-p-100 b-r-6" style="border: 1px solid #ccd0d5;" placeholder="Password">
                </div>
                <div class="p-l-20 p-r-20  p-b-20 w" style="">
                    <div class="">
                        <button type="submit" id="loginBTN" class="b-n p-10-18 w-p-100 b-r-6 f-w-800 f-s-16"style="background: #216fdb; color:white;">Login</button>
                    </div>
                </div>
                
          
        </form>
                <div class="p-l-20 p-r-20 p-b-30">
                    <div class="text-center links">
                        <a href="/account/identify">Forgotten account?</a>
                        <a href="/signup">Sign up for Passwift</a>
                    </div>
                </div>
           </div>
    </div>
</div>
<p></p>
<style>
    .red{
        background:red;
    }
</style>
<script src="/js/jQuery.js"></script>


<script>
    var form = document.getElementById("form"),
    button = form.querySelector("button"),
    user = form.querySelector("#user"),
    pwd = form.querySelector("#password");

    form.addEventListener("click", (e)=>{
       e.preventDefault()
    })

    button.addEventListener("click", ()=>{
        $(document).ready(function(){
            var usern = $("#user");
            var pwd = $("#password");
           if(usern.val().length == 0)
           {
            $("#user").css({
                'border' : '1px solid red'
            })
           }
           else{
            $("#user").css({
                'border' : '1px solid #1c1c2467'
            })
           }
           if(pwd.val().length == 0)
           {
            $("#password").css({
                'border' : '1px solid red'
            })
           }
           else{
            $("#password").css({
                'border' : '1px solid #1c1c2467'
            })
           }

           if(usern.val().length > 0 && pwd.val().length > 0)
           {
            $.ajax({
                type: 'post',
                url :'/user/login',
                data : {
                    user : usern.val(),
                    password : pwd.val()

                },
                success : function(res){
                    alert(res)                    
                }
            });
           }
        })
        
    })
</script>