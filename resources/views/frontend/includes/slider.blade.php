<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
	<div class="ws_images">
		<ul>
			@foreach ($sliders as $slider)
				<li>
					<a href="#">
						<img src="{{ asset('storage/images/sliders').'/'.$slider->image }}" alt="{{ $slider->title }}" title="{{ $slider->title }}" id="{{ $slider->id }}"/>
					</a>
					{{ $slider->desc }}
				</li>
			@endforeach			
		</ul>
	</div>
	<div class="ws_bullets">
		<div>			
			@foreach ($sliders as $slider)
				<a href="#" title="{{ $slider->title }}">					
					{{ $slider->id }}
				</a>
				</li>
			@endforeach					
		</div>
	</div>
</div>