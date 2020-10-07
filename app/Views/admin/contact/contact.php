<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a  class="tip-bottom"><i class="icon-home"></i> Service Complete </a></div>
    </div>
    <div class="container-fluid">
      <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
              <h5>Service Complete</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td class="taskStatus"><?= $formData['address'] ? $formData['address'] : ""; ?></td>
                    <td class="taskStatus"><?= $formData['email'] ?$formData['email'] : ""; ?></td>
                    <td class="taskStatus"> <?= $formData['contactno'] ? $formData['contactno'] : "" ; ?></td>
                    <td class="taskOptions">
                      <a  class="tip-top" id="editservicecomplete" data-original-title="Update"><i class="icon-pencil"></i></a>
                      <a  class="tip-top" id="closeservicecomplete" style="display :none;"  data-original-title="Close"><i class="icon-remove"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
      </div>
      <div class="span6 cust-center" id="servicecompleteform" style="display :none;">
          <div class="row-fluid">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Edit Service</h5>
              </div>
              <div class="widget-content nopadding">
                <form id="" class="form-horizontal">
                  <input type="hidden" id="service_complete_id" value="<?= $formData['id'] ?$formData['id'] : ""; ?>" name="id" >
                  <div class="control-group">
                    <label class="control-label">Address :</label>
                    <div class="controls">
                    <textarea class="span11 address" name="address"><?= $formData['address'] ? $formData['address'] : ""; ?></textarea>
                    <p>Write your full Address with Taluka, Dist., and pin code etc.</p>
                      <!-- <input type="text" class="span11 address" value="<?= $formData['address'] ? $formData['address'] : ""; ?>" name="address" placeholder="Address" /> -->
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Email :</label>
                    <div class="controls">
                      <input type="text" class="span11 email" value="<?= $formData['email'] ?$formData['email'] : ""; ?>" name="email" placeholder="E-mail" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Contact Number</label>
                    <div class="controls">
                      <input type="text"  class="span11 contactno" value="<?= $formData['contactno'] ? $formData['contactno'] : "" ; ?>" name="contactno" placeholder="Contact Number"  />
                    </div>
                  </div> 
                  <div class="form-actions">
                    <button type="button" id="servicecontact_from" class="btn btn-success">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div> 
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/datatablecustom/servicecomplete.js') ?>"></script>