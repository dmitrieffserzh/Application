<form id="login-form" class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="row">
        <div class="col {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail</label>
            <input id="email" type="email" class="form-control col-md-12" name="email" value="{{ old('email') }}"
                   required
                   autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Пароль</label>
            <input id="password" type="password" class="form-control col-md-12" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <button type="submit" class="btn-submit btn btn-primary btn-block">
                Войти
            </button>

            <div class="text-muted small">или</div>
            <a class="btn btn-success btn-block" href="{{ route('register') }}">
                Зарегистрироваться
            </a>

            <a class="btn btn-link btn-sm btn-block" href="{{ route('password.request') }}">
                <span class="text-muted small"> Забыли пароль?</span>
            </a>
        </div>
    </div>
</form>
<script>
    // AJAX LOGIN
    $('#login-form').on('submit', function (event) {
        event.preventDefault();

        var modal_window  = $('.modal');
        var button        = '.btn-submit';

        modal_window.find(button).attr("disabled", true).html('Отправка запроса...');
        $.ajax({
            url: $(this).attr('action'),
            data: $('#login-form').serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                if (data.auth === true) {
                    modal_window.find(button).html('Успешно!');
                    setTimeout(function () {
                        modal_window.modal('hide');
                    }, 2000);
                    setTimeout(function () {
                        window.location.reload();
                    }, 2100);
                } else {
                    modal_window.find(button).html('Дульки пердульки');
                }
                setTimeout(function () {
                    modal_window.modal('show');
                }, 3000);
            }
        });
    });
</script>