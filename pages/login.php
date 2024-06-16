<?php
    include "./../layout/header.php";
    include "./../service/login.php";
?>
    <div class="login-wrapper">
        <div class="login-container">
            <h3 class="text-center">MASUK AKUN</h3>
            <form method="post" action="login.php">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    <label for="floatingInput"><p class="fs-6" style= "font-size:1px; ">Username</p></label>
                    <div id="UsernameHelp" class="form-text">We'll never share your Nama with anyone else.</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="id_pelanggan">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="check-me-out" name="check-me-out" onchange="clickChecked()">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>

 
<?php include "./../layout/footer.php" ?>
