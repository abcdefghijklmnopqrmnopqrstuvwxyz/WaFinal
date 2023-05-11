<main class="text-center">
    <div class="my-5 container justify-content-center d-flex pt-5" id="fade">
        <form class="text-container-6 mx-5 w-75 mb-5" action="./dbsystem/loginsys.php" method="POST">
            <?php
                if (isset($_SESSION['error'])) {
                    $errorMessage = $_SESSION['error'];
                    unset($_SESSION['error']);
                    echo "<p class='my-5 fs-1 text-danger'>" . $errorMessage . "</p>";
                }
            ?>
            <div class="mb-5 mt-5">
                <label for="email" class="form-label fs-1">Email address</label>
                <input type="email" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 fs-2 text-center fst-italic" name="email" maxlength="50" required>
            </div>
            <div class="mb-5">
                <label for="pass" class="form-label fs-1">Password</label>
                <input type="password" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 fs-2 text-center fst-italic" name="pass" maxlength="20" minlength="6" required>
            </div>
            <div class="row justify-content-lg-between justify-content-center align-items-center my-5">
                <a href="./register" class="fs-3 text-decoration-none text-container-4 col-lg-6 col-12">Not registered account yet? Do it here.</a>
                <button type="submit" class="btn btn-primary fs-3 col-lg-2 mt-4 col-sm-3 col-5">Log in</button>
            </div>
        </form>
    </div>
</main>

<script type="text/javascript" src="../js/animations.js"></script>