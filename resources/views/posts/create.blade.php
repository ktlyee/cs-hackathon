@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="{!!asset('css/styleIndex.css')!!}">
<link rel="stylesheet" href="{!!asset('css/styleCreate.css')!!}">
@section('title','CreatePost')

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12"><br><br>
            <h2 align="center"><b> CREATE A POST </b></h2><br>

            <!-- ดักข้อมูล -->
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul> @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success')}}</p>
            </div>
            @endif

            <form method="post" action="{{url('posts')}}">
                {{csrf_field()}}
                <!-- <div class = "form-group">
                    <input type="text" name= "schoolname" class="form-control" placeholder="Firstname"/>
                </div> -->

                <div class="form-group">
                    <input type="text" name="schoolname" class="form-control" placeholder="School name or Topic" />
                </div>
                <h3 style="color:red;">**Please read**</h3>
                <p style="color:gray;">The school or people who have information about rural school (we want school that hard to contact)
                    Please give a truth infomation.
                    Like </p>
                <ol style="color:gray;">
                    <li>Address</li>
                    <li>Travelling</li>
                    <li>What teacher want to train about soft skill and "O-NET"</li>
                    <li>What books do they want</li>
                </ol><br>
                <p style="color:gray;">Ps. We want small rural school that has students 20-30 person.</p>
                <div class="form-group">
                    <label for="comment">DESCRIPTION:</label>
                    <textarea name="description" class="form-control" rows="5" id="comment" placeholder="" value="type your info"></textarea>
                </div>

                <div class="form-group">
                    <input type="text" name="phonenumber" class="form-control" placeholder="Your phone number" maxlength="10" />
                </div>

             
                <!-- normal person -->
                @if(Auth::check() == false)
                <select name="check" class="btn" id="person" style="background-color : red; color:white;">
                    <option value="0">unapproved</option>
                </select>
                <select name="difficult" class="btn" id="person" style="background-color : red; color:white;">
                    <option value="0">unspecified</option>
                </select>
                <select name="success" class="btn" id="person" style="background-color : red; color:white;">
                    <option value="0">unsuccess</option>
                </select>
                @endif

                <!-- Admin -->
                @if(Auth::check() && Auth::user()->roleid == 1)
                <select name="check" id="admin" class="btn" style="background-color : red; color:white;">
                    <option value="0" data-color="red" selected>unapproved</option>
                    <option value="1" data-color="green">approved</option>
                </select>
                <select name="difficult" id="hard" class="btn" style="background-color : #e8bb1f; color:white;">
                    <option value="1" data-color="#e8bb1f" selected>hard</option>
                    <option value="2" data-color="#f25821">very hard</option>
                    <option value="3" data-color="#c92428">extremly hard</option>
                </select>
                <select name="success" id="success" class="btn" style="background-color : gray; color:white;">
                    <option value="0" data-color="gray" selected>unsuccess</option>
                    <option value="1" data-color="green">success</option>
                </select>
                @endif

                <!-- normal person -->
                @if(Auth::check() && Auth::user()->roleid == 0)
                <select name="check" class="btn" id="person" style="background-color : red; color:white;">
                    <option value="0">unapproved</option>
                </select>
                <select name="difficult" class="btn" id="person" style="background-color : red; color:white;">
                    <option value="0">unspecified</option>
                </select>
                <select name="success" class="btn" id="person" style="background-color : red; color:white;">
                    <option value="0">unsuccess</option>
                </select>
                @endif

                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="submit" />
                </div>

            </form>
            <script>
                admin = document.querySelector('#admin')
                admin.addEventListener('change', function(el) {
                    admin.style.backgroundColor = document.querySelector('option[value="' + admin.value + '"]').getAttribute('data-color')
                })
            </script>
            <script>
                hard = document.querySelector('#hard')
                hard.addEventListener('change', function(el) {
                    hard.style.backgroundColor = document.querySelector('option[value="' + hard.value + '"]').getAttribute('data-color')
                })
            </script>
            <script>
                success = document.querySelector('#success')
                success.addEventListener('change', function(el) {
                    success.style.backgroundColor = document.querySelector('option[value="' + success.value + '"]').getAttribute('data-color')
                })
            </script>

        </div>
    </div>
</div>

@endsection