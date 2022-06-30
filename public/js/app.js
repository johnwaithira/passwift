$(document).ready(()=>{
    $("#auto_resize").on("input", function(){
        this.style.height = "auto"
        this.style.height = (this.scrollHeight) + "px"
    });
});

setTimeout(() => {
    document.querySelector(".fade_demo").style.display = "none";
}, 1000);
tooglepassword();
function tooglepassword()
{
    let img = document.querySelector("#passwordimg");
    let pwd = document.querySelector("#password");
    if(pwd.type == "password")
    {
        img.src = "/storage/eye-slash-solid.svg";
        pwd.type = "text";
    }
    else
    {
        pwd.type = "password";
        img.src = "/storage/eye-solid.svg";
    }
}