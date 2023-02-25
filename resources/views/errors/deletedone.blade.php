 @if (session()->has('delete'))

     <script type="text/javascript">
         window.onload = function() {
             notif({
                 msg: " تم الحزف بنجاح",
                 type: "warning",
                 time: "10"
             })
         }

     </script>
 @endif
