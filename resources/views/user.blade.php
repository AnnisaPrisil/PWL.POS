<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
        .user-box {
            border: 1px solid blue;
            padding: 20px;
            width: 200px;
            text-align: center;
        }
        .user-box table {
            margin: 0 auto;
            border-collapse: collapse;
        }
        .user-box th, .user-box td {
            border: 1px solid gray;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="user-box">
        <h2>Data User</h2>
        <table>
            <tr>
                <th>Jumlah Pengguna</th>
            </tr>
            <tr>
                <td>{{ $data }}</td>
            </tr>
        </table>
    </div>
</body>
</html>