<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
        <div id="tampil">

        </div>

  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>admin/appactivity/TampilAppActivity",
        cache: false,
        success: function(data) {
            $("#tampil").html(data);
        }
    });

});
</script>