<select class="custom-select">
    <option value="" selected>All Companies</option>
    @foreach ($companies as $company)
        <option value="{{$company['id']}}">{{$company['name']}}</option>
    @endforeach
</select>