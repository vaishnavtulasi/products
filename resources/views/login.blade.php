<html>
<head>

    <title>Login</title>
    @include('layout/link')

</head>
<body style="background-color: #1b1e21">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"><br/><br/><br/><br/><br/><br/><br/>
        <div class="card mb-3">

            <div class="card-header">
                Login Form
            </div>
            <br/>

            <div class="container">

                {{ html()->form('post',route('checkuser'))->open() }}

                <div class="form-group">
                    {{ html()->label('Email :','email') }}
                    {{ html()->text('email')->class('form-control')->placeholder('Enter Email.') }}
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="form-group">

                    {{ html()->label('Password :','password') }}
                    {{ html()->password('password')->class('form-control')->placeholder('Enter Password.') }}
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>

                <div>
                    {{ html()->submit('Login','submit')->class('btn btn-success') }}
                </div>
                <br/>

                {{ html()->form()->close() }}
            </div>

        </div>
    </div>


</div>

</body>
</html>







