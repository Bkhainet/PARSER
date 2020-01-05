@if(count($errors) > 0)
<div class = "alert alert-danger">
    <div class="container"> 
        <div class="row mb-3">
            <strong>Что то пошло не так!</strong>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endif



