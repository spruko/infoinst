@extends('Installation::installer.layouts.InstallerMaster')

@section('template_title')
    {{ 'Welcome' }}
@endsection

@section('title')
    {{ 'Laravel Installer' }}
@endsection

@section('container')
    <p class="fs-12 text-center">
      {{ 'Easy Installation and Setup Wizard From vendor' }}
    </p>
    <p class="text-center">
      <a href="{{ route('SprukoAppInstaller::requirements') }}" class="button">
        {{ 'Check Requirements' }}
        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
      </a>
    </p>
@endsection
