const img = document.getElementById("img");
const frame = document.getElementById("frame");
const artlike = document.getElementById("artbtnlike");
const artdislike = document.getElementById("artbtndislike");
const artgen = document.getElementById("artbtngenerate");
const counter = document.getElementById("counter");
const logged = document.getElementById("notlogged");
var count = 10;

function checkLogin()
{
    if(logged != null)
    {
        checkTime();
        localStorage.setItem("count", parseInt(localStorage.getItem("count")) + 1);

        if(count > 0)
        {
            count--;
            getImgData();
            $(counter).text("Available pictures this hour: " + count);
        }
        else
        {
            $(frame).empty();
            $(frame).append('<div class="imgframe alert fs-2 alert-danger px-5 py-3 mt-3" role="alert">You have already used all free generations this hour! Wait next hour or login/register for free!</div>');
        }
    }
    else
    {
        getImgData();
    }
}

function checkTime()
{
    if(localStorage.getItem("time") != new Date().getHours())
    {
        localStorage.setItem("time", new Date().getHours());
        count = 10;
    }
    localStorage.setItem("time", new Date().getHours());
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
        },
        error: function(){
            $(frame).empty();
            $(frame).append('<div class="imgframe alert fs-2 alert-danger px-5 py-3 mt-3" role="alert">Service currently unaviable, try again later!</div>');
        }
    });
}

artlike.addEventListener('click', checkLogin);
artdislike.addEventListener('click', checkLogin);
artgen.addEventListener('click', checkLogin);

document.onload = $(counter).text("Available pictures this hour: " + count);