<table class="table table-sm text-slate-400 w-full">
    <tr>
        <th colspan="3">Log:</th>
    </tr>
    <tr>
        <th class="w-5/6">Parsed Formula</th>
        <th class="">&nbsp;</th>
        <th class="">Answer</th>
    </tr>
    @if(session()->has('success'))
        <tr>
            <th colspan="3" class="text-green-900">{{session('success')}}</th>
        </tr>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            <tr>
                <th colspan="3" class="text-red-900">{{$error}}</th>
            </tr>
        @endforeach
    @endif
    @foreach($calculations ?? [['calculation' => '2+2', 'response' => '4']] as $calculation)
        <tr class="hover:bg-gray-600">
            <td>{{$calculation['calculation']}}</td>
            <td>=</td>
            <td>{{$calculation['response']}}</td>
        </tr>
    @endforeach
</table>
