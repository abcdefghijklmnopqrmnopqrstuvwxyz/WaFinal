const view = document.getElementById("view");
const like = document.getElementById("like");
const dislike = document.getElementById("dislike");
const log = document.getElementById("log");
const img = document.getElementById("img");
const frame = document.getElementById("frame");
const artlike = document.getElementById("artbtnlike");
const artdislike = document.getElementById("artbtndislike");
const artgen = document.getElementById("artbtngenerate");

function likeImg()
{
    getImgData();
    isNaN(parseInt(localStorage.getItem('liked'))) ? localStorage.setItem('liked', 1) : localStorage.setItem('liked', parseInt(localStorage.getItem('liked')) + 1);
    like.innerHTML = localStorage.getItem('liked');
}

function dislikeImg()
{
    getImgData();
    isNaN(parseInt(localStorage.getItem('disliked'))) ? localStorage.setItem('disliked', 1) : localStorage.setItem('disliked', parseInt(localStorage.getItem('disliked')) + 1);
    dislike.innerHTML = localStorage.getItem('disliked');
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
            artlike.addEventListener('click', likeImg);
            artdislike.addEventListener('click', dislikeImg);
            isNaN(parseInt(localStorage.getItem('viewed'))) ? localStorage.setItem('viewed', 1) : localStorage.setItem('viewed', parseInt(localStorage.getItem('viewed')) + 1);
            view.innerHTML = localStorage.getItem('viewed');
            var imageUrl = response.urls.regular;
            $(img).attr("src", imageUrl);
        },
        error: function(){
            artlike.removeEventListener('click', likeImg);
            artdislike.addEventListener('click', dislikeImg);
            $(frame).empty();
            $(frame).append('<div class="imgframe alert fs-3 alert-danger px-5 py-3 mt-3" role="alert">Service currently unaviable, try again later!</div>');
        }
    });
}

function setStats()
{
    isNaN(parseInt(localStorage.getItem('viewed'))) ? view.innerHTML = 0 : view.innerHTML = parseInt(localStorage.getItem('viewed'));
    isNaN(parseInt(localStorage.getItem('liked'))) ? like.innerHTML = 0 : like.innerHTML = parseInt(localStorage.getItem('liked'));
    isNaN(parseInt(localStorage.getItem('disliked'))) ? dislike.innerHTML = 0 : dislike.innerHTML = parseInt(localStorage.getItem('disliked'));
    isNaN(parseInt(localStorage.getItem('logged'))) ? log.innerHTML = 0 : log.innerHTML = parseInt(localStorage.getItem('logged'));
}

artgen.addEventListener('click', getImgData);
document.onload = setStats();