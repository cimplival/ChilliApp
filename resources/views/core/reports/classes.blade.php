@extends('core.layout.index')

@section('partials')

@if (Session::has('info'))
@include('core.partials.info')
@endif

@if (Session::has('success'))
@include('core.partials.success')
@endif

@if (Session::has('error'))
@include('core.partials.error')
@endif

@if (Session::has('errors'))
@include('core.partials.errors')
@endif

@endsection

@section('body')
    <form  method="POST" action="{{ url('classes-report') }}">
	{{ csrf_field() }}
	<div class="padded-full">
		<select name="month">
			<option disabled selected>Select a Class</option>
			@foreach($classes->reverse() as $class)
		    	<option value='{{$class->id}}'>{{$class->name}} {{$class->year}}</option>
		    @endforeach
		</select>
	</div>
	<div class="padded-full">
		<select name="year">
			<option disabled selected>Select a Year</option>
		    <option value='2017'>2017</option>
		    <option value='2018'>2018</option>
		    <option value='2018'>2019</option>
		    <option value='2018'>2020</option>
		</select>
	</div>
	<div class="padded-full">
		<ul class="list">
			<li class="padded-for-list">
				<label class="radio">
					<input type="radio" name="period" value="under5" @if(old('period') == "under5") checked @endif>
					MOH 705A
					<span></span>
				</label>
			</li>
			<li class="padded-for-list">
				<label class="radio">
					<input type="radio" name="period" value="over5" @if(old('period') == "over5") checked @endif>
					MOH 705B
					<span></span>
				</label>
			</li>
		</ul>
	</div>
	<div class="padded-full">
		<button type="submit" class="btn fit-parent primary">Download Report</button>
	</div>
	<div class="padded-full">
		<a href="{{ url('reports') }}">
			<button class="btn fit-parent">Go Back</button>
		</a>
	</div>
</form>
@endsection

@section('partials-script')
	@if (Session::has('success'))
		@include('core.partials.notify-script')
	@endif
@endsection