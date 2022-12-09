<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="height: auto">
      <div class="carousel-item carousel-img active">
        <img src="{{ asset('assets/images/slider1.png') }}" class="d-block w-100 carousel-img" alt="Image here">
      </div>
      <div class="carousel-item carousel-img">
        <img src="{{ asset('assets/images/slider2.png') }}" class="d-block w-100 carousel-img"  alt="Image here">
      </div>
      <div class="carousel-item carousel-img">
        <img src="{{ asset('assets/images/slider3.png') }}" class="d-block w-100 carousel-img"  alt="Image here">
      </div>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>