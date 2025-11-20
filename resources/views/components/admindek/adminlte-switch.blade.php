{{-- <div class="switch">
    <label class="form-check-label" for="{{$name}}">{{$label}}</label>
    <input class="form-check-input" type="checkbox" name="" >
	<span style="background-color: rgb(64, 153, 255); display:block; width:60px; height:60px; border-color: rgb(64, 153, 255); box-shadow: rgb(64, 153, 255) 0px 0px 0px 16px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2s;">
		<small style="left: 20px; transition: background-color 0.4s, left 0.2s; background-color: rgb(255, 255, 255);"></small>
	</span>
</div> --}}

<div class="row-1 m-b-2">
	<span class="sub-title">{{$label}}</span>
	<input type="checkbox" class="js-single" name="{{$name}}" id="{{$name}}" value="{{$value}}" {{ $checked ? 'checked' : '' }} data-switchery="true" style="display: none;">
</div>