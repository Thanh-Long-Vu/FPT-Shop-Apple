@if(isset($specification) && !empty($specification))
    <div class="mx-md-5 pt-1">
        <h3 class="font-size-18 mb-4">Technical Specifications</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    @foreach($specification as $key => $val)
                        <tr>
                            <th class="px-4 px-xl-5 border-top-0">{{$key}}</th>
                            <td class="border-top-0">{{$val === "No" ? "" : $val}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
