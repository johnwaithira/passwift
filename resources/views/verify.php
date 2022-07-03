<title>Verify Account</title>
<?php
use Waithira\Passwift\Templates\Form;
?>

<!--<div class="form col-4 m-a box-shadow1 b-r-2">-->
<!--    <div class="form-box p-t-50 p-l-10 p-r-10">-->
<!--        <div class="logo-box w-p-100 text-center">-->
<!--            <img src="/storage/passwift.png" style="width: 110px !important;">-->
<!--        </div>-->
<!--        <h1 class="color_fade p-10">Verify OTP</h1>-->
<!--        <form id="login_form" class="m-a p-10-0">-->
<!--            <div class="b-one p-1-15 m-10 b-r-30">-->
<!--                <input type="text" class="f-s-17 outline-none b-n w-p-100 p-10-15 text-center" id="otp" maxlength="6" placeholder="OTP">-->
<!--            </div>-->
<!--            <div class="loginbtn p-10-12">-->
<!--                <button class="p-10-25 bg-inherit b-one">Verify</button>-->
<!--            </div>-->
<!--        </form>-->
<!--        <div class="prompts p-10-15">-->
<!--            <div class="forgot-password p-b-20">-->
<!--                <p>Remember password ?<a href="./login.html" > Login</a></p>-->
<!--            </div>-->
<!--            <hr>-->
<!--            <div class="create-account p-10-0">-->
<!--                <p>Don't have an account ?<a href="./create.html"> Create</a></p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="p-20">
    <div class="col-4 col-m-6 col-s-8 m-a">
        <div class=" text-center p-20-0">
            <img class="w-150 m-a" src="/storage/passwift.png">
        </div>
        <div class="box-shadow b-r-6">
            <?php $form = Form::begin('','',[])?>
            <div class="p-20" >
                <div class="form">
                    <h2 style="color: #1c1e21;" class="f-s-24 c-black text-center">Verify OTP</h2>
                    <p>Enter [OTP] code sent to your Email</p>
                </div>
            </div>
            <div id="Error"></div>
            <div class="p-10-20 display-flex" >
                <?php echo $form::field('email')->placeholder("Enter your email");?>

            </div>
            <?php CSRF::csrf_token();?>
            <div class="p-l-20 p-r-20 p-b-10">
                <?php echo $form::field('password')->password()->placeholder("Password");?>

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
