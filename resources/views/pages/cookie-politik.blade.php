	@extends('layouts.app')

@section('metaTitle', 'Cookie Politik')
<style>
	.cookie-politik p {
		margin-top: 1em !important;
		text-align: left !important;
	}
	.cookie-politik h2, .cookie-politik h3 {
		text-align:center;
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
					<!--<p>Cookie politik</p>-->
				</div>
				
				<div class="cookie-politik">
					<h3><strong>Cookie politik</strong></h3>
					<p>Hos Swappi bruger vi cookies da de ud over, at smage godt ogs&aring; hj&aelig;lper os til at g&oslash;re siden mere brugervenlig. Fx skal du ikke logge ind p&aring; siden hver gang du opdatere eller skifter til en anden side.</p>
					
					<p><strong>Hvad i alverden er det for noget. </strong><br/>De specifikke navne og typer af cookies, pixelcookies og andre lignende teknologier, som vi bruger, kan &aelig;ndre sig fra tid til anden. For mere information om cookies og lignende teknologier i almindelighed se <a href="http://www.allaboutcookies.org/">http://www.allaboutcookies.org</a>.<br /> For at hj&aelig;lpe dig til bedre at forst&aring; vores cookiepolitik og vores anvendelse af s&aring;danne teknologier, har vi lavet denne korte oversigt over termonologier og definitioner:<br />  </p>
					
					<p><strong>Cookies - </strong><br/>sm&aring; tekstfiler (typisk lavet af bogstaver og tal), som placeres i hukommelsen p&aring; din browser eller enhed, n&aring;r du bes&oslash;ger en hjemmeside eller ser en besked. Cookies giver en hjemmeside mulighed for at genkende en bestemt enhed eller browser. Der findes flere typer af cookies:<br /> &bull; Midlertidige cookies udl&oslash;ber, n&aring;r du stopper med at bruge browseren og giver os mulighed for at huske dine handlinger i l&oslash;bet af den periode, hvor du anvender din browser.&nbsp;<br /> &bull; Permanente cookies gemmes p&aring; din enhed og tillader os at huske dine pr&aelig;ferencer eller handlinger p&aring; tv&aelig;rs af flere hjemmesider.<br /> &bull; F&oslash;rsteparts cookies s&aelig;ttes af den hjemmeside, som du bes&oslash;ger.<br /> &bull; "Tredjeparts cookies" s&aelig;ttes af en tredjeparts hjemmeside, som er adskilt fra den hjemmeside, som du bes&oslash;ger.<br /> 
					
					Cookies kan deaktiveres eller fjernes ved hj&aelig;lp af v&aelig;rkt&oslash;jer, der er tilg&aelig;ngelige p&aring; de fleste browsere. De forskellige browsere tilbyder forskellige muligheder for at deaktivere muligheden for lagring af cookies.</p>
					
					<p>Hvis du mener, at behandlingen af dine personoplysninger er i strid med g&aelig;ldende lovgivning, kan du klage over behandlingen ved at kontakte Datatilsynet (<a href="http://www.datatilsynet.dk/">www.datatilsynet.dk</a>).</p>
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
	</div> -->
     
     
@endsection