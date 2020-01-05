<main role="main" class="container">
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <form action ="{{url('key')}}" method="POST" class ="form-horizontal">
        {{csrf_field()}}
    <div class="container"> 
        <div class="row mb-3">
            <div class="col-6 themed-grid-col">
                Ключивое слово
            </div>
            <div class="col-6 themed-grid-col">
                Домен
            </div>
        </div>
    </div>
    <div class="container"> 
        <div class="row mb-3">
            <div class="col-6 themed-grid-col">
                <input type="text" name="key_word" class="form-control">
            </div>
            <div class="col-6 themed-grid-col">
                <input type="text" name="key_domaine" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Запросить</button> 
    </div>
    </form> 

</div>
</main>