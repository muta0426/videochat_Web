@section('submenu')

@foreach($w_collection as $m)
<details class="member_accordion">
    <summary>{{$m['workspaceName']}}</summary>

    <details class="member_list">
        <summary>メンバー</summary>
        @foreach($m_collection as $members)
        @if($m['workspaceID'] === $members['workspaceID'])
        @if($correct_user_id != $members['userID'])
        <div class = "member_info">
            <p class = "member"><img class="member_icon" src="{{ asset('img/initial.png') }}" alt="">{{$members['userName']}}</p>
        </div>
        @endif
        @endif
        @endforeach
    </details>

    <details class="group_list">
        <summary>グループ</summary>
        @foreach($g_collection as $groups)
        @if($m['workspaceID'] === $groups['workspaceID'])
        <div class = "group_info">
            <p><img class="member_icon" src="{{ asset('img/initial.png') }}" alt="">{{$groups['groupName']}}</p>
        </div>
        @endif
        @endforeach
    </details>

</details>
@endforeach


@endsection