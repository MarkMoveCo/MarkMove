@extends('layouts.default')

@section('style')
<link href="{{ asset('/css/user/profile.css') }}" rel="stylesheet">
@endsection

@section('title')
    Permissions
@endsection

@section('content')
    <div class="panel">
        <table class="table table-striped table-bordered table-list">
            <thead>
            <tr>
                <th>Users</th>
                <th style="text-align: center">ROLE</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Name of the user</td>
                <td style="text-align: center">
                    <input type="checkbox"/>
                </td>
            </tr>
            </tbody>
        </table>

        <input class="btn btn-default btn-block" type="submit" name="change_roles" value ="Save" onclick="saveChanges()"/>
    </div>
@endsection