<?php
echo '<div id="carouselExampleCaptions" class="carousel slide">
<div class="carousel-indicators">';

foreach($ultimos_comentarios as $posicion=>$comentario){
  if($posicion == 0){
    echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$posicion.'" class="active" aria-current="true" aria-label="Slide '.$posicion.'"></button>';
  }else{
    echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$posicion.'" aria-current="true" aria-label="Slide '.$posicion.'"></button>';
  }
}
echo '</div>
<div class="carousel-inner">';
    for($i=0;$i<count($ultimos_comentarios);$i++){
        if($i == 0){
          echo' <div class="carousel-item active">
          <img src="'.adecuar_ruta_foto($ultimos_comentarios[$i]['foto']).'" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>'.$ultimos_comentarios[$i]['usuario'].'</h5>
            <p>'.$ultimos_comentarios[$i]['comentario'].'</p>
            <span>'.formatearFecha($ultimos_comentarios[$i]['fecha']).'</span>
          </div>
        </div>';
        }else{
          echo' <div class="carousel-item">
          <img src="'.adecuar_ruta_foto($ultimos_comentarios[$i]['foto']).'" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-center">'.$ultimos_comentarios[$i]['usuario'].'</h5>
            <p class="text-center">'.$ultimos_comentarios[$i]['comentario'].'</p>
            <span class="text-center">'.formatearFecha($ultimos_comentarios[$i]['fecha']).'</span>
          </div>
        </div>';
        }
        
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