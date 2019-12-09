document.addEventListener("DOMContentLoaded", function(){
    var x = document.getElementById("nav");
    var y = document.getElementsByClassName("menu-rp");
    x.onclick = function()
    {
        y[0].classList.toggle("mn");
    }
},false)