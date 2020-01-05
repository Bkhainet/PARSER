@if(Session::has('flash_message'))
<div class = "alert alert-success" role="alert">
    <div class="container"> 
    <div class="row mb-3">
        <h2>Результат</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <th scope="col" >id</th>

                        <th scope="col" >Домен</th>

                        <th scope="col" >Позиция в Google</th>

                        <th scope="col" >Ключивое слово</th>

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
                                <div>{{$table->id_Google}}</div>
                            </td>
                            <td>
                                <div>{{$table->word}}</div>
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
    </div>
</div>
@endif