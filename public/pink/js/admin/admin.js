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

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFkbWluLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFkbWluLmpzIiwic291cmNlc0NvbnRlbnQiOlsiZnVuY3Rpb24gQ3VzdG9tQWxlcnQoKXtcclxuICAgIHRoaXMucmVuZGVyID0gZnVuY3Rpb24oZGlhbG9nKXtcclxuICAgICAgICB2YXIgd2luVyA9IHdpbmRvdy5pbm5lcldpZHRoO1xyXG4gICAgICAgIHZhciB3aW5IID0gd2luZG93LmlubmVySGVpZ2h0O1xyXG4gICAgICAgIHZhciBkaWFsb2dvdmVybGF5ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2RpYWxvZ292ZXJsYXknKTtcclxuICAgICAgICB2YXIgZGlhbG9nYm94ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2RpYWxvZ2JveCcpO1xyXG4gICAgICAgIGRpYWxvZ292ZXJsYXkuc3R5bGUuZGlzcGxheSA9IFwiYmxvY2tcIjtcclxuICAgICAgICBkaWFsb2dvdmVybGF5LnN0eWxlLmhlaWdodCA9IHdpbkgrXCJweFwiO1xyXG4gICAgICAgIGRpYWxvZ2JveC5zdHlsZS5sZWZ0ID0gKHdpblcvMikgLSAoNTUwICogLjUpK1wicHhcIjtcclxuICAgICAgICBkaWFsb2dib3guc3R5bGUudG9wID0gXCIxMDBweFwiO1xyXG4gICAgICAgIGRpYWxvZ2JveC5zdHlsZS5kaXNwbGF5ID0gXCJibG9ja1wiO1xyXG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkaWFsb2dib3hoZWFkJykuaW5uZXJIVE1MID0gXCLQl9Cw0LPQvtC70L7QstC+0Log0LTQuNCw0LvQvtCz0LBcIjtcclxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZGlhbG9nYm94Ym9keScpLmlubmVySFRNTCA9IGRpYWxvZztcclxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZGlhbG9nYm94Zm9vdCcpLmlubmVySFRNTCA9ICc8YnV0dG9uIG9uY2xpY2s9XCJBbGVydC5vaygpXCI+T0s8L2J1dHRvbj4nO1xyXG4gICAgfVxyXG4gICAgdGhpcy5vayA9IGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2RpYWxvZ2JveCcpLnN0eWxlLmRpc3BsYXkgPSBcIm5vbmVcIjtcclxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZGlhbG9nb3ZlcmxheScpLnN0eWxlLmRpc3BsYXkgPSBcIm5vbmVcIjtcclxuICAgIH1cclxufVxyXG52YXIgQWxlcnQgPSBuZXcgQ3VzdG9tQWxlcnQoKTtcclxuZnVuY3Rpb24gZGVsZXRlUG9zdChpZCl7XHJcbiAgICB2YXIgZGJfaWQgPSBpZC5yZXBsYWNlKFwicG9zdF9cIiwgXCJcIik7XHJcbiAgICAvLyBSdW4gQWpheCByZXF1ZXN0IGhlcmUgdG8gZGVsZXRlIHBvc3QgZnJvbSBkYXRhYmFzZVxyXG4gICAgZG9jdW1lbnQuYm9keS5yZW1vdmVDaGlsZChkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCkpO1xyXG59XHJcbmZ1bmN0aW9uIEN1c3RvbUNvbmZpcm0oKXtcclxuICAgIHRoaXMucmVuZGVyID0gZnVuY3Rpb24oZGlhbG9nLG9wLGlkKXtcclxuICAgICAgICB2YXIgd2luVyA9IHdpbmRvdy5pbm5lcldpZHRoO1xyXG4gICAgICAgIHZhciB3aW5IID0gd2luZG93LmlubmVySGVpZ2h0O1xyXG4gICAgICAgIHZhciBkaWFsb2dvdmVybGF5ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2RpYWxvZ292ZXJsYXknKTtcclxuICAgICAgICB2YXIgZGlhbG9nYm94ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2RpYWxvZ2JveCcpO1xyXG4gICAgICAgIGRpYWxvZ292ZXJsYXkuc3R5bGUuZGlzcGxheSA9IFwiYmxvY2tcIjtcclxuICAgICAgICBkaWFsb2dvdmVybGF5LnN0eWxlLmhlaWdodCA9IHdpbkgrXCJweFwiO1xyXG4gICAgICAgIGRpYWxvZ2JveC5zdHlsZS5sZWZ0ID0gKHdpblcvMikgLSAoNTUwICogLjUpK1wicHhcIjtcclxuICAgICAgICBkaWFsb2dib3guc3R5bGUudG9wID0gXCIxMDBweFwiO1xyXG4gICAgICAgIGRpYWxvZ2JveC5zdHlsZS5kaXNwbGF5ID0gXCJibG9ja1wiO1xyXG5cclxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZGlhbG9nYm94aGVhZCcpLmlubmVySFRNTCA9IFwiQ29uZmlybSB0aGF0IGFjdGlvblwiO1xyXG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkaWFsb2dib3hib2R5JykuaW5uZXJIVE1MID0gZGlhbG9nO1xyXG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkaWFsb2dib3hmb290JykuaW5uZXJIVE1MID0gJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzID0gXCJidG4gYnRuLWRlZmF1bHRcIiAgb25jbGljaz1cIkNvbmZpcm0ueWVzKFxcJycrb3ArJ1xcJyxcXCcnK2lkKydcXCcpXCI+WWVzPC9idXR0b24+IDxidXR0b24gYnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcyA9IFwiYnRuIGJ0bi1kZWZhdWx0XCIgb25jbGljaz1cIkNvbmZpcm0ubm8oKVwiPk5vPC9idXR0b24+JztcclxuICAgIH1cclxuICAgIHRoaXMubm8gPSBmdW5jdGlvbigpe1xyXG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkaWFsb2dib3gnKS5zdHlsZS5kaXNwbGF5ID0gXCJub25lXCI7XHJcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2RpYWxvZ292ZXJsYXknKS5zdHlsZS5kaXNwbGF5ID0gXCJub25lXCI7XHJcbiAgICB9XHJcbiAgICB0aGlzLnllcyA9IGZ1bmN0aW9uKG9wLGZybSl7XHJcbiAgICAgICAgaWYob3AgPT0gXCJkZWxldGVfaXRlbVwiKXtcclxuICAgICAgICAgICAgJChmcm0pLnN1Ym1pdCgpO1xyXG4gICAgICAgIH1cclxuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZGlhbG9nYm94Jykuc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiO1xyXG4gICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdkaWFsb2dvdmVybGF5Jykuc3R5bGUuZGlzcGxheSA9IFwibm9uZVwiO1xyXG4gICAgfVxyXG59XHJcbnZhciBDb25maXJtID0gbmV3IEN1c3RvbUNvbmZpcm0oKTtcclxuXHJcbi8vbWVudVxyXG4kKGRvY3VtZW50KS5vbignY2xpY2snLCAnLmZvcm0tZGVsZXRlJyAsZnVuY3Rpb24oZSl7XHJcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICBjb25zb2xlLmxvZygnY29uZmlybS1uZXcnKTtcclxuICAgIGlmKCBlLnRhcmdldC5jbG9zZXN0KCdidXR0b24nKS5jbGFzc05hbWUgJiYgZS50YXJnZXQuY2xvc2VzdCgnYnV0dG9uJykuY2xhc3NOYW1lID09ICdidG4gYnRuLWRhbmdlcicpIHtcclxuICAgICAgICBjb25zb2xlLmxvZyhlLnRhcmdldC5jbG9zZXN0KCdidXR0b24nKS5pZCk7XHJcbiAgICAgICAgdmFyIGlkID0gZS50YXJnZXQuY2xvc2VzdCgnYnV0dG9uJykuaWQ7XHJcbiAgICAgICAgdmFyIGZybSA9IFwiI2RlbGV0ZUZvcm1cIiArIGlkO1xyXG5cclxuXHJcbiAgICAgICAgQ29uZmlybS5yZW5kZXIoJ9CS0Ysg0YXQvtGC0LjRgtC1INGD0LTQsNC70LjRgtGMINC30LDQv9C40YHRjD8nLCdkZWxldGVfaXRlbScsZnJtKTtcclxuXHJcbiAgICB9XHJcbn0pO1xyXG4vKlxyXG5cclxuLy9tZW51XHJcbiQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcuZm9ybS1kZWxldGUnICxmdW5jdGlvbihlKXtcclxuICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICBpZiggZS50YXJnZXQuY2xvc2VzdCgnYnV0dG9uJykuY2xhc3NOYW1lICYmIGUudGFyZ2V0LmNsb3Nlc3QoJ2J1dHRvbicpLmNsYXNzTmFtZSA9PSAnYnRuIGJ0bi1kYW5nZXInKSB7XHJcbiAgICAgICBjb25zb2xlLmxvZyhlLnRhcmdldC5jbG9zZXN0KCdidXR0b24nKS5pZCk7XHJcbiAgICAgICB2YXIgaWQgPSAgZS50YXJnZXQuY2xvc2VzdCgnYnV0dG9uJykuaWQ7XHJcbiAgICAgICAgdmFyIGZybSA9IFwiI2RlbGV0ZUZvcm1cIiArIGlkO1xyXG5cclxuICAgICAgICQuY29uZmlybSh7XHJcbiAgICAgICAgICAgdGl0bGU6ICfQn9C+0LTRgtCy0LXRgNC20LTQtdC90LjQtSDQtNC10LnRgdGC0LLQuNGPJyxcclxuICAgICAgICAgICBjb250ZW50OiAn0JLRiyDQtNC10LnRgdGC0LLQuNGC0LXQu9GM0L3QviDRhdC+0YLQuNGC0LUg0YPQtNCw0LvQuNGC0Ywg0Y3RgtC+0YIg0L/Rg9C90LrRgiDQvNC10L3Rjj8nLFxyXG4gICAgICAgICAgIGJ1dHRvbnM6IHtcclxuICAgICAgICAgICAgICAgY29uZmlybTogZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgICAgICQoZnJtKS5zdWJtaXQoKTtcclxuICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgY2FuY2VsOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAkLmFsZXJ0KCdDYW5jZWxlZCEnKTtcclxuICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgIH1cclxuICAgICAgIH0pO1xyXG4gICB9XHJcblxyXG5cclxufSk7XHJcbiovXHJcbi8vYWNjb3JkaW9uXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xyXG4gICAgJCgnI2FjY29yZGlvbicpLm9uKCdjbGljaycsICdpbnB1dFt0eXBlPXJhZGlvXScsIGZ1bmN0aW9uIChlLCBvYmopIHtcclxuICAgICAgICAkKCcjYWNjb3JkaW9uIC5tZW51LXR5cGUtbGlzdCcpLmNzcygnZGlzcGxheScsICdub25lJyk7XHJcbiAgICAgICAgJChlLnRhcmdldCkucGFyZW50KCkubmV4dCgnLm1lbnUtdHlwZS1saXN0JykuY3NzKCdkaXNwbGF5JywgJ2Jsb2NrJyk7XHJcblxyXG4gICAgfSlcclxufSk7XHJcbiJdfQ==
