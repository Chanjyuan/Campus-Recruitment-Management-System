<div class="table-responsive cart_info">
    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
        <thead>
        <tr class="cart_menu">
            <th>#</th>
            <th class="description">Job Title</th>
            <th class="type">Job Type</th>
            <th class="deadline">Deadline</th>
            <th class="date">Saved On</th>
            <th class="text-center">Action</th>
            </tr>
        </thead>
        @if(count($jobItems) > 0)
        <tbody>
            <?php $no = 1; ?>
            @foreach($jobItems as $item)
            <tr>
                <td>{{$no}}</td>
                <td><a href="{{url('posts',$item['post']['id'])}}">{{ $item['post']['title'] }}</a></td>
                @if ($item['post']['type'] == 1)
                <td>Internship</td>
                @elseif ($item['post']['type'] == 2)
                <td>Full-time</td>
                @else
                <td>Contract</td>
                @endif
                @if (Carbon::now()->toDateString() == $item['post']['deadline'])
                <td>{{Carbon::parse($item['post']['deadline'])->format('d-m-Y')}} <span class="badge badge-secondary ml-2">Today</span></td>
                @else
                <td>{{Carbon::parse($item['post']['deadline'])->format('d-m-Y')}} <span class="badge badge-secondary ml-2">{{Carbon::parse($item['post']['deadline'])->diffForHumans(null, false, true)}}</span></td>
                @endif
                <td>{{Carbon::parse($item['created_at'])->format('d-m-Y')}}</td>
                <td>
                    <div class="input-append" style="text-align: center">
                            <button class="btn btn-outline-danger radius btnItemDelete" type="button" data-savedjobid="{{ $item['id'] }}">Remove</button>
                            {{-- <i class="icon-remove icon-white"></i> --}}
                    </div>
                </td>
                <?php $no++; ?>
            </tr>
            @endforeach
            @else
                {{-- <p>No jobs has been saved.</p> --}}
            @endif
        </tbody>
    </table>
</div>


