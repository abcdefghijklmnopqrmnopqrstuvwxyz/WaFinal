<main class="text-center" id="main">
    <div class="d-flex justify-content-center">
        <div class="mt-5 d-block border border-3 shadow-lg border-dark-subtle pt-3 overflow-hidden">
            <div class="row d-flex">
                <div class="d-block col-md-4 col-12">
                    <img src="../img/user.jpg" alt="user" class="img-fluid ms-md-4 ms-0">
                    <p class="ms-md-5 ms-0 text-center fs-3 overflow-auto border-bottom border-3 fw-medium"><?= $_SESSION['logged'] === 'true' ? $_SESSION["name"] : 'Unknown' ?></p>
                </div>
                <div class="d-block col-md-8 col-12">
                    <h1 class="text-container-7">User Info</h1>
                    <hr class="line mx-5">
                    <div class="row justify-content-center text-container-4">
                        <ul class="list-unstyled fw-bold col-5">
                            <li class="d-flex pb-2"><span class="material-symbols-outlined">visibility</span>&nbsp;Viewed arts:</li>
                            <li class="d-flex pb-2"><span class="material-symbols-outlined">thumb_up</span>&nbsp;Liked:</li>
                            <li class="d-flex pb-2"><span class="material-symbols-outlined">thumb_down</span>&nbsp;Disliked:</li>
                            <li class="d-flex pb-2"><span class="material-symbols-outlined">history</span>&nbsp;Logged times:</li>
                        </ul>
                        <ul class="list-unstyled fw-bold col-1">
                            <li class="pb-2"><?= $_SESSION['logged'] === 'true' ? $_SESSION['views'] : '-' ?></li>
                            <li class="pb-2"><?= $_SESSION['logged'] === 'true' ? $_SESSION['likes'] : '-' ?></li>
                            <li class="pb-2"><?= $_SESSION['logged'] === 'true' ? $_SESSION['dislikes'] : '-' ?></li>
                            <li class="pb-2"><?= $_SESSION['logged'] === 'true' ? $_SESSION['logs'] : '-' ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (isset($_SESSION['logged'])) {
            if($_SESSION['logged'] == 'false') {
                echo '<div class="container mt-3 d-block"><p class="text-center fs-1 text-danger mt-5" id="counter"></p><button type="button" class="btn btn-secondary text-center text-white bg-danger fs-1 p-3 mb-5 mt-3" id="notlogged" title="Login or continue with limited access. With limited access you can only look at 10 pictures per hour. Login or sign up for free to increase this limit to 50 pictures per hour!">Continue with limited access.</button></div>';
            }
        }
    ?>
    <div class="container my-5">
        <div class="border border-4 justify-content-center">
            <div class="imgframe border-bottom border-3 mb-3 d-flex align-items-center justify-content-center" id="frame">
                <img src="../img/imgph.jpg" class="img" id="img">
            </div>
            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-success text-container-4 fs-2 mb-3" id="artbtnlike">Like</button>
                <button type="submit" class="btn btn-primary text-container-4 fs-2 mb-3" id="artbtngenerate">Generate Art</button>
                <button type="submit" class="btn btn-danger text-container-4 fs-2 mb-3" id="artbtndislike">Dislike</button>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript" src="../js/arts.js"></script>