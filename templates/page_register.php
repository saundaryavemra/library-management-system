  <div class="container h-100 rounded shadow my-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-white">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registruj se</p>
                <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                  <?=htmlspecialchars($_GET['error']); ?>
                </div>
                <?php }elseif(isset($_GET['success'])){ ?>
                <div class="alert alert-success" role="alert">
                  <?=htmlspecialchars($_GET['success']); ?>
                </div>
                <?php } ?>

                <form class="mx-1 mx-md-4" action="<?= DIR_MODULES?>register.php" method="post">

                  <div class="d-flex flex-row mb-4 justify-content-between">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex mb-0 me-3">
                      <input type="text" id="form3Example1c" class="form-control" name="first_name" value="<?php isset($_POST['first_name']) ? $_POST['first_name'] : '';?>" />
                      <label class="form-label" for="form3Example1c">Ime</label>
                    </div>

                    <div class="form-outline flex mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="last_name" />
                      <label class="form-label" for="form3Example1c">Prezime</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="email" />
                      <label class="form-label" for="form3Example3c">Vaša e-mail adresa</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" />
                      <label class="form-label" for="form3Example4c">Lozinka</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="confirm_password"/>
                      <label class="form-label" for="form3Example4cd">Potvrdite lozinku</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg register-btn">Registruj se</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="./public/images/undraw_education.svg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>