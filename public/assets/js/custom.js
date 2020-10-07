function showNotification(title,text,notificationclass,notifictiontype){
    $.gritter.add({
        title:	title,
        text:	text,
        sticky:  notifictiontype,
        class_name:  notificationclass 
    });
}

function deleteData(id,url,table_id){
    if(confirm("Are you sure you want to delete ?")) {
        $.ajax({
            url : url,
            success : function(msg) {
                showNotification("Success.!",msg,"",true);
                $("#"+table_id).DataTable().ajax.reload(null, false);
            }
        });
    }
}

