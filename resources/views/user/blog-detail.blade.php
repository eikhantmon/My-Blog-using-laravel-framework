@extends('layouts.main')

@section('content')


	<article>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<h1>{{ $blog->title }}</h1>

					{{ $blog->description }}
				</div>
			</div>
		</div>
	</article>

@endsection