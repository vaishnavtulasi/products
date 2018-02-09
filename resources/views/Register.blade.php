<html>
<head>

    <title>Register</title>
    @include('layout/link')

</head>
<body style="background-color: #1b1e21">
<div class="row" >
    <div class="col-md-3">
    </div>
    <div class="col-md-5"><br/><br/><br/><br/>
        <div class="card mb-4">

            <div class="card-header">
                Register Form
            </div><br/>

            <div class="container">
                {{ html()->form('post', route('post:register'))->class('panel')->id('login-form')->open() }}
                <div>
                    @if(Session::has('success'))
                        <span class="text-success"> {{ Session::get('success') }} </span>
                    @endif

                </div>
                <div class="form-group">
                    {{ html()->label('UserName :','name') }}
                    {{ html()->text('Username')->class('form-control')->placeholder('Enter Username.') }}
                    <span class="text-danger">{{ $errors->first('Username') }}</span>
                </div>

                <div class="form-group">
                    {{ html()->label('Email :','email') }}
                    {{ html()->text('Email')->class('form-control')->placeholder('Enter Email.') }}
                    <span class="text-danger">{{ $errors->first('Email') }}</span>
                </div>

                <div class="form-group">
                    {{ html()->label('Password :','password') }}
                    {{ html()->password('Password')->class('form-control')->placeholder('Enter Password.') }}
                    <span class="text-danger">{{ $errors->first('Password') }}</span>
                </div>

                <div class="form-group">
                    {{ html()->label('Retype Password :','conpass') }}
                    {{ html()->password('Confirm_Password')->class('form-control')->placeholder('Enter Retype Password.') }}
                    <span class="text-danger">{{ $errors->first('Confirm_Password') }}</span>
                </div>

                <!-- Button -->
                <div class="form-group">
                    {{ html()->submit('Register','submit')->class(' btn btn-success') }}

                    {{ html()->a(route('login'),'Login')->class(' btn btn-info') }}
                </div>

                </fieldset>
                {{ html()->form()->close() }}
            </div>


        </div>
    </div>
</div>


</body>
</html>
