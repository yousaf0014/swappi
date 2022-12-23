@extends('layouts.app')

@section('metaTitle', 'Tilfredsbarometer')

@section('content')
	
	<div class="about_banner_section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1>Danmarks største byttemarked</h1>
					<p>Vi forbinder over 23.435 profiler på tværs af brancher, regioner og kultur</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="swapi_investoror_nav">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 unordered_list_adjust">
					<div class="swapi_unordered">
						<ul>
							<li><a href="#om-swappi">Om Swappi</a></li>
							<li><a href="#ledige-stillinger">Ledige stillinger</a></li>
							<li><a href="#investorer">Investorer</a></li>
							<li><a href="#presse">Presse</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="swapi_brancherene_img_section text-align-left" id="om-swappi">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1>Tillidsbarometer</h1>
					<span><a href="#"><img src="{{ asset('images/icon_merge_image.png') }}" style="width:100%;"></a></span>
					<p>Det er vigtigt at der gives en seriøs bedømmelse og du at bedømmer de tre kriterier separat. Useriøse bedømmelse kan og vil blive fjerne af Swappi.</p><br>
					<p><strong>Kvalitet af det udførte arbejde</strong></p>
					<p>Her skal du vurdere om det arbejde personen er udførte levede op til de forventninger du havde. Swappi anbefaler at i forventningsafstemmer inden start og bliver enige om hvilket arbejde der skal udføreres. Hvis der opstår uoverensstemmelser eller snyd, kan du kontakte Swappi <a href="mailto:swappi@swappi.dk">swappi@swappi.dk</a></p><br>
					<p><strong>Kommunikation</strong></p>
					<p>Hvordan har kommunikationen været? Har vedkommende vendt hurtigt tilbage på henvendelser? Samt har opgaven været oplyst fra starten?</p><br>
					<p><strong>Vil du arbejde med personen igen?</strong></p>
					<p>Her skal du vurdere det samlede arbejde, fra da du så annoncen til da arbejdet blev udført. Levede det hele op til dine forventninger og vil du arbejde med personen igen.</p><br>
					<p><strong>Over all rate</strong></p>
					<p>Swappi vil du fra dine 3 bedømmelser regne en samlet score frem, som vil blive din rate.</p><br>
					<p><strong>Fritekst</strong></p>
					<p>Her kan du uddybe din bedømmelse, så andre kan få en bedre forståelse for hvordan forløbet har været.</p>
				</div>
			</div>
		</div>
	</div>
	
@endsection