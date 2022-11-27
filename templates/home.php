
<php $radnoVreme = "Ponedeljak-Petak: 07:30-20:00"?>


<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
    <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="5000">
    <div class="overlay-image" style="background-image: url(public/images/boy.svg)"></div>
      <div class="container carousel-container">
        <h1 class="h1-slider">Radno <span class="text-change">Vreme</span></h1>
        <p>Ponedeljak-Petak: 07:30-20:00</p>
        <p>Subota: 08:00-13:00</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <div class="overlay-image" style="background-image: url(public/images/undraw_book_lover_re_rwjy.svg)"></div>
        <div class="container carousel-container ask-librarian">
          <h1 class="h1-slider">Pitaj <span class="text-change">bibliotekara</span></h1>        

            <!-- Forma -->
          <div class="container">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">
              <div class="contact-form row">
                <div class="form-field col-lg-6">
                  <input id="name" class="input-text" type="text" name="">
                  <label for="name" class="label">Ime</label>
                </div>
                <div class="form-field col-lg-6">
                  <input id="forename" class="input-text" type="text" name="">
                  <label for="forename" class="label">Prezime</label>
                </div>
                <div class="form-field col-lg-6">
                  <input id="email" class="input-text" type="email" name="">
                  <label for="email" class="label">E-mail</label>
                </div>
                <div class="form-field col-lg-6">
                  <input id="phone" class="input-text" type="text" name="">
                  <label for="phone" class="label">Broj telefona</label>
                </div>
                <div class="form-field col-lg-12">
                  <input id="message" class="input-text" type="textarea" name="">
                  <label for="message" class="label">Poruka</label>
                </div>
                <div class="form-field col-lg-12">
                  <input class="btn submit-btn" type="submit" value="Pošalji">
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    <div class="carousel-item" data-bs-interval="1000">
    <div class="overlay-image" style="background-image: url(public/images/bibliophile.svg)"></div>
      <div class="container carousel-container">
        <h1 class="h1-slider">Example <span class="text-change">Headline</span></h1>
      </div>
    </div>
  </div>
  <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
    <span class="sr-only">Previous</span>
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
    <span class="sr-only">Next</span>
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div> 
