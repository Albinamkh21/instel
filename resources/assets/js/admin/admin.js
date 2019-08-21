function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "Заголовок диалога";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
    }
    this.ok = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
}
var Alert = new CustomAlert();
function deletePost(id){
    var db_id = id.replace("post_", "");
    // Run Ajax request here to delete post from database
    document.body.removeChild(document.getElementById(id));
}
function CustomConfirm(){
    this.render = function(dialog,op,id){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";

        document.getElementById('dialogboxhead').innerHTML = "Confirm that action";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '<button type="button" class = "btn btn-default"  onclick="Confirm.yes(\''+op+'\',\''+id+'\')">Yes</button> <button button type="button" class = "btn btn-default" onclick="Confirm.no()">No</button>';
    }
    this.no = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
    this.yes = function(op,frm){
        if(op == "delete_item"){
            $(frm).submit();
        }
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
}
var Confirm = new CustomConfirm();

//menu
$(document).on('click', '.form-delete' ,function(e){
    e.preventDefault();
    console.log('confirm-new');
    if( e.target.closest('button').className && e.target.closest('button').className == 'btn btn-danger') {
        console.log(e.target.closest('button').id);
        var id = e.target.closest('button').id;
        var frm = "#deleteForm" + id;


        Confirm.render('Вы хотите удалить запись?','delete_item',frm);

    }
});
/*

//menu
$(document).on('click', '.form-delete' ,function(e){
   e.preventDefault();
   if( e.target.closest('button').className && e.target.closest('button').className == 'btn btn-danger') {
       console.log(e.target.closest('button').id);
       var id =  e.target.closest('button').id;
        var frm = "#deleteForm" + id;

       $.confirm({
           title: 'Подтверждение действия',
           content: 'Вы действительно хотите удалить этот пункт меню?',
           buttons: {
               confirm: function (data) {
                   $(frm).submit();
               },
               cancel: function () {
                   $.alert('Canceled!');
               }
           }
       });
   }


});
*/
//accordion
$(document).ready(function() {
    $('#accordion').on('click', 'input[type=radio]', function (e, obj) {
        $('#accordion .menu-type-list').css('display', 'none');
        $(e.target).parent().next('.menu-type-list').css('display', 'block');

    })
});
