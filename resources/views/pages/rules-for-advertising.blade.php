@extends('layouts.app')

@section('metaTitle', 'Regler for annoncering')
<style>
		div.rules-for-advertising{
			font-family: 'Lato-Light';
		}
	.rules-for-advertising h3, .rules-for-advertising h2{
		text-align: center;
	}
	.rules-for-advertising p{
		text-align: left !important;
		margin-top: 1em !important;
	}
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
    
    <div class="swapi_brancherene_img_section" id="om-swappi">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1>Swappi forbinder folk på tværs af brancherne</h1>
					<span><a href="#"><img src="{{ asset('images/icon_merge_image.png') }}" style="width:100%;"></a></span>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12 rules-for-advertising">
					<h3><strong>Regler for annoncering</strong></h3>
					<p><strong>Swappi Annonceringsregler</strong><br/>Vi forbeholder os retten til at afvise og slette annonce, hvis de strider i mod g&aelig;ldende lovgivning eller p&aring; m&aring;de har st&oslash;dende indhold. Der m&aring; p&aring; ingen m&aring;de reklameres for egen eller tredjemands produkt. Penge m&aring; ikke blive brugt som betalingsmiddel.<br/>Vi forbeholder os retten til at rette i annoncens indhold samt &aelig;ndre placeringen.</p>
					
					<p><strong>Etik og lovgivning</strong><br/>Alle annoncer skal overholde etik og lovgivning, overtr&aelig;delse kan medf&oslash;re at din annonce vil blive slette og evt. din bruger. I visse tilf&aelig;lde kan politiet blive involveret.<br/>Nedenfor kan du se nogle af de etiske og lovm&aelig;ssig forhold der skal overholdes.</p>
					
					<p><strong>Fotos, billeder, tekster som er copyright/ophavsretsbeskyttet:</strong><br/> m&aring; ikke blive benyttet i annoncer p&aring; Swappi. Du har selv ansvaret for, at det indhold som du benytter i en annonce overholder alle regler og love omkring copyright og ophavsret.<br/>Swappi fraskriver sig et hver ansvar for brud p&aring; disse regler.</p>
					<p><strong>Dyr: </strong><br/>Af etiske oversager kan du ikke bytte dyr af nogen art p&aring; vores portal.<br/>Sexsuelle ydelser af dig selv eller tredjepart.Pornografiske billeder, videoer.
					</p>
					<p><strong>Hvad m&aring; byttes</strong><br/>S&aring; l&aelig;nge lovgivningen og de etiske regler bliver overholdt kan alt stor set blive brugt i&nbsp; en byttehandel. Hvis ikke du har nogle specifik kompetence som du mener er v&aelig;rd at tilbyde, kan du sl&aring; gr&aelig;s, rydde sne og hvad du ellers kan finde p&aring;.</p>
				</div>
			</div>
		</div>
	</div>
	
	<!--<div class="kom_seniour_digital_section" id="ledige-stillinger">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1>Kom og arbejd med os!</h1>
					<div class="col-md-4 col-sm-4 col-xs-12 senior_user_experience">
						<span>Studiejob</span>
						<h1>Senior User Experience <br>(UX) Designer</h1>
						<p>Se stillingen</p>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 Digital_designer_Kom">
						<span>Fuldtidsstilling</span>
						
						<h1>Digital designer</h1>
						<p>Se stillingen</p>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 Software_ingeniør">
						<span>Fuldtidsstilling</span>
						
						<h1>Software-ingeniør</h1>
						<p>Se stillingen</p>
					</div>
					<div class="Send_digital"><span>Send en uopfordret ansøgning</span></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="contact_banner_about" id="investorer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-md-6 col-sm-6 col-xs-12"></div>
					<div class="col-md-6 col-sm-6 col-xs-12 pull-right contact_right_section">
						<p>Vil du være en del afvores investorgruppe?</p>
						<h1>Kontakt os på <br>+45 86 43 44 12 </h1>
						<h5>Frederik Wind Andersen<br>CEO Swappi ApS</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="Presseomtale_section" id="presse">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1>Presseomtale</h1>
					<div class="col-md-4 col-sm-4 col-xs-12 tv_dr_Presseomtale">
						<p><img src="{{ asset('images/tv_icon.png') }}"></p>
						<h2>Banebrydende koncept <br>
						udviklet af Swappi</h2>
						<span>Kilde : TV2</span>
						<h4>Læs opslaget</h4>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 tv_dr_Presseomtale">
						<p><img src="{{ asset('images/dr_icon.png') }}"></p>
						<h2>Banebrydende koncept <br>
						udviklet af Swappi</h2>
						<span>Kilde : DR1</span>
						<h4>Læs opslaget</h4>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 tv_dr_Presseomtale">
						<p><img src="{{ asset('images/extra_bladed.png') }}"></p>
						<h2>Banebrydende koncept <br>
						udviklet af Swappi</h2>
						<span>Kilde : DR1</span>
						<h4>Læs opslaget</h4>
					</div>
					<div class="se_mere_omtale"><h5>Se mere omtale</h5></div>
				</div>
			</div>
		</div>
	</div>-->
     
     
@endsection