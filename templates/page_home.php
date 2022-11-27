
<!-- <php $radnoVreme = "Ponedeljak-Petak: 07:30-20:00"?> -->

<div class="container-fluid">
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
          <p><?= WORK_HOURS ?></p>
          <p><?= WORK_HOURS_WEEKEND ?></p>
        </div>
      </div>

      <div class="carousel-item" data-bs-interval="2000">
        <div class="overlay-image" style="background-image: url(public/images/undraw_book_lover_re_rwjy.svg)"></div>
          <div class="container carousel-container ask-librarian">
            <h1 class="h1-slider">Pitaj <span class="text-change">bibliotekara</span></h1>        

              <!-- Form -->
              <?php include 'contact_form.php'?>
            
          </div>
      </div>

      <div class="carousel-item" data-bs-interval="1000">
      <div class="overlay-image" style="background-image: url(public/images/bibliophile.svg)"></div>
        <div class="container carousel-container">
          <h1 class="h1-slider">Ovde treba staviti <span class="text-change">nekoliko knjiga iz digitalne biblioteke</span></h1>
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
</div>