<?php if (session()->get('successmsg')): ?>
        <script type="text/javascript">
                showNotification("Success",<?= "'".session()->get('successmsg')."'" ?>,"gritter-success",false);
        </script>
<?php endif; ?>
<?php if (session()->get('errormsg')): ?>
        <script type="text/javascript">
                showNotification("Error",<?= "'".session()->get('errormsg')."'" ?>,"",true);
        </script>
<?php endif; ?>