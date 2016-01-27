<!-- Zozo Tabs Start-->
  <!-- The value of data-role should be z-tabs, data-options is optional to set options -->
     <div id='tabbed-nav' data-role='z-tabs' data-options='{"theme": "silver", "orientation": "horizontal", "position": "top-left","size": "medium", "animation": {"duration": 400, "effects": "slideH"}, "defaultTab": "tab1"}'>

        <!-- Tab Navigation Menu -->
        <ul class="container12">
            <li><a>PYMES</a></li>
            <li><a>HOMBRE CLAVE</a></li>
            <li><a>SOCIO</a></li>
            <li><a>DEUDORES</a></li>
            <li><a>TEMPORAL</a></li>
        </ul>

        <!-- Content container -->
          <div>   
             <?php query_posts( array( 'numberposts' => 5, 'category_name' => 'Seguros Personales Carousel', 'post_type' => 'segurosPersonales' ) );  ?>

             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div><!-- inicia Overview -->

                <div id="box-text-tab-h"> 
                   <h2><?php the_title();?> </h2>  
                    <h3><?php the_field('descriptivo'); ?> </h3>
                    <p><?php the_content();?></p>  
                     
                     <a href="<?php the_field('link_seguro'); ?>" class="button red-w">Contacta a un asesor</a>  
                 </div>     
                 <div id="box-text-tab-h-img">
                  <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( 'carouselHome_thumbs' ); } ?>
                </div>   
            </div><!-- cierra Overview -->   
              <?php endwhile; else: ?>
              <h1>No se encontraron Articulos</h1>
              <?php endif; ?>  
            </div>
    </div>
<!-- Zozo Tabs End-->
 
<div class="clear"></div>