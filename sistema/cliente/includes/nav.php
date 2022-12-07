<nav class="navBar">
    <div class="navTop">
      <div class="container-top">
        <div class="left">
          <div class="img-nav">
            <img src="../Assets\nav/logo.png" alt="menu" class="menu on-active" />
            <img src="../Assets\nav/logo_onlypanda.png" alt="menu" class="menu inactive" />
          </div>
        </div>

        <div class="right">
          
          <div class="conatiner-contacto">
            <div class="contacto">
              <div class="menu_mobile inactiv">
                <div class="menu_list">
                  <i class="fa-solid fa-bars"></i>
                </div>
              </div>
              <ul>
                <li class="on-active">
                  <a  href="https://wa.me//+51964713135" target="_blank">CONTACTO</a>
                </li>
                <li class="image-png on-active">
                  <i class="fa-brands fa-whatsapp"></i>
                  <a href="https://wa.me//+51964713135" target="_blank">960613700</a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="container-buscar">
            <input type="text" placeholder="Buscar...." required />
            <div class="buscar-icono">
              <i class="fa-solid fa-magnifying-glass bb"></i>
            </div>
          </div>
          <?php if(isset($_SESSION['datos_login'])){
            echo '<p class="user_name">'.strtoupper($arregloUsuario['user']).'</p>';
          }else{
            echo '';
          }
          ?>
          <div class="conatiner-login on-active_button">
            <?php if(isset($_SESSION['datos_login'])){
            echo'<a href="../php/validacion_login/cerrar_session.php" class="logo_login"><i class="fa-solid fa-right-from-bracket"></i></a>';
            }else{
              echo '<a href="../php/login.php" class="logo_login"><i class="fa-solid fa-user"></i></a>';
            }?>

          </div>
            <div class="cart-shop inactive">
              <i class="fa-solid fa-cart-shopping cartf"></i>
              <i class="ubermenu-sub-indicator fas fa-angle-down"></i>
              <span class="cont_prod"><?php echo $num_cart;?></span>
            </div>
        </div>
      </div>
    </div>
    <div class="navDown">
      <div class="navbar-bot on-active">
        <ul class="list">
              <div class="product-detail-close inactiv">
                <img src="../Assets/nav/icon_close.png" alt="close">
              </div>
        
          <li class="list_items products_detail">
            <div class="arrow">
              <a href="../php/index.php">HOME</a>
              <i class="fa-solid fa-greater-than"></i>
            </div>
          </li>

          <li class="list_items">
            <div class="arrow">
              <a href="../php/productos.php">PRODUCTOS</a>
              <i class="fa-solid fa-greater-than"></i>
            </div>
          </li>

          <!-- <li class="list_items">
            <div class="arrow">
              <a href="/">OFERTAS</a>
              <i class="fa-solid fa-greater-than"></i>
            </div>
          </li> -->

          <li class="list_items">
            <div class="arrow">
              <a href="../php/contacto.php">CONTACTO</a>
              <i class="fa-solid fa-greater-than"></i>
            </div>
          </li>

          <li class="list_items">
            <div class="cart-shop on-active cart_cart">
              <i class="fa-solid fa-cart-shopping cartf"></i>
              <span class="cont_prod"><?php echo $num_cart;?></span>
              <i class="ubermenu-sub-indicator fas fa-angle-down"></i>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>