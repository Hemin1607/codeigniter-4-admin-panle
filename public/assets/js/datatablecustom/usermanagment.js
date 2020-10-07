
table = $('#table_id').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/usermanagement/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [0],
        "orderable" : false
    }],
    "columns": [
        { "title": "First name" },
        { "title": "Last name" },
        { "title": "Email" },
        { "title": "Role" },
        { "title": "Image" },
        { "title": "Action" },
    ]
});

table1 = $('#home_tbl').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/home/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [3],
        "orderable" : false
    }],
    "columns": [
        { "title": "Title" },
        { "title": "Description" },
        { "title": "Image" },
        { "title": "Action" },
    ]
});

table1 = $('#about_tbl').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/about/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [2],
        "orderable" : false
    }],
    "columns": [
        { "title": "Title" },
        { "title": "Description" },
        { "title": "Action" },
    ]
});

table1 = $('#aboutskill_tbl').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/aboutskill/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [2],
        "orderable" : false
    }],
    "columns": [
        { "title": "Title" },
        { "title": "Icon" },
        { "title": "Action" },
    ]
});

tableservice = $('#service_tbl').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/service/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [2],
        "orderable" : false
    }],
    "columns": [
        { "title": "Title" },
        { "title": "Icon" },
        { "title": "Action" },
    ]
});

tableskill =$('#skill_tbl').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/skills/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [3],
        "orderable" : false
    }],
    "columns": [
        { "title": "Title" },
        { "title": "Description" },
        { "title": "Percentage" },
        { "title": "Action" },
    ]
});

tableskill =$('#education_tbl').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/education/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [6],
        "orderable" : false
    }],
    "columns": [
        { "title": "Title" },{"title" : "School / University"},
        {"title" : "Passing Year/Month"},{"title" : "Grade / Percentage"},
        { "title": "Description" },
        { "title": "Address" },
        { "title": "Action" },
    ]
});

tableskill =$('#workexperience_tbl').DataTable({
    "order" : [],
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        "url" : "/adminpanel_ci/public/admin/workexperience/table_data",
        "type" : "POST"
    },
    "columnDefs" : [{
        "targets" : [4],
        "orderable" : false
    }],
    "columns": [
        { "title": "Title" },
        {"title" : "Year/Month"},
        { "title": "Description" },
        { "title": "Address" },
        { "title": "Action" },
    ]
});
