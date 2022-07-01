<title>Forgotten Password | Can't Login to Passwift</title>
<?php

use Waithira\Passwift\app\core\Application;

Application::$app->router->resource('views.layouts.auth.navigation.php');

?>
<style>

    #hr{
        border-bottom: 1px solid #ccd0d5;
    }
    input{
        outline: none;
        font-size: 17px;
        color: #8a8d91;
    }
    ::placeholder{
        font-size: 16px;
    }

    @media (max-width:500px) {
        .wrap{
            flex-wrap: wrap;
        }
        .cc{
            text-align: left !important;
        }
    }
    .account_info p{
        color: #333333;
        font-size: 15px;
    }

</style>
<div class="p-20">
    <div class="col-5 col-m-6 col-s-9 m-a">
        <div class="box-shadow b-r-6">
            <div class="p-20" id="hr">
                <div class="form">
                    <h2 style="color: #162643;" class="f-s-20 c-black">Reset Your Password</h2>
                </div>
            </div>
            <div class="p-20 wrap" id="hr" style="display: flex;">
                <div class="col-7 col-m-7 col-s-7">
                   <p class="p-10-0">
                        How do you want to receive the code to reset your password?
                   </p>
                    <div class="div p-6-0" style="display: flex;">
                        <input type="radio" checked name="verification" id="verification" class="verification">
                        <div class="account_info p-0-10">
                            <label for="verification" id="verify">
                                <p class="p-t-20">Send code via Email</p>
                                <p>waithi*****@gmiail.com</p>
                            </label>
                        </div>
                        

                    </div>
                </div>
                <div class="col-5 col-m-5 col-s-5 text-center cc" >
                    <div class="profile-pic ">
                        <div class="my-image">
                            <img class="w-60 h-60 b-r-100" src="/storage/profile.jpg" >
                        </div>
                        <div class="p-14-0">
                            <p class="f-s-15 p-3-0">
                                @johnwaithira
                            </p>
                            <p class="f-s-14" style="color: #606770;    line-height: 16px;">
                                Passwift user
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-15-20 w" style="justify-content: space-between; display: flex; align-items:center;">
                <div class="remember-password-to-login">
                    <p style="color: blue; cursor: pointer;" id="trigger-btn" class="f-s-13">Enter password to login</p>
                </div>
                <div class="btns text-right">
                    <button class="b-n p-7-18 b-r-6 f-w-800 f-s-16" style="background: #e4e6eb;">Not you?</button>
                    <button class="b-n p-7-18 m-l-5 b-r-6 f-w-800 f-s-16"style="background: #216fdb; color:white;">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>