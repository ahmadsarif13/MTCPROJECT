<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="3">
                    <p>MTC PROJECT
                    </p>
                    <hr size="2px" color="black" />
                </th>
            </tr>
            <tr>
                <th colspan="3" style="text-align: right">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Tgl : {{ date('d/m/Y', strtotime($data->updated_at)) }}
                </th>
            </tr>
            <tr>
                <th colspan="3" style="text-align: left">Kode #{{ $data->id }}</th>
            </tr>
            <tr>
                <th colspan="3">
                    <hr>
                </th>
            </tr>
        </thead>
        <tbody>
            </tr>
                <td colspan="3">Kerusakan :</td>
            <tr>
            <tr>            
                <td colspan="3">
                    {{ $data->damage }} 
                </td>
            </tr>
            <tr>
                <td colspan="3">Detail :</td>
            </tr>
            <tr>
                <td  colspan="3">
                    {{ $data->details }} 
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">Terima Kasih</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">Telah melakukan request perbaikan</td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr />
                </td>
            </tr>
        </tbody>
    </table>
</body>
<script>
    // print()
</script>

</html>