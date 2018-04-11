@extends('welcome')

@section('content')
    <form class="create-excel">
        {{csrf_field()}}
        <div class="form-group">
            <label for="" class="control-label">Фамилия</label>
            <input type="text" class="form-control" name="lastname">
            
        </div>
        <div class="form-group">
            <label for="" class="control-label">Имя</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Отчество</label>
            <input type="text" class="form-control" name="secondname">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Год рождения</label>
            <input type="text" class="form-control" name="bth">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Должность</label>
            <input type="text" class="form-control" name="position">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Зарплата</label>
            <input type="text" class="form-control" name="salary">
        </div>

        <div class="form-group">
            <input type="submit" id="create" value="Создать" class="btn btn-primary">
        </div>
    </form>
<script type="text/javascript">
    $(document).ready(function($) {
        $('#create').on('click', function(event) {
            event.preventDefault();
            var $form = $('.create-excel'),
                $self = $(this),
                data = $form.serialize();

            $form.find('.text-danger').remove();
            $.ajax({
                url: '/store',
                type: 'POST',
                dataType: 'json',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(json){
                    if (json['error']){
                        $.each(json['error'], function (i, val) {
                            $form.find('[name="' + i + '"]').after('<div class="text-danger">' + val + '</div>');
                        });
                    }else{
                        window.location.href = json['redirect']
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    
                    alert(
                        "Status Text: " + xhr.statusText + "\n" + 
                        "Status: " + xhr.status + "\n" , 
                        "Response Text : " + xhr.responseText + "\n" , 
                        "Ajax Options : " + ajaxOptions + "\n",
                        "Thrown Error : " + thrownError + "\n"
                    );
                }
            });
            

        });   
    });
</script>
@endsection