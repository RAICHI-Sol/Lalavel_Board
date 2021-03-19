<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" >
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <table>
            <tr>
                <th>【名前】</th>
                <th>【ユーザID】</th>
                <th>【パスワード】</th>
                <th>【アカウント作成日】</th>
            </tr>
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->user_id}}</td>
                <td>{{$item->password}}</td>
                <td>{{$item->created_at}}</td>
            </tr>  
        </table>
    </body>
</html>