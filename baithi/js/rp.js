document.addEventListener("DOMContentLoaded", function()
{
    var x = document.getElementById("btn_menu");
    var y = document.getElementsByClassName("menu_rp")
    x.onclick = function()
    {
        y[0].classList.toggle("togg_rp");
    }
}, false)