<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a  class="tip-bottom"><i class="icon-home"></i> User </a></div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
        <?php echo view('admin\comman\errorsection.php'); ?>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5><?= $title ?> Data</h5>
            <!-- <span class=" float-right-padding"  ><button class=" btn btn-info ">Add Home</button></span> -->
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="education_tbl">
            </table>  
          </div>
        </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/js/datatablecustom/usermanagment.js') ?>"></script> 
