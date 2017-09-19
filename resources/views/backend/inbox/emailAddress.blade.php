<div id="addEmail" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Email Address</h3>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" method="post" action="{{ route('inbox.emailAddress') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ old('id', $getGeneralConfig['id']) }}">
      <div class="control-group {{ $errors->has('email_to') ? 'error' : ''}}">
        <label class="control-label">Email To</label>
        <div class="controls">
          <input type="text" name="email_to" class="span9" id="email_to" value="{{ old('email_to', $getGeneralConfig['email_to']) }}">
          @if($errors->has('email_to'))
          <span class="help-block">
            <strong>{{ $errors->first('email_to')}}</strong>
          </span>
        @endif
        </div>
      </div>
      <div class="control-group {{ $errors->has('email_cc') ? 'error' : ''}}">
        <label class="control-label">Email CC</label>
        <div class="controls">
          <input type="text" name="email_cc" class="span9" id="email_cc" value="{{ old('email_to', $getGeneralConfig['email_cc']) }}">
          @if($errors->has('email_cc'))
          <span class="help-block">
            <strong>{{ $errors->first('email_cc')}}</strong>
          </span>
        @endif
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <input type="submit" value="Submit" class="btn btn-success">
    <a data-dismiss="modal" class="btn" href="#">Cancel</a>
  </div>
  </form>
</div>
