const img = document.getElementById("img");
const frame = document.getElementById("frame");
const artlike = document.getElementById("artbtnlike");
const artdislike = document.getElementById("artbtndislike");
const artgen = document.getElementById("artbtngenerate");
const counter = document.getElementById("counter");
const logged = document.getElementById("notlogged");
const count = 10;

function checkLogin()
{
    if(logged != null)
    {
        checkTime();

        if(count - parseInt(localStorage.getItem("count")) > 0)
        {
            getImgData();
            $(counter).text("Available pictures this hour: " + (count - parseInt(localStorage.getItem("count"))));
        }
        else
        {
            $(frame).empty();
            $(frame).append('<div class="alert fs-2 alert-danger px-5 py-3 mt-3" role="alert">You have already used all free generations this hour! Wait next hour or login/register for free!</div>');
        }
    }
    else
    {
        getImgData();
    }
    console.log(parseInt(localStorage.getItem("count")));
    console.log(parseInt(localStorage.getItem("time")));
}

function checkTime()
{
    if(parseInt(localStorage.getItem("time")) != new Date().getMinutes())
    {
        localStorage.setItem("time", new Date().getMinutes());
        localStorage.setItem("count", 0);
    }
    localStorage.setItem("time", new Date().getMinutes());
}

function getImgData()
{
    $.ajax({
        url: "https://api.unsplash.com/photos/random/?client_id=cCzgrjU_SMWXvFotwKRir03Epa_jymVHCMFquwLa41w",
        header: {
            Authorization: "Client-ID cCzgrjU_SMWXvFotwKRir03Epa_jymVHCMFquwLa41w"
        },
        method: "GET",
        success: function(response){
            var imageUrl = response.urls.regular;
            $(img).attr("src", imageUrl);
            localStorage.setItem("count", parseInt(localStorage.getItem("count")) + 1);
        },
        error: function(){
            $(frame).empty();
            $(frame).append('<div class="alert fs-2 alert-danger px-5 py-3 mt-3" role="alert">Service currently unaviable, try again later!</div>');
        }
    });
}

artlike.addEventListener('click', checkLogin);
artdislike.addEventListener('click', checkLogin);
artgen.addEventListener('click', checkLogin);

window.onload = function()
{
    checkTime();
    $(counter).text("Available pictures this hour: " + (count - parseInt(localStorage.getItem("count"))));
}