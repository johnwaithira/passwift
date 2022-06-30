<h1>Passwift</h1>
<div id="password-div">
    <input type="text" id="password">
    <input type="text" id="passwordLength">
    <button id="generateBtn">Generate</button>
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
        alert(password)
    }
</script>