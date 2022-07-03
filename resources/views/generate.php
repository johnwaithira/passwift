
<?php

use Waithira\Passwift\app\core\Application;
    use Waithira\Passwift\Templates\Form;
    
    Application::$app->router->resource('views.layouts.auth.navigation.php');

?>
<div id="password-div " class="p-t-30">
    <div class="col-4 m-a">
        <div class="box-shadow1">
            <div class="p-20">
                <h2>Passwift Password maker</h2>
            </div>
            <div class="p-20">
                <div class="p-2-0">
                    <?php echo $form = Form::field('password')->placeholder("Generated password")?>
                </div>
                <div class="p-2-0">
                    <?php  echo  Form::field('passwordLength')->number()->placeholder("Password Length")?>
                </div>
                <div class="p-20-0">
                    <button class="p-10-15 b-n bg-inherit b-one" id="generateBtn">Generate</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var passwordLen = document.getElementById("passwordLength");
    var passwordArea = document.getElementById("password");
    var generateBtn =  document.getElementById("generateBtn");


    var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    generateBtn.addEventListener("click", ()=>{
        generate(passwordLen.value)
    })

    
    function generate(passLen)
    {
        var password = ""
        for(var i = 0; i<passLen; i++)
        {
            var number = Math.floor(Math.random() * chars.length);
            password += chars.substring(number, number +1)

        }
        var pwd = document.querySelector("#password")
        pwd.value = password
    }
</script>