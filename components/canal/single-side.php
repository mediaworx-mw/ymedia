<div class="single-side">
<?php if(get_field('pdf_canal')): ?>
  <div class="single-side__pdf">
    <a target="_blank" href="<?php echo get_field('pdf_canal'); ?>"><i class="far fa-file-pdf"></i></a>
  </div>
<?php endif; ?>
  <div class="share">
    <?php echo share_buttons(); ?>
  </div>
</div>