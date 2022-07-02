

<title>Sign up | Passwift</title>
<?php
    use Waithira\Passwift\app\core\Application;
    use Waithira\Passwift\app\Http\CSRF;
    use Waithira\Passwift\Templates\Form;

?>
<style>

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
            <?php $form = Form::begin('','',[])?>
                 <div class="p-t-20 p-l-20 p-r-20" >
                    <div class="form">
                        <h2 style="color: #1c1e21;" class="f-s-24 c-black text-center">Create a new account</h2>
                        <p class="text-center">It's simple and easy</p>
                    </div>
                </div>
                <div class="p-t-20 p-l-20 p-r-20  display-flex" >
                    <div class="Firstname col-6 ">
                        <?php echo $form::field('firstname')->placeholder("Firstname");?>
                    </div>
                    <div class="Lastname col-6 ">
                        <?php echo $form::field('surname')->placeholder("Surname");?>
                    </div>
                </div>
                <?php CSRF::csrf_token();?>
                <div class="p-3-20">
                    <?php echo $form::field('emaill')->placeholder("Enter your email");?>
                </div>

                <div class="p-3-20">
                    <?php echo $form::field('password')->password()->placeholder("New password");?>
                </div>

                <div class="p-3-20">
                    <?php echo $form::field('country');?>
                </div>


                <div class="p-l-20 p-t-10 p-r-20  p-b-20 w" style="">
                    <div class="">
                        <button type="submit" id="createBTN" class="b-n p-10-18 w-p-100 b-r-6 f-w-800 f-s-16"style="background:#21d0dbed; color:white;">Create Account</button>
                    </div>
                </div>
            <?php $form::end()?>    
                <div class="p-l-20 p-r-20 p-b-30">
                    <div class="text-center links">
                        <p>Have an account? <a href="/login">Login</a></p>
                    </div>
                </div>
           </div>
    </div>
</div>
<p></p>


<script src="/js/jQuery.js"></script>


<script>
    var form = document.getElementById("form"),
    button = form.querySelector("button"),
    firstname = form.querySelector("#firstname"),
    surname = form.querySelector("#surname"),
    email = form.querySelector("#email"),
    counrty = form.querySelector("#country"),
    pwd = form.querySelector("#password");

    form.addEventListener("click", (e)=>{
       e.preventDefault()
    })

    button.addEventListener("click", ()=>{
        $(document).ready(function(){
            var firstname = $("#firstname");
            var surname = $("#surname");
            var email = $("#email");
            var password = $("#password");
            var country = $("#country");
            var token = $("#token");

            var inputs = $("input");
           for(var i = 0; i< inputs.length; i++)
           {
              if(inputs[i].value.length == 0)
              {
                    $("#"+ inputs[i].getAttribute("id")).css({
                        'border' : '1px solid #fb2b2b'
                    })
              }else
              {
                    $("#"+ inputs[i].getAttribute("id")).css({
                        'border' : '1px solid #1c1c2467'
                    })
              }
           }

           if(firstname.val().length > 0 && password.val().length > 0 && surname.val().length > 0 && country.val().length > 0)
           {
            $.ajax({
                type: 'post',
                url :'/user/signup',
                data : {
                    firstname : firstname.val(),
                    surname : surname.val(),
                    email : email.val(),
                    csrf_token : token.val(),
                    country : country.val(),
                    password : password.val()
                },
                success : function(res){
                    console.log(JSON.parse(res))                    
                }
            });
           }
        })
        
    })
</script>