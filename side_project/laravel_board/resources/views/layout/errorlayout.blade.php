@forelse ($errors->all() as $val)
    <div id="errorMsg" class="form-text text-danger">
        {{ $val }}
    </div><!--아이디 박스 밑에서 올라옴-->
@empty
@endforelse
