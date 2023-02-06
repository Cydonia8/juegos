<?php
echo '<div id="carouselExampleCaptions" class="carousel slide">
<div class="carousel-indicators">
  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>
<div class="carousel-inner">';
    for($i=0;$i<count($ultimos_comentarios);$i++){
        
         echo' <div class="carousel-item active">
            <img src="'.adecuar_ruta_foto($ultimos_comentarios[$i]['foto']).'" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>'.$ultimos_comentarios[$i]['usuario'].'</h5>
              <p>'.$ultimos_comentarios[$i]['comentario'].'</p>
              <span>'.formatearFecha($ultimos_comentarios[$i]['fecha']).'</span>
            </div>
          </div>';
    }
       echo' </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>';
    
?>