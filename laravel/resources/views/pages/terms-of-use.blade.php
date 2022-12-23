@extends('layouts.app')

@section('metaTitle', 'Brugervilkår')

@section('content')
	<style>
		div.terms-of-use{
			font-family: 'Lato-Light';
		}
		.terms-of-use h3, .terms-of-use h2{
			text-align: center;
			font-size: 18px;
			
			font-weight: 600;
		}
		.terms-of-use p{
			text-align: left;
			margin-top: 1em;
		}
		.link-to{
			width: 60%;
			margin: 0 auto;
			padding: 10px;
		
		}
		ul.ul_style{
			width: 60%;
			margin: 0 auto;
			padding: 10px;
			font-family: 'Lato-Light';
			font-size: 18px;
			padding-left: 3em;
		}
		
	</style>
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
				
				<div class="col-md-12 terms-of-use" >
					<h3>Swappi brugervilk&aring;r</h3>
					<h3>Indholdsfortegnelse</h3>
					
					<h3 id="INTRODUKTION">Introduktion</h3>
					<p>Swappi er en portal, hvor du kan bytte dine kompetencer gratis. N&aring;r du bes&oslash;ger Swappi, accepterer du f&oslash;lgende vilk&aring;r. Disse ydelser stilles til r&aring;dighed for dig af Swappi, CVR-nr. 36558709, Peter Fabers Gade 39 4. tv., 2200 K&oslash;benhavn N, Danmark. Denne politik tr&aelig;der i kraft den 1. januar 2017.</p>
					
					<h2 id="ANVENDELSE-AF-SWAPPI">Anvendelse af Swappi</h2>
					<p>For at benytte Swappi skal du lave en brugerprofil. Vi anbefaler, at du g&oslash;r dig umage med din beskrivelse af dig selv og dine kompetencer. Jo mere specifik og uddybende du kan skrive om, hvem du er, og hvad du kan tilbyde, jo lettere f&aring;r du ved at bytte dine kompetencer. N&aring;r du har lavet en bruger, kan du tage platformen i brug og lave en annonce. Det er her igen en rigtig god id&eacute;, at v&aelig;re s&aring; specifik omkring den opgave/kompetence, du &oslash;nsker byttet, samt hvad du kan tilbyde til geng&aelig;ld. Alle annoncer skal overholde reglerne om annoncering, som kan findes her (Regler om annoncering).</p>
					
					<p>Ved anvendelse af Swappi indvilger du i ikke at g&oslash;re f&oslash;lgende:</p>
					
					<ul	class="ul_style">
						<li>overtr&aelig;de relevant lovgivning, herunder forbrugeraftaleloven, aftaleloven, k&oslash;beloven, markedsf&oslash;ringsloven samt andre relevante love</li>
						<li>kr&aelig;nke disse brugervilk&aring;r eller vores Regler om annoncering</li>
						<li>agere usandt eller vildledende</li>
						<li>distribuere eller inkludere, spam, virus eller andre teknologier, der kr&aelig;nker Swappi eller brugerne heraf</li>
						<li>&aelig;ndre, kopiere og/eller distribuere andre personers materiale</li>
						<li>kr&aelig;nke tredjemands rettigheder, herunder immaterielle rettigheder</li>
						<li>sammenstille eller indsamle oplysninger om andre uden deres samtykke</li>
						<li>omg&aring; foranstaltninger, der er anvendt for at hindre eller begr&aelig;nse adgang til Swappis ydelser</li>
					</ul>
					
					<p>Du har mulighed for at bed&oslash;mme det stykke arbejde, du har byttet dig til. Dette er ikke et krav, og du kan ikke g&oslash;re krav p&aring; at f&aring; bed&oslash;mt dit arbejde, selvom du har gjort det for den anden. Vi tager st&aelig;rkt afstand fra betalende bed&oslash;mmelser, og det kan medf&oslash;re, at begge involveredes kontoer bliver lukket.</p>
					<p><strong>Misbrug af Swappi</strong></p>
					
					<p>Vi har implementeret en &rdquo;Anmeld annonce&rdquo; knap p&aring; alle annoncer. Vi &oslash;nsker, at vores brugere skal benytte denne, hvis de oplever, at en side viser st&oslash;dende indhold eller ikke overholder reglerne. Vi forbeholder os retten til at slette annoncer, fjerne indhold og tr&aelig;ffe juridiske og tekniske foranstaltninger for at slette brugere uden forklaring. Vi forbeholder os yderligere retten til eventuelt at udlevere personlige oplysninger til politiet, hvis ikke lovgivningen bliver overholdt. Vi p&aring;tager os ikke ansvaret for overv&aring;gning af vores brugere. Derfor er det vigtigt, at I hj&aelig;lper os med at overholde alle normer og regler. Vi &oslash;nsker ikke, at du laver mere end &eacute;n bruger. Dette vil resultere i lukning af den ene konto (evt. begge). Der m&aring; p&aring; ingen m&aring;de indsamles kontaktoplysninger p&aring; andre brugere til brug for egen markedsf&oslash;ring. Man m&aring; ikke betale sig for at f&aring; en god bed&oslash;mmelse for sit arbejde.</p>
					
					<h2 id="PRISER-OG-BETALINGER">Priser og betalinger</h2>
					
					<p>Vi har visse ydelser, som vi kr&aelig;ver betaling for. Prisen for disse ydelser fremg&aring;r af Swappis hjemmeside <a href="http://www.swappi.dk">www.swappi.dk</a>. Vi forbeholder os retten til at &aelig;ndre priserne herp&aring; uden varsel. Disse ydelser skal betales med det samme og kan ikke k&oslash;bes p&aring; afbetaling. Ydelserne er opgivet i danske kroner (DKK) og er inkl. moms. Du vil modtage en kvittering, uanset om du har betalt for din annonce eller ej. Vi sender ingen faktura ud, som skal betales, da dette allerede er sket i forbindelse med oprettelse af annoncen. Betalinger af till&aelig;gsydelser p&aring; annoncer kan ikke refunderes.</p>
					
					<h2 id="SIKKERHED">Sikkerhed</h2>
					<p>Kontakt os p&aring; <a href="mailto:info@swappi.dk">info@swappi.dk</a>, hvis du oplever eller har mistanke om, at din konto har v&aelig;ret misbrugt. Vi behandler dine personlige oplysninger med st&oslash;rste forsigtighed, ingen af dine oplysninger vil blive videregivet, medmindre du selv har anmodet om det eller givet dit eksplicitte samtykke hertil. Der henvises i den forbindelse til Swappis g&aelig;ldende handelsbetingelser, som kan findes p&aring; hjemmesiden <a href="http://www.swappi.dk">www.swappi.dk</a>.</p>
					<p>Hvis du oplever trusler eller andet ubehag fra en anden bruger i forbindelse med en byttehandel, skal dette anmelde til os p&aring; <a href="mailto:info@swappi.dk">info@swappi.dk</a>. Derefter vil sagen blive behandlet.</p>
					
					<h2 id="LUKNING-AF-DIN-KONTO">Lukning af Din Konto</h2>
					<p>Vi forbeholder os retten til at lukke eller sp&aelig;rre din konto uden varsel eller forklaring. Du kan skrive til <a href="mailto:info@swappi.dk">info@swappi.dk</a>, hvis du &oslash;nsker den gen&aring;bnet. Du kan l&aelig;se mere om hvad der kan resultere lukning af din konto under &rdquo;Misbrug af Swappi&rdquo;.</p>
					
					<h2 id="ANSVAR-FOR-OPRETTELSE-AF-INDHOLD">Ansvar for oprettelse af Indhold</h2>
					<p>Du er selv ansvarlig for, at de annoncer, du opretter, er i overensstemmelse med Swappis regler for annoncering og ikke overtr&aelig;der nogen love (herunder den danske markedsf&oslash;ringslov) og ikke kr&aelig;nker tredjemands rettigheder. Du skal til enhver tid kunne redeg&oslash;re for, at dine referencer er dine og ikke kopieret fra tredjemand. Brud p&aring; disse regler vil medf&oslash;re lukning af din konto og eventuel politianmeldelse. Vi gennemg&aring;r ikke alle annoncer, du opretter, du er dermed ansvarlig for at alle regler og love bliver overholdt. Du er indvilliget i at skadesl&oslash;sholde Swappi for ethvert tab, som Swappi m&aring;tte lide som f&oslash;lge af kr&aelig;nkelse af Swappi tjenester, brud p&aring; loven og eventuel kr&aelig;nkelse af tredjemands rettigheder.</p>
					
					<h2 id="SWAPPI-OG-BRUGERNES-ANSVAR">Swappi og brugernes ansvar</h2>
					<p>Swappi stiller sin platform til r&aring;dighed og er ikke involveret i selve byttehandlen mellem platformens brugere. Swappi er derfor ikke ansvarlig for de ydelser, der udveksles eller kvaliteten af det arbejde, der udf&oslash;res som en del af handlen p&aring; Swappis platform. Swappi fraskriver sig udtrykkeligt alle garantier, indest&aring;elser, betingelser (udtrykkelige eller implicitte), herunder om kvalitet, salgbarhed, handelsm&aelig;ssig kvalitet, mv., der m&aring;tte f&oslash;lge af lovgivningen.</p>
					<p>Du er selv ansvarlig for, at relevant lovgivning bliver overholdt, herunder skattelovgivningen (Du kan l&aelig;se mere om skat og moms ved byttehandler her). Det er vigtigt, at du s&aelig;tter dig ind i disse regler, f&oslash;r du benytter vores hjemmeside.</p>
					<p>Swappi er hverken ansvarlig for, at brugen af platformen medf&oslash;rer tab af penge, goodwill, omd&oslash;mme, f&oslash;lgeskader eller for at begge parter udf&oslash;rer deres arbejde i henhold til indg&aring;et aftale. Swappi kan derfor heller ikke refundere eller give anden godtg&oslash;relse for tabt eller d&aring;rligt udf&oslash;rt arbejde. Der er ingen penge involveret i byttehandlerne, og der kan ikke g&oslash;res krav p&aring; det, selvom om modparten ikke er i stand til at udf&oslash;re arbejdet. Hvis to brugere beslutter sig for at udveksle penge i en byttehandel, er det p&aring; eget ansvar.</p>
					
					<h2 id="PERSONLIGE-OPLYSNINGER">Personlige oplysninger</h2>
					<p>Ved brug af Swappis platform og ydelser, indvilger du i at f&oslash;lge Swappis persondatapolitik. Du kan finde vores fortrolighedspolitik her (fortrolighedspolitik) og vores persondatapolitik her (handelsbetingelser).</p>
					<p>Du er alene ansvarlig for, at din adgangskode er sikret. Hvis du oplever, at din konto eller din adgangskode er blevet misbrugt eller har mistanke om, at den er blevet det, b&oslash;r du straks &aelig;ndre adgangskode og evt. kontakte kundesupport her (Kundesupport).</p>
					
					<h2 id="ÆNDRINGER ELLER RETTELSER">&AElig;ndringer eller Rettelser</h2>
					<p>Swappi opdaterer l&oslash;bende &aelig;ndringer og rettelser i brugervilk&aring;rene, og du er selv ansvarlig for at holde dig opdateret. Hvis du har sp&oslash;rgsm&aring;l eller kommentarer til brugervilk&aring;rene, kan du kontakte vores Kundesupport.</p>
				
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
	</div>-->
	
	<!--<div class="Presseomtale_section" id="presse">
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