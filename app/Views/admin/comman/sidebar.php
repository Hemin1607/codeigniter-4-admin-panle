<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-qrcode"></i> Dashboard</a>
  <ul>
    <li class="<?= $name == 'dashboard' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu <?= $name == 'homeForm' || $name == 'homeList' ? 'open active' : ''?>"> <a href="#"><i class="icon  icon-picture"></i> <span>Home</span></a>
      <ul>
        <li class="<?= $name == 'homeForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/home">Add Home Image</a></li>
        <li class="<?= $name == 'homeList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/home/list">List Home Image</a></li>
      </ul>
    </li>
    <li class="submenu <?= $name == 'aboutForm' || $name == 'aboutList' ? 'open active' : ''?>"> <a href="#"><i class="icon icon-info-sign"></i> <span>About</span></a>
      <ul>
        <li class="<?= $name == 'aboutForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/about">Add About </a></li>
        <li class="<?= $name == 'aboutList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/about/list">List About </a></li>
      </ul>
    </li>
    <li class="submenu <?= $name == 'aboutskillForm' || $name == 'aboutskillList' ? 'open active' : ''?>"> <a href="#"><i class="icon icon-signal"></i> <span>About Skill</span></a>
      <ul>
        <li class="<?= $name == 'aboutskillForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/aboutskill">Add About Skill </a></li>
        <li class="<?= $name == 'aboutskillList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/aboutskill/list">List About Skill </a></li>
      </ul>
    </li>
    <li class="submenu <?= $name == 'serviceForm' || $name == 'serviceList' ? 'open active' : ''?>"> <a href="#"><i class="icon icon-info-sign"></i> <span>Service Skill</span></a>
      <ul>
        <li class="<?= $name == 'serviceForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/service">Add Service </a></li>
        <li class="<?= $name == 'serviceList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/service/list">List Service  </a></li>
      </ul>
    </li>
    <li class="submenu <?= $name == 'usermanagementForm' || $name == 'usermanagementList' ? 'open active' : ''?>"> <a href="#"><i class="icon icon-group"></i> <span>User Management</span></a>
      <ul>
        <li class="<?= $name == 'usermanagementForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/usermanagement">Add User</a></li>
        <li class="<?= $name == 'usermanagementList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/usermanagement/list">List Users</a></li>
      </ul>
    </li>
    <li class="submenu <?= $name == 'skillForm' || $name == 'skillList' ? 'open active' : ''?>"> <a href="#"><i class="icon icon-tasks"></i> <span>Skills</span></a>
      <ul>
        <li class="<?= $name == 'skillForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/skills">Add Skill</a></li>
        <li class="<?= $name == 'skillList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/skills/list">List Skill</a></li>
      </ul>
    </li>
    <li class="submenu <?= $name == 'educationForm' || $name == 'educationList' ? 'open active' : ''?>"> <a href="#"><i class="icon icon-book"></i> <span>Education</span></a>
      <ul>
        <li class="<?= $name == 'educationForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/education">Add Education</a></li>
        <li class="<?= $name == 'educationList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/education/list">List Education</a></li>
      </ul>
    </li>
    <li class="submenu <?= $name == 'workexperienceForm' || $name == 'workexperienceList' ? 'open active' : ''?>"> <a href="#"><i class="icon  icon-briefcase"></i> <span>Work Experience</span></a>
      <ul>
        <li class="<?= $name == 'workexperienceForm' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/workexperience">Add Experience</a></li>
        <li class="<?= $name == 'workexperienceList' ? 'active' : '' ?>"><a href="<?php echo base_url(); ?>/admin/workexperience/list">List Experience</a></li>
      </ul>
    </li>
    <li><a href="<?php echo base_url(); ?>/admin/contact"><i class="icon  icon-envelope-alt <?= $name == 'contact' ? 'active' : '' ?>"></i> <span>Contact</span></a></li>
    <li><a href="<?php echo base_url(); ?>/admin/servicecomplete"><i class="icon  icon-ok-sign <?= $name == 'servicecompleteview' ? 'active' : '' ?>"></i> <span>Service Complete</span></a></li>
    
    <!-- <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
    <li><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="form-common.html">Basic Form</a></li>
        <li><a href="form-validation.html">Form with Validation</a></li>
        <li><a href="form-wizard.html">Form with Wizard</a></li>
      </ul>
    </li>
    <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul>
    </li>
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li> -->
  </ul>
</div>