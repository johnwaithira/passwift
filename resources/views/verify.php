<title>Verify Account</title>
<?php
    
    use Waithira\Passwift\app\Http\CSRF;
    use Waithira\Passwift\Templates\Form;
?>
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
                    <p class="p-10-0 text-center">Enter [OTP] code sent to your Email</p>
                </div>
            </div>
            <div id="Error"></div>
            <div class="p-10-20 display-flex" >
                <?php echo $form::field('email')->placeholder("Your email");?>
            </div>
            <?php CSRF::csrf_token();?>
            <div class="p-l-20 p-r-20 p-b-10">
                <?php echo $form::field('otp')->placeholder("OTP");?>
            </div>
            <div class="p-l-20 p-r-20  p-b-20 w" style="">
                <div class="">
                    <button type="submit" id="VerifyBTN" class="b-n p-10-18 w-p-100 b-r-6 f-w-800 f-s-16"style="background: #216fdb; color:white;">Login</button>
                </div>
            </div>


            </form>
            <div class="p-l-20 p-r-20 p-b-30">
                <div class="text-center links">
                    <a href="/signup">Sign up for Passwift</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/jQuery.js"></script>


<script>
    var form = document.getElementById("form"),
        button = form.querySelector("button"),
        email = form.querySelector("#email"),
        otp = form.querySelector("#otp");

    form.addEventListener("submit", (e)=>{
        e.preventDefault()
    })

    button.addEventListener("click", ()=>{
        $(document).ready(function(){
            var email = $("#email");
            var otp = $("#otp");
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

            if(otp.val().length > 0  && email.val().length > 0)
            {
                $.ajax({
                    type: 'post',
                    url :'/verify',
                    data : {
                        email : email.val(),
                        csrf_token : token.val(),
                        otp : otp.val()
                    },
                    success : function(res){
                        console.log((res))
                        if(res == "ok")
                        {
                            window.location.assign("/account/verify")
                        }
                        else
                        {
                            var html =  `
                                      <div class="p-l-20 p-r-20 p-t-10"">
                                            <div class="p-10-20"  style="background:#e34f4f; color: #e4e6eb">
                                                ${res}
                                            </div>
                                      </div>`;
                            $("#Error").html(html)

                            setTimeout(()=>{
                                $("#Error").html("")
                            }, 3000)
                        }
                    }
                });
            }
        })

    })
</script>