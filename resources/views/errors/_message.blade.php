<html dir="rtl">

@if (session()->has('success'))

<script type="text/javascript">
    window.onload = function() {
        notif({
            msg: " تم الادخال بنجاح ",
            type: "success",
            time: "10"
        })
    }
</script>
@endif


@if(session()->has('updateStatusOrder'))
<script type="text/javascript">
    window.onload = function() {
        notif({
            msg: "تم تغير حالة الطلب بنجاح",
            type: "success",
            time: "10"
        })
    }
</script>
@endif

@if(session()->has('changeStatusPiadOrder'))
<script type="text/javascript">
    window.onload = function() {
        notif({
            msg: "تم تغير حالة الدفع بنجاح",
            type: "success",
            time: "10"
        })
    }
</script>
@endif

@if(session()->has('info'))
<script type="text/javascript">
    window.onload = function() {
        notif({
            msg: " تم التعديل بنجاح ",
            type: "info",
            time: "10"
        })
    }
</script>
@endif

@if (count($errors) > 0)
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
            <strong>خطأ</strong>
            <ul>

                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

</html>