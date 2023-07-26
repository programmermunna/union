  <script>
      $(".union").on("change",function(){
      var upazila = $(this).val();
      return opt_func("../","ward","union_id",upazila,".ward");
      })
    </script>
    <!-- Main Content -->
    <script src="dist/js/header.js"></script>
    <script src="dist/js/svg_icons.js"></script>
    <script src="dist/js/sidebar_nav.js"></script>
  </body>
</html>
<?php
ob_flush();
?>










