    <?php
      $newsletter_diaria = get_field( "newsletter_diaria" );
    ?>
{}      <div class="grafico_wrapper" style="width:100%;">
        <h2>Programas - Top 10</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_diaria['programas_-_top_10']['fuente']; ?></p>
        <div id="grafico-diaria-1" class="grafico-inner" style="min-height: 550px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_diaria['programas_-_top_10']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota de las cadenas - Top 5</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_diaria['cuota_de_las_cadenas_-_top_5']['fuente']; ?></p>
        <p><strong>Cuota (%)</strong></p>
        <div id="grafico-diaria-2" class="grafico-inner" style="min-height: 420px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_diaria['cuota_de_las_cadenas_-_top_5']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota de las temáticas en abierto - Top 5</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_diaria['cuota_de_las_tematicas_en_abierto_-_top_5']['fuente']; ?></p>
        <p><strong>Cuota (%)</strong></p>
        <div id="grafico-diaria-3" class="grafico-inner" style="min-height: 420px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_diaria['cuota_de_las_tematicas_en_abierto_-_top_5']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper">
        <h2>Cuota por grupos de comunicación</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_diaria['cuota_por_grupos_de_comunicacion']['fuente']; ?></p>
        <p><strong>Cuota (%)</strong></p>
        <div id="grafico-diaria-4" class="grafico-inner" style="min-height: 420px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_diaria['cuota_por_grupos_de_comunicacion']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

      <div class="grafico_wrapper">
        <h2>Spot de oro – Top 3</h2>
        <p class="graficos-fuente">Fuente: <?php echo $newsletter_diaria['spot_de_oro_–_top_3']['fuente']; ?></p>
        <p><strong>Grp’s a formato</strong></p>
        <div id="grafico-diaria-5" class="grafico-inner" style="min-height: 420px"></div>
        <br>
        <div class="descripcion"><?php echo $newsletter_diaria['spot_de_oro_–_top_3']['texto']; ?></div>
        <br>
        <br>
        <br>
      </div>

    <?php 
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-1.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-2.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-3.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-4.php';
      require get_template_directory() . '/inc/graficos-newsletters/diaria/grafico-5.php';