<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS読み込み-->
    <link rel="stylesheet" href="/css/login.css" >

    <title>Document</title>
</head>
<body>
    <div class="form-wrapper">
        <h1>Sign In</h1>
        <form action="{{ url('/login')}}" method="POST" ncteype="multiprta/form-data">
        @csrf
        <!--ユーザーID　start-->
            <div class="form-item">
                <label for="LoginUserID"></label>
                <input type="text" name="UserID" placeholder="UserID"></input>
            </div>
        <!--ユーザーID　end-->

        <!--password　start-->
            <div class="form-item">
                <label for="password"></label>
                <input type="text" name="PassWord" placeholder="Password"></input>
            </div>
        <!--password　end-->

        <!--サインイン start-->
            <div class="button-panel">
                <input type="submit" class="button" title="Sign In" value="Sign In"></input>
            </div>
            <div class = "warning">
                <p>{{$response}}</p>
            </div>
        <!--サインイン end-->
        </form>
    </div>
</body>
</html>