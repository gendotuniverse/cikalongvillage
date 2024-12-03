<table class="table table-bordered">
    @foreach ($sheetData as $row)
        <tr>
            @foreach ($row as $cell)
                <td>{{ $cell }}</td>
            @endforeach
        </tr>
    @endforeach
</table>
