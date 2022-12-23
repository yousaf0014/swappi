@extends('layouts.app')

@section('metaTitle', 'Handelsbetingelser')
<style>
	.swapi_brancherene_img_section h1{width:100% !important;  }
</style>
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
	
	<!--<div class="swapi_investoror_nav">
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
	</div>-->
	
	@include('pages.menu-2')
    
    <div class="swapi_brancherene_img_section text-align-left" id="om-swappi">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 >Handelsbetingelser for Swappi</h1>
					<span><a href="#"><img src="{{ asset('images/icon_merge_image.png') }}" style="width:100%;"></a></span>
					<p>Generelle oplysninger</p><br>
					<p>
						<strong>Virksomhedsoplysninger</strong><br>
						Navn: Swappi ApS<br>
						Adresse: Peter Fabers Gade 39, 4. tv., 2200 København N<br>
						CVR-nr.: 36558709<br>
						Tlf.: 9393 1181<br>
						E-mailadresse: <br>
					</p><br>
					<p><hr style="width: 60%; margin: 0 auto;"></p><br>
					<p>Her kan du læse om betingelserne, der gælder ved køb af tjenesteydelser hos Swappi. Ved din accept af et køb hos Swappi, accepterer du, at disse handelsbetingelser er gældende i forholdet mellem dig og Swappi. </p><br>
					<p>Vi opfordrer dig til at læse handelsbetingelserne grundigt igennem, inden du køber en tjenesteydelse hos os. </p><br>
					<p><strong>Priser</strong></p>
					<p>Prisen for en tjenesteydelse, er den pris, der fremgår af Swappis hjemmeside <a href="https://www.swappi.dk">www.swappi.dk</a> på det tidspunkt, hvor du gennemfører købet. Alle priserne er angivet i danske kroner (DKK) og er inkl. moms.</p><br>
					<p><strong>Betaling</strong></p>
					<p>Swappi modtager betaling ved følgende betalingskort:</p><br>
					<ul class="nav" style="width: 60%; margin: 0 auto;">
						<li>-	Dankort</li>
						<li>-	Visa/Dankort</li>
						<li>-	MasterCard</li>
						<li>-	MasterCard Debit</li>
						<li>-	Visa</li>
						<li>-	Visa Electron</li>
						<li>-	American Express</li>
					</ul><br>
					<p>Dine kortoplysninger krypteres og bliver sendt direkte videre til banken via en sikker forbindelse. Swappi bruger en godkendt betalingsserver, der krypterer alle kortoplysninger med SSL-protokol (Secure SocketLayer), som kun PBS kan læse. Swappi gemmer ikke dine kreditoplysninger. <br>
					Betalingen bliver trukket fra din konto i forbindelse med, at købet gennemføres.</p>
					<p><strong>Levering</strong></p>
					<p>Levering sker inden for […] dage / [på stedet ved kunden].</p>
				</div>
			</div>
		</div>
	</div>
	
@endsection