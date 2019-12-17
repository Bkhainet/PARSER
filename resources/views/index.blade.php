@extends('layouts.welcome')

@section('content')
<div class ="card-body">
    <form action ="{{url('key')}}" method="POST" class ="form-horizontal">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group">
                <label for="ParseGoogle" class="col-sm-6 control-label">
                Key Word
                </label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="key_word" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success">START</button> 
                    </div>
                </div>
                <label for="ParseGoogle" class="col-sm-6 control-label">
                Key Domaine
                </label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="key_domaine" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

    <div class="col-lg-12">
        <div class="card-heading">
            PARSER GOOGLE
        </div>
        <div class="col-lg-6">
            <table class="table table-striped table-dark">
                <thead>
                    <th scope="col" >ID</th>

                    <th scope="col" >Домен</th>

                    <th scope="col" >Заголовки</th>

                    <th scope="col" >Ключивое слово</th>

                    <th scope="col" >Номер позиции</th>

                    <th scope="col" >Дата выборки</th>

                </thead>
                <tbody>
                @foreach ($parse_googles as $table)
                <tr>
                    <td>
                        <div>{{$table->id}}</div>
                    </td>
                    <td>
                        <div>{{$table->domaine_name}}</div>
                    </td>
                    <td>
                        <div>{{$table->key_word}}</div>
                    </td>
                    <td>
                        <div>{{$table->word}}</div>
                    </td>
                    <td>
                        <div>{{$table->id_Google}}</div>
                    </td>
                    <td>
                        <div>{{$table->Time}}</div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
@endsection

@section('footer')
@endsection