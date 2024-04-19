@extends('Installation::installer.layouts.InstallerMaster')

@section('template_title')
{{ 'Welcome' }}
@endsection

@section('title')
{{ 'Laravel Installer' }}
@endsection

@section('container')
<p class="fs-12 text-center">
  {{ 'Please enter your token' }}
</p>
<form method="post" action="{{ route('SprukoAppInstaller::verifytoken') }}" class="tabs-wrap">
  @csrf
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
    <input style="display: none" name="envato_purchasecode" value="{{$envato_purchasecode}}">
    <div class="form-group col-6 {{ $errors->has('app_token') ? ' has-error ' : '' }}">
      <label for="app_token">
        {{ trans('Enter Your Token') }}
        <span class="text-red">*</span>
      </label>
      <input type="text" name="app_token" id="app_token" value="" placeholder="{{ trans('Enter Your token') }}" />
      @if ($errors->has('app_token'))
      <span class="error-block">
        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
        {{ $errors->first('app_token') }}
      </span>
      @endif
      @if($message = Session::get('error'))
      <span class="error-block text-red">
        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
        {{ $message }}
      </span>
      @endif
    </div>
  </div>

  <div class="buttons">
    <button class="button" type="submit" id="buttonfinal" onclick="button(this)">
      {{ trans('Verify') }}
      <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
    </button>
  </div>
</form>
@endsection