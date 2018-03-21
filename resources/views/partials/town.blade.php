<div class="town">
	<div class="town__sky flex flex__column">
			<div class="pulse flex flex__column"></div>
			<div>{{\App\Models\Match::mToday()->count()}} Matches heute | {{\App\Models\Match::all()->count()}} Matches total </div>

			<img class="town__sky__marker"src="/svg/markerSmall.min.svg">
	</div>
	<div class="town__shiluette">
	</div>
</div>