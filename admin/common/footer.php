<script>
      $(".division").on("change",function(){
        var division = $(this).val();
        return opt_func("../","districts","division_id",division,".district");
        })

      $(".district").on("change",function(){
        var district = $(this).val();
        return opt_func("../","upazilas","district_id",district,".upazila");
        })

      $(".upazila").on("change",function(){
        var upazila = $(this).val();
        return opt_func("../","unions","upazila_id",upazila,".union");
        })

      $(".union").on("change",function(){
        var union = $(this).val();
        return opt_func("../","ward","union_id",union,".ward");
        })

</script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <script src="../landing-dist/js/slicknav.js"></script>
</body>

</html>