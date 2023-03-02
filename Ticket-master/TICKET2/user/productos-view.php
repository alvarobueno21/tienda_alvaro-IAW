<div class="container"><!--contenedor general-->
  <div class="row">
      <div class="col-sm-12">
          <!-- Nav tabs -->
          <?php $redireccion = "" ?>
        <ul class="nav nav-tabs">
          <li class="active"><a href="#all_categori" data-toggle="tab"><i class="fa fa-bars"></i>&nbsp;&nbsp;Todas las categorías</a></li>
          <li><a href="#desktop" data-toggle="tab" style="display: none"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Escritorio</a></li>
          <li><a href="#laptos" data-toggle="tab" style="display: none"><i class="fa fa-laptop"></i>&nbsp;&nbsp;Laptos</a></li>
          <a href="<?php if ($_SESSION['admin'] == "0") {
            $redireccion = "../../../../tienda_alvaro/Ticket-master/TICKET2/carrito-master/admin/indexusuario.php";
          } else {
            $redireccion = "../../../../tienda_alvaro/Ticket-master/TICKET2/carrito-master/admin/index.php";
          } 
          echo $redireccion;
          ?>">&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-shopping-cart"></i></a>
          <!-- }"../../../../tienda_alvaro/Ticket-master/TICKET2/carrito-master/index.php" class="cart-link" title="carro">&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-shopping-cart"></i></a> -->
          <!-- <li><a href="../../../../tienda_alvaro/Ticket-master/TICKET2/carrito-master/VerCarta.php" class="cart-link" title="Ver Carta">&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-shopping-cart"></i></a> -->
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <br>
            <div id="products" class="row list-group">
                    <?php
                    //get rows query
                    $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC LIMIT 10");
                    if ($query->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {

                          $imagenesss=$row['image'];
                    ?>
                            <div class="item col-lg-6">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <h4 class="list-group-item-heading"><?php echo $row["name"]; ?></h4>
                                        <img width=250 src="data:images/jpg;base64,<?php echo base64_encode($row["image"]);?>"></p>
                                        <p class="list-group-item-text"><?php echo $row["description"]; ?></p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class="lead"><?php echo '€' . $row["price"] . ' EUR'; ?></p>
                                            </div>
                                            <div class="col-md-4">

                                                <a class="btn btn-success" href="../../../../tienda_alvaro/Ticket-master/TICKET2/carrito-master/AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Enviar al Carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p>Producto(s) no existe.....</p>
                    <?php } ?>
                </div>
            
            <!--******Escritorio*****-->
            <div class="tab-pane" id="desktop" style="display: none">
                <div class="col-sm-6">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/02.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Trending PC // Windows 11</h3>
                        <p class="text-primary">Precio: 899€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/03.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Gaming Upg // Windows 11</h3>
                        <p class="text-primary">Precio: 769€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>
                
                <div class="col-sm-6">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/06.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Megaport 7 // Windows 11</h3>
                        <p class="text-primary">Precio: 1049€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>
                
                <div class="col-sm-6">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/08.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Playstation 5 + 2 juegos</h3>
                        <p class="text-primary">Precio: 750€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>
            </div>
            
            <!--*****Laptos********-->
            <div class="tab-pane" id="laptos">
                <div class="col-sm-4">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/01.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Gold Élite II // Windows 11</h3>
                        <p class="text-primary">Precio: 1050€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>
                
                <div class="col-sm-4">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/04.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Acer Predator Helios 300 // Windows 11 <i5-11400F></i5-11400F></h3>
                        <p class="text-primary">Precio: 1350€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/slider2.png" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Lenovo Ideapad 3 S/n Win</h3>
                        <p class="text-primary">Precio: 760€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>
                
                <div class="col-sm-4">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/09.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">Iphone 13 Pro Max</h3>
                        <p class="text-primary">Precio: 1200€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>
                
                <div class="col-sm-4">
                    <div class="thumbnail text-center">
                      <img class="img-thumbnail img-responsive" src="img/prod/07.jpg" alt="Image">
                      <div class="caption">
                        <h3 class="text-danger">ASUS TUF Gaming F15</h3>
                        <p class="text-primary">Precio: 699€</p>
                        <p><button type="button" class="btn btn-success btn-sm">Más info</button></p>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
      </div>
  </div>

  <div class="row">
    <div class="col-sm-12 text-center">
      <ul class="pagination">
        <li class="disabled"><a href="#">«</a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
      </ul>
    </div>
  </div><!--fin row paginacion-->

</div><!--fin contenedor general-->