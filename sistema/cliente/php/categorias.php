<?php  
    $categoria = $con->prepare("SELECT id_categoria, nombre, descripcion, imagen  FROM categoria");
    $categoria->execute();
    $resultado_categoria = $categoria->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="section category">
        <h2 class="section__title">
            Categorias
        </h2>

        <div class="category__container container grid">

        <?php foreach($resultado_categoria as $row_categoria){?>    
            <div class="category__data">
            <?php
                $id_categoria = $row_categoria['id_categoria'];
                $tipo =$row_categoria['nombre'];
                $descripcion_categoria = $row_categoria['descripcion'];
                $imagen_categoria = $row_categoria['imagen'];
            ?>  
                <a href="./categoria_<?php echo $id_categoria;?>.php">
                <img src="../Assets/categorias/<?php echo $imagen_categoria?>" alt="" class="category__img" />
                <h3 class="category__title"><?php  echo strtoupper($tipo); ?></h3>
                <p class="category__description"> <?php  echo $descripcion_categoria; ?></p></a>
            </div>
        <?php }?>      
        </div>
    </section>