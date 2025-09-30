<footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
    <div class="pull-right">
        Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="javascript:void(0)"
            target="_blank">Positive Quadrant </a>
    </div>
    <div class="pull-left">
        <a class="font-w600" href="<?= base_url() ?>/Dashboard" target="_blank">Positivequadrant</a> &copy;
        2016</span>
    </div>
</footer>
<!-- END Footer -->
</div>



<?php $load = unserialize(constant($mast_load)); ?>

<?php foreach ($load['mjs'] as $data) { ?>

    <script src="<?= LOAD . $data ?>" type="text/javascript"></script>
<?php } ?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<!-- <script type="text/javascript">
  $("#edit_desc").ckeditor();
  // CKEDITOR.replace( '#edit_desc' );
</script> -->
</body>

</html>