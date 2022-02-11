
<?php
session_start();
include "../conexion.php";
?>
<!DOCTYPE html>
<html>
    <head>
<?php include "includes/scripts.php";?>
<link rel="stylesheet" type="text/css" href="css/stilo.css">
    </head>
    <body>
        <?php include "includes/header.php"; ?>
      <section id="conteiner">
          <div class="tittle_page">
              <h1><i class="fas fa-cube"></i>Nueva Venta</h1>
          </div>
          <div class="datos_cliente">
              <h4>Datos del Cliente</h4>
              <a href=""class="btn_new btn_new_cliente"><i class="fas fa-plus"></i>Nuevo cliente</a>

          </div>
          <form name="form_new_cliente_venta" id="form_new_cliente" class="datos">
              <input type="hidden" name="action" value="addCliente">
              <input type="hidden" name="idcliente" value="idcliente" required>
              <div class="wd30">
                      <label>Nit</label>
                      <input type="text" name="nit_cliente" id="ni_cliente">
              </div>
              <div class="wd30">
                      <label>Nombre</label>
                      <input type="text" name="nom_cliente" id="nom_cliente" disabled required>
              </div>
              <div class="wd30">
                      <label>Telefono</label>
                      <input type="number" name="tel_cliente" id="tel_cliente" disabled required>
              </div>
              <div class="wd100">
                      <label> Direccion</label>
                      <input type="text" name="dir_cliente" id="dir_cliente" disabled required>
              </div>
              <div  id="div_registro_cliente" class="wd100">
                      <button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i>
                    Guardar </button>
              </div>
              
          </form>

          <div class="datos_venta">
              <h4>
                  Datos de Ventas
              </h4>
              <div class="datos">
                  <div class="wd50">
                      <label>
                          Vendedor
                      </label>
                      <p>
                          Carlos Entrada Porras
                      </p>
                  </div>
                  <div class="wd50">
                      <label>Acciones</label>
                      <div id="acciones_venta">
                          <a href="#" class="btn_ok texcenter" id="btn_anular_venta"><i class="fas fa-ban"></i>Anular</a>
                          <a href="#" class="btn_ok texcenter" id="btn_facturar_venta"><i class="fas fa-edit"></i>Procesar</a>
                      </div>
                  </div>

              </div>
          </div>
          <table class='tbl_venta'>
              <thead>
              <tr>
              <th width="100px">Codigo</th>
              <th>Descripcion</th>
              <th>Existencias</th>
              <th width="100px">Cantidad</th>
              <th class="textright">Precio</th>
              <th class="textright">Precio Total</th>
              <th>Accion</th>
              </tr>
              <tr>
                  <td><input type="text" name="txt_cod_producto" id="txt_cod_producto"></td>
                  <td id="txt_descripcion">-</td>
                  <td id="txt_existencia">-</td>
                  <td><input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disabled></td>
                  <td id="txt_precio" class="textright">0.00</td>
                  <td id="txt_precio_total" class="textright">0.00</td>
                  <td> <a href="#" id="add_product_venta" class="link_add"><i class="fas fa-plus"></i> Agregar</a> </td>
              </tr>
              <tr>
                  <th>codigo</th>
                  <th colspan="2">Descripcio </th>
                  <th>Cantidad</th>
                  <th class="textright">Precio</th>
                  <th class="textright"> Precio Total</th>
                  <th>Accion</th>
              </tr>
              </thead>
         <tbody id="detalle_venta">
             <tr>
                 <td>1</td>
                 <td colspan="2">Mouse USB</td>
                 <td class="textcenter">1</td>
                 <td class="textright">1</td>
                 <td class="textright"></td>
                 <td class="">
                 <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle(1);">
                <i class="far fa-trash-alt"></i>
                </a>
                 </td> 
             </tr>
             <tr>
                 <td>10</td>
                 <td colspan="2">teclado USB</td>
                 <td class="textcenter">1</td>
                 <td class="textright">1</td>
                 <td class="textright"></td>
                 <td class="">
                 <a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle(1);">
                <i class="far fa-trash-alt"></i>
                </a>
                 </td> 
             </tr>
         </tbody>
         <tfoot>
             <tr>
                 <td colspan="5" class="textright">Subtotal</td>
                 <td claa="textright">1000.00</td>
             </tr>
             <tr>
                 <td colspan="5" class="textright">IVA (12%)</td>
                 <td class="textright">500</td>
             </tr>
             <tr>
                 <td colspan="5" class="textright">IVA (12%)</td>
                 <td class="textright">10000</td>
             </tr>
         </tfoot>
            </table>
      </section>
        <?php include "includes/footer.php";?>
    </body>
</html>