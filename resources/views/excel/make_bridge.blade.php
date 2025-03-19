<table>
    <thead>
        <tr>
            @foreach($exportCols as $col)
                <th>{{ $col }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($make_bridges as $make_bridge)
            <tr>
                @foreach($exportCols as $col)
                    <td>{{ $make_bridge->$col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>