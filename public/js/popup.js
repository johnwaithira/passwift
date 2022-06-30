let element = document.querySelector("#popup");
function popuphide(){
    document.querySelector("#popup").style.display ="none";
    document.querySelector("#popup").style.animation = "zoom_popup_fade 0.7s"
    document.querySelector(".body").style.filter = "blur(0px)";
}
function popuptrue(){
    document.querySelector("#popup").style.display ="block";
    document.querySelector(".body").style.filter = "blur(2px)";

}