const img = $("#img");
const frame = $("#frame");
const artlike = $("#artbtnlike");
const artdislike = $("#artbtndislike");
const artgen = $("#artbtngenerate");
const counter = $("#counter");
const logged = $("#notlogged");
const count = 10;

function checkLogin() {
    if (logged.length) {
        checkTime();

        if (count - parseInt(localStorage.getItem("count")) > 0) 
        {
            getImgData();
        } 
        else 
        {
            frame.empty();
            frame.append('<div class="alert fs-2 alert-danger px-5 py-3 mt-3" role="alert">You have already used all free generations this hour! Wait next hour or login/register for free!</div>');
        }
    } 
    else
    {
        getImgData();
    }
}

function checkTime() {
    if (parseInt(localStorage.getItem("time")) != new Date().getHours()) {
        localStorage.setItem("count", 0);
    }
    localStorage.setItem("time", new Date().getHours());
    counter.text("Available pictures this hour: " + (count - parseInt(localStorage.getItem("count"))));
}

function getImgData() {
    $.ajax({
        url: "https://api.unsplash.com/photos/random/?client_id=cCzgrjU_SMWXvFotwKRir03Epa_jymVHCMFquwLa41w",
        headers: {
            Authorization: "Client-ID cCzgrjU_SMWXvFotwKRir03Epa_jymVHCMFquwLa41w"
        },
        method: "GET",
        success: function(response) {
            var imageUrl = response.urls.regular;
            img.attr("src", imageUrl);
            localStorage.setItem("count", parseInt(localStorage.getItem("count")) + 1);
            counter.text("Available pictures this hour: " + (count - parseInt(localStorage.getItem("count"))));
        },
        error: function() {
            frame.empty();
            frame.append('<div class="alert fs-2 alert-danger px-5 py-3 mt-3" role="alert">Service currently unaviable, try again later!</div>');
        }
    });
}

[artlike, artdislike, artgen].forEach(x => x.click(checkLogin));

$(document).ready(setInterval(checkTime, 1000));