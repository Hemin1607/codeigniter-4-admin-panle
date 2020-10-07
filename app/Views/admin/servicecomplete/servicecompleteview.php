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
                    <th>Cups of coffee</th>
                    <th>Project</th>
                    <th>Clients</th>
                    <th>Partners</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td class="taskStatus"><?= $formData['cupsofcoffee'] ? $formData['cupsofcoffee'] : ""; ?></td>
                    <td class="taskStatus"><?= $formData['project'] ?$formData['project'] : ""; ?></td>
                    <td class="taskStatus"> <?= $formData['clients'] ? $formData['clients'] : "" ; ?></td>
                    <td class="taskStatus"><?= $formData['partners'] ?$formData['partners'] : ""; ?></td>
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
                    <label class="control-label">Cups of coffee :</label>
                    <div class="controls">
                      <input type="text" class="span11 cupsofcoffee" value="<?= $formData['cupsofcoffee'] ? $formData['cupsofcoffee'] : ""; ?>" name="cupsofcoffee" placeholder="Cups of coffee" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Project :</label>
                    <div class="controls">
                      <input type="text" class="span11 project" value="<?= $formData['project'] ?$formData['project'] : ""; ?>" name="project" placeholder="Project" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Clients</label>
                    <div class="controls">
                      <input type="text"  class="span11 clients" value="<?= $formData['clients'] ? $formData['clients'] : "" ; ?>" name="clients" placeholder="Clients"  />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Partners :</label>
                    <div class="controls">
                      <input type="text" class="span11 partners" value="<?= $formData['partners'] ?$formData['partners'] : ""; ?>" name="partners" placeholder="Partners" />
                    </div>
                  </div> 
                  <div class="form-actions">
                    <button type="button" id="servicecomplete_from" class="btn btn-success">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div> 
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/datatablecustom/servicecomplete.js') ?>"></script>