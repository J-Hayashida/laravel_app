@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!--div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div-->

                        <div class="form-group row">
                            <label for="group" class="col-sm-4 col-form-label text-md-right">{{ __('Group') }}</label>

                            <div class="col-md-6">
                                <select id="group" type="group" class="form-control{{ $errors->has('group') ? ' is-invalid' : '' }}" name="group" value="{{ old('group') }}" required autofocus>
                                    <option value="" disabled @if(old('group')=='') selected @endif>{{ __('Please select') }}</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}" @if(old('group')==$group->id) selected @endif>{{ $group->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('group'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <select id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->name }}" @if(old('name')==$user->name) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // "$(function(){});"ではなく”window.onload"を使うこと
    // 理由：js/app.jsをdefer指定で読み込んでいる為、ロード後のスクリプト実行時に"$"が使えない
    window.onload = function(){
        // グループセレクトボックス変更時
        $("#group").change(function () {
            getGroupUsers($(this).val());
        });
    }

    // グループ所属ユーザ取得処理
    function getGroupUsers(group, name){
        var params = {
            'group': group,
        };
        axios.post('{{ route('login.get_group_users') }}', params)
            .then((response) => {
                $('#name option').remove();
                $('#name').append($("<option>").text("{{ __('Please select') }}").attr('value','').prop('disabled', true).prop('selected', true));
                $.each(response.data, function(key,value) {
                    $('#name').append($("<option>").text(value.name).attr('value',value.name));
                });
                if (name != undefined){
                    $('#name').val(name);
                }
            }).catch(() => {
                console.log('Failed');
            }).then(() => {
                console.log('Complete!');
            });
    }
</script>
@endsection
