<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($make_bridge_events as $make_bridge_event)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $make_bridge_event->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>