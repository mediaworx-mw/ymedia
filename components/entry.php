<div class="entry">
  <?php if( have_rows('contenido') ): while ( have_rows('contenido') ) : the_row(); ?>
    <?php if( get_row_layout() == '1_columna' ): ?>
      <div class="content col1">
        <?php $pos1_1 = get_sub_field('pos1_flex1'); ?>
        <div class="col col--<?php echo $pos1_1?>">
          <div><?php the_sub_field('col1_flex1');?></div>
        </div>
      </div>
    <?php elseif( get_row_layout() == '2_columnas' ): ?>
      <div class="content col2">
        <?php $pos1_2 = get_sub_field('pos1_flex2'); ?>
        <?php $pos2_2 = get_sub_field('pos2_flex2'); ?>
        <div class="col col--<?php echo $pos1_2?>">
          <div><?php the_sub_field('col1_flex2');?></div>
        </div>
        <div class="col col--<?php echo $pos2_2?>">
          <div><?php the_sub_field('col2_flex2');?></div>
        </div>
      </div>
    <?php elseif( get_row_layout() == '3_columnas' ): ?>
      <div class="content col3">
        <?php $pos1_3 = get_sub_field('pos1_flex3'); ?>
        <?php $pos2_3 = get_sub_field('pos2_flex3'); ?>
        <?php $pos3_3 = get_sub_field('pos3_flex3'); ?>
        <div class="col col--<?php echo $pos1_3?>">
          <div><?php the_sub_field('col1_flex3');?></div>
        </div>
        <div class="col col--<?php echo $pos2_3?>">
          <div><?php the_sub_field('col2_flex3');?></div>
        </div>
        <div class="col col--<?php echo $pos3_3?>">
          <div><?php the_sub_field('col3_flex3');?></div>
        </div>
      </div>
    <?php endif; ?>
  <?php endwhile; endif;?>
</div>
