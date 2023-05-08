const img = document.getElementById("img");
const frame = document.getElementById("frame");
const artlike = document.getElementById("artbtnlike");
const artdislike = document.getElementById("artbtndislike");
const artgen = document.getElementById("artbtngenerate");

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
            localStorage.setItem("img", imageUrl);
            $(img).attr("src", imageUrl);
        },
        error: function(){
            $(frame).empty();
            $(frame).append('<div class="imgframe alert fs-3 alert-danger px-5 py-3 mt-3" role="alert">Service currently unaviable, try again later!</div>');
        }
    });
}

artlike.addEventListener('click', getImgData);
artdislike.addEventListener('click', getImgData);
artgen.addEventListener('click', getImgData);