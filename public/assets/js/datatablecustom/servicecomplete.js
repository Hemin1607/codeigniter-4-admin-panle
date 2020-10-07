var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
$('#editservicecomplete').click(function(){
    $('#servicecompleteform').css({'display' : 'block'})
    $('#closeservicecomplete').css({'display' : 'block'})
    $('#editservicecomplete').css({'display' : 'none'})
})

$('#closeservicecomplete').click(function(){
    $('#servicecompleteform').css({'display' : 'none'})
    $('#closeservicecomplete').css({'display' : 'none'})
    $('#editservicecomplete').css({'display' : 'block'})
})

$( ".cupsofcoffee" ).blur(function() {
    var coc = $('.cupsofcoffee').val();
    if(coc == null || coc == undefined || coc == "" || isNaN(coc))
        $('.cupsofcoffee').css({'border' : '1px solid red'})
    else
        $('.cupsofcoffee').css({'border' : '1px solid #cccccc'})
});
$( ".project" ).blur(function() {
    var project = $('.project').val();
    if(project == null || project == undefined || project == "" || isNaN(project))
        $('.project').css({'border' : '1px solid red'})
    else
        $('.project').css({'border' : '1px solid #cccccc'})
});
$( ".clients" ).blur(function() {
    var clients = $( ".clients" ).val();
    if(clients == null || clients == undefined || clients == "" || isNaN(clients))
        $('.clients').css({'border' : '1px solid red'})
    else
        $('.clients').css({'border' : '1px solid #cccccc'})
});
$( ".partners" ).blur(function() {
    var partners = $('.partners').val();
    if(partners == null || partners == undefined || partners == "" || isNaN(partners) )
        $('.partners').css({'border' : '1px solid red'})
    else
        $('.partners').css({'border' : '1px solid #cccccc'})
});

$( "#servicecomplete_from" ).click(function(  ) {
    var coc = $('.cupsofcoffee').val();
    var project = $('.project').val();
    var clients = $( ".clients" ).val();
    var partners = $('.partners').val();
    if(coc == null || coc == undefined || coc == "" || isNaN(coc))
        $('.cupsofcoffee').css({'border' : '1px solid red'})
    else if(project == null || project == undefined || project == "" || isNaN(project))
        $('.project').css({'border' : '1px solid red'})
    else if(clients == null || clients == undefined || clients == "" || isNaN(clients))
        $('.clients').css({'border' : '1px solid red'})
    else if(partners == null || partners == undefined || partners == "" || isNaN(partners) )
        $('.partners').css({'border' : '1px solid red'})
    else{
        var id = $('#service_complete_id').val();
        var dataObject = {
            cupsofcoffee : coc,
            project : project,
            clients : clients,
            partners : partners,
            id : id
        }
        $.ajax({
            url: "/adminpanel_ci/public/admin/servicecomplete/savedata", 
            type: "POST",
            data : dataObject,
            success: function(result){
                if(result){
                    showNotification("Success","Service Updated Successfully","gritter-success",false);
                }else{
                    showNotification("Error","Somthing wrong, Service not updated ","",true);
                }
            }
        });
    }
    
})


$( ".address" ).blur(function() {
    var coc = $('.address').val();
    if(coc == null || coc == undefined || coc == "" )
        $('.address').css({'border' : '1px solid red'})
    else
        $('.address').css({'border' : '1px solid #cccccc'})
});
$( ".email" ).blur(function() {
    var email = $('.email').val();
    if(email == null || email == undefined || email == "" ||  !email.match(mailformat))
        $('.email').css({'border' : '1px solid red'})
    else
        $('.email').css({'border' : '1px solid #cccccc'})
});
$( ".contactno" ).blur(function() {
    var contactno = $( ".contactno" ).val();
    if(contactno == null || contactno == undefined || contactno == "" )
        $('.contactno').css({'border' : '1px solid red'})
    else
        $('.contactno').css({'border' : '1px solid #cccccc'})
});


$( "#servicecontact_from" ).click(function(  ) {
    var coc = $('.address').val();
    var email = $('.email').val();
    var contactno = $( ".contactno" ).val();
    
    if(coc == null || coc == undefined || coc == "" )
        $('.address').css({'border' : '1px solid red'})
    else if(email == null || email == undefined || email == ""  ||  !email.match(mailformat))
        $('.email').css({'border' : '1px solid red'})
    else if(contactno == null || contactno == undefined || contactno == "" )
        $('.contactno').css({'border' : '1px solid red'})
   
    else{
        var id = $('#service_complete_id').val();
        var dataObject = {
            address : coc,
            email : email,
            contactno : contactno,
            id : id
        }
        $.ajax({
            url: "/adminpanel_ci/public/admin/contact/savedata", 
            type: "POST",
            data : dataObject,
            success: function(result){
                if(result){
                    showNotification("Success","Service Updated Successfully","gritter-success",false);
                }else{
                    showNotification("Error","Somthing wrong, Service not updated ","",true);
                }
            }
        });
    }
    
})
