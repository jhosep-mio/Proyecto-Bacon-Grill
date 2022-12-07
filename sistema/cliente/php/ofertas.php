<!---------------- OFERTAS ------------------->
<?php  
    $sql_ofertas = $con->query("SELECT  id, productos.nombre, precio, descuento,categoria.nombre as nombre_categoria,productos.imagen FROM productos 
    INNER JOIN categoria on productos.id_categoria= categoria.id_categoria WHERE estado=1 and descuento >0");
    $totalFilas = $sql_ofertas->fetchColumn(); 
    $sql_ofertas->execute();
    $resultado = $sql_ofertas->fetchAll(PDO::FETCH_ASSOC);

?>
    
    <?php 
    if($totalFilas != 0){ 
    ?>
    <section class="section ofertas" id="new">
      <h2 class="section__title">Ofertas</h2>   
      <div class="ofertas__container container">
        <div class="swiper ofertas-swiper">
          <div class="swiper-wrapper">

          <?php 
          foreach($resultado as $row){?>
            <div class="ofertas__content swiper-slide">
              <?php
              
              $id = $row['id'];
              $des_ofer =$row['descuento'];
              $img=$row['imagen'];
              $imagen= "../Assets/img-compra/".$img;
              $precio_final_offer =  $row['precio'] - (( $row['precio']*$row['descuento'])/100);

              if(!file_exists($imagen)){
                  $imagen= "../Assets/img-compra/img_default.png"; 
              }
              ?>
              <div class="ofertas__tag">Offer</div>
              <img src="<?php echo $imagen; ?>" alt="" class="ofertas__img" />
              <h3 class="ofertas__title"><?php  echo $row['nombre']; ?></h3>
              <span class="ofertas__subtitle"><?php echo  $row['nombre_categoria']; ?></span>
 
              <div class="ofertas__prices">
                <span class="ofertas__price"><?php  echo number_format($precio_final_offer, 2,'.',','); ?></span>
                <span class="ofertas__discount"><?php  echo number_format($row['precio'], 2,'.',','); ?></span>
              </div>

              <button class="button ofertas__button">
              <a href="../php/detalle_producto.php?id=<?php echo $row['id'];?>&token=<?php echo 
                        hash_hmac('sha1', $row['id'], KEY_TOKEN);?>"><i class="fa-solid fa-bars"></i></a>
              </button>
            </div>
          <?php }?> 
          </div>
        </div>
      </div>
    </section>
    <?php } else if($totalFilas == 0){
      echo 
      '<section class="section ofertas" id="new">
      <h2 class="section__title">No hay ofertas</h2></section>';  
    }
    ?> 
