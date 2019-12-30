document.addEventListener("DOMContentLoaded", function()
{
    var x = document.getElementById("btn_menu");
    var y = document.getElementsByClassName("menu_rp")
    x.onclick = function()
    {
        y[0].classList.toggle("togg_rp");
    }
    
    var a = document.getElementById("cl_news");
    var b = document.getElementsByClassName("slide");
    a.onclick = function()
    {
        b[0].classList.add("slide_none");
    }
 
}, false)
