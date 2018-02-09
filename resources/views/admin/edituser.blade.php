@extends('layout.index')

@section('headtitle')
   User Edit
@stop

@section('header')
    <strong> User Edit </strong>
@stop

@section('content')
{!! html()->form('post',route('users.update', $user->id))->class('form')->open() !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PUT') }}
    <div class="form-group">
            {!! html()->label('Name :', 'name') !!}&nbsp;
            {!! html()->text('name')->class('form-control')->value($user->name) !!}
    </div>

    <div class="form-group">
        {!! html()->checkbox('isapprove')->checked(($user->is_approve == '1')? 'checked' :'')!!}
        {!! html()->label(' Is Approve ?', 'isapprove') !!} &nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <div class="form-group">
            {!! html()->submit('Update','update')->class('btn btn-success') !!}
            {!! html()->a(route('users.index'),'Back')->class('btn btn-primary') !!}
    </div>

{!! html()->form()->close() !!} <br/>
@stop