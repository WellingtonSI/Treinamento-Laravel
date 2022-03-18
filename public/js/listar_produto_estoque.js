$(document).ready( function($){
    base_url = window.location.origin;
   var table = $("#produtos").DataTable({
    ajax: base_url+"/produto-estoque/show",
    serverSide: true,
    reponsive:true,
    processing:true,
    searching: true,
    "order":[0,"desc"],
    columns: [
        {"width":"10%",data:"id",name:"id"},
        {"width":"25%",data:"titulo",name:"titulo"},
        {"width":"5%",data:"valor",name:"valor"},
        {"width":"5%",data:"volume",name:"volume"},
        {"width":"35%",data:"descricao",name:"descricao"},
        {"width":"5%",data:"estoque",name:"estoque"},
        {"width":"15%",data:"acao",name:"acao"},
    ],
   });

   $(document).on("click", ".btnExcluir", function() {
        id = $(this).data('id')
        $.ajax({
            type: "delete",
            url: base_url + "/produto-estoque/"+id,
            dataType: 'json',
            crossDomain: true,
            contentType: "application/json",
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
            success: function() {
                location.reload();
            },
            error: function() {
                alert("Não foi possível excluir!");
            }
        }); 
    });
});


