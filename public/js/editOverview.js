
$(document).ready(function () {
   $('.overview').click(function () {
       $.get('/tutor/profile/over_view').done(function( data ) {
           console.log(data);
           if (!$.trim(data)) {
               results += 'No over view Info data';
           } else {
               $('#title').val(data.title);
               $('#over_view').val(data.over_view);
           }

       }).fail(function() {
           conole.log( "internal server error" );
       });
   }) ;
});