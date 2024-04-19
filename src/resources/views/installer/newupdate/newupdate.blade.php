@extends('layouts.updatemaster')

@section('title')
    {{ trans('Update version') }} {{$version}}
@endsection


@section('container')
        <form method="get" action="{{route('admin.thirdupdate',$version)}}" class="tabs-wrap">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">

                <div class="buttons">
                    <button class="button" type="submit" id="buttonfinal" onclick="button(this)">
                        {{ trans('Update') }}
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>

@endsection

@section('scripts')

<script type="text/javascript">
    "use strict";

    function button(bt) {
        document.getElementById("nextbutton").innerHTML = `Please Wait... <i class="fa fa-spinner fa-spin"></i>`;
        bt.disabled = true;
        bt.form.submit();
        document.getElementById("nextbutton").style.cursor = "not-allowed";
        document.getElementById("nextbutton").style.opacity = "0.5";
    }
</script>
@endsection
