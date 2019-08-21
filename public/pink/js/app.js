
$(document).on('click', 'button' ,function(e){
    e.preventDefault();
    console.log(e.target);
    if($(e.target).is('button')) {
        console.log(e);
        var frm = "#deleteMenu" + e.target.id;
        console.log(e.target);
        console.log(e.target.class );

        $.confirm({
            title: 'Confirm!',
            content: 'Simple confirm!',
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


//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFkbWluLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyJcclxuJChkb2N1bWVudCkub24oJ2NsaWNrJywgJ2J1dHRvbicgLGZ1bmN0aW9uKGUpe1xyXG4gICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgY29uc29sZS5sb2coZS50YXJnZXQpO1xyXG4gICAgaWYoJChlLnRhcmdldCkuaXMoJ2J1dHRvbicpKSB7XHJcbiAgICAgICAgY29uc29sZS5sb2coZSk7XHJcbiAgICAgICAgdmFyIGZybSA9IFwiI2RlbGV0ZU1lbnVcIiArIGUudGFyZ2V0LmlkO1xyXG4gICAgICAgIGNvbnNvbGUubG9nKGUudGFyZ2V0KTtcclxuICAgICAgICBjb25zb2xlLmxvZyhlLnRhcmdldC5jbGFzcyApO1xyXG5cclxuICAgICAgICAkLmNvbmZpcm0oe1xyXG4gICAgICAgICAgICB0aXRsZTogJ0NvbmZpcm0hJyxcclxuICAgICAgICAgICAgY29udGVudDogJ1NpbXBsZSBjb25maXJtIScsXHJcbiAgICAgICAgICAgIGJ1dHRvbnM6IHtcclxuICAgICAgICAgICAgICAgIGNvbmZpcm06IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJChmcm0pLnN1Ym1pdCgpO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIGNhbmNlbDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICQuYWxlcnQoJ0NhbmNlbGVkIScpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG59KTtcclxuXHJcbiJdfQ==
