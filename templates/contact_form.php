<div class="container">
    <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?=htmlspecialchars($_GET['error']); ?>
    </div>
    <?php }elseif(isset($_GET['success'])){ ?>
    <div class="alert alert-success" role="alert">
        <?=htmlspecialchars($_GET['success']); ?>
    </div>
    <?php } ?>
    <form id="contact-form" name="contact-form" action="<?= DIR_MODULES?>contact_form.php" method="post">
        <div class="contact-form row">
        <div class="form-field col-lg-6">
            <input id="name" class="input-text" type="text" name="first_name">
            <label for="name" class="label">Ime</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="forename" class="input-text" type="text" name="last_name">
            <label for="forename" class="label">Prezime</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="email" class="input-text" type="email" name="email">
            <label for="email" class="label">E-mail</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="phone" class="input-text" type="text" name="theme">
            <label for="phone" class="label">Tema</label>
        </div>
        <div class="form-field col-lg-12">
            <input id="message" class="input-text" type="textarea" name="message">
            <label for="message" class="label">Poruka</label>
        </div>
        <div class="form-field col-lg-12">
            <input class="btn submit-btn" type="submit" value="Pošalji">
        </div>
        </div>
    </form>
</div>