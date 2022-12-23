	@extends('layouts.app')

@section('metaTitle', 'Fortrolighedspolitik')
<style>
	.privacy-policy p{
		text-align:left !important;
		margin-top:1em !important; 
	}
	
	.privacy-policy h2, privacy-policy h3{
		text-align:center;
	}
	.object-description{
		margin-top:2em;
		margin-bottom:2em;
	}
	.object-description .head{
		font-weight: 800;
		text-decoration-line: underline;
		margin-bottom: 0.6em;
	}
	.object-image-container span{
		margin:0 !important;
		display:inline-block !important;
	}
	.object-heading{
		font-weight: 600 !important;
		font-size: 24px !important;
	}
	.logo-container{
		margin: 0 auto;
		width: 25%;
	}
	.logo-container img{
		width:100%;
		margin: 0 auto;
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
					<div class="logo-container">
						<img src="{{asset('images/icons/LOGO.png')}}" />
					</div>
					<div>
						<br/>
						<p class="text-center"><strong>Privatlivspolitik<br/>for Swappi ApS.</strong></p>
					</div>
				</div>
				
				<div class="col-md-12 col-sm-12 col-xs-12 privacy-policy">
					
					<div class="single-object">
						<div class="object-image-container">
							<p class="object-heading"> 
								<img src="{{asset('images/icons/01.png')}}" width="45px"/>
								<span>Dataansvar<span>
							</p>
						</div>
						<div class="object-description">
							<p class="head">Vi tager din databeskyttelse alvorligt</p>
							<p>Vi behandler persondata og har derfor vedtaget denne privatlivsbeskyttelsespolitik, der fortæller dig, hvordan vibehandler dine data.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Kontaktoplysninger</p>
							<p>Firma Swappi ApS er dataansvarlig, og vi sikrer, at dine persondata behandles i overensstemmelse med lovgivningen.</p>
							<p>Kontaktoplysninger:</p>
							<p>Kontaktperson: Swappi ApS <br/>
							Adresse: Peter Fabers Gade 39, 4tv <br/>
							CVR: 36558709 <br/>
							Telefonnr.: 93931181 <br/>
							Mail: info@swappi <br/>
							Website: www.swappi.dk</p>
							
						</div>
						
						<div class="object-description">
							<p class="head">Vi sikrer fair og transparent databehandling</p>
							<p>Når vi beder dig om at stille dine persondata til rådighed for os, oplyser vi dig om, hvilke data vi behandler om dig og tilhvilket formål. Du modtager oplysning herom på tidspunktet for indsamling af dine persondata.</p>
						</div>
					</div>
					
					<div class="single-object">
						<div class="object-image-container">
							<p class="object-heading"> 
								<img src="{{asset('images/icons/02.png')}}" width="45px"/>
								<span>Behandling af persondata<span>
							</p>
							
						</div>
						<div class="object-description">
							<p class="head">Vi anvender denne type data om dig</p>
							<p>Vi anvender data om dig for at gøre vores service bedre og sikre kvalitet i vores produkter og tjenester samt i voreskontakt med dig.</p>
							<p>De data, vi anvender, omfatter:</p>
							<p>
								- Almindelige persondata <br/>
								- Data om interesser og vaner <br/>
								- Trafikdata om brug af internettet <br/>
							</p>
						</div>
						
						<div class="object-description">
							<p class="head">Vi indsamler og opbevarer dine persondata til bestemte formål</p>
							<p>Vi indsamler og opbevarer dine data i forbindelse med bestemte formål eller andre lovlige forretningsmæssige formål. Det sker, når vi har brug for at:</p>
							<p>
								- Behandling af dit køb og levering af vores ydelse <br/>
								- Opfyldelse af din anmodning om produkter eller tjenester <br/>
								- Forbedring af vores produkter og tjenester <br/>
								- Tilpasning af vores kommunikation og markedsføring til dig <br/>
								- Tilpasning af samarbejdspartneres kommunikation og markedsføring til dig <br/>
								- Administration af din relation til os <br/>
								- Opfyldelse af lovkrav <br/>
							</p>
							
						</div>
						
						<div class="object-description">
							<p class="head">Vi behandler kun relevante persondata</p>
							<p>Vi behandler kun data om dig, der er relevante og tilstrækkelige i forhold til de formål, der er defineret ovenfor. Formåleter afgørende for, hvilken type data om dig, der er relevante for os. Det samme gælder omfanget af de persondata, vibruger. Vi bruger fx ikke flere data, end dem, vi har brug for til det konkrete formål.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Vi behandler kun nødvendige persondata</p>
							<p>Vi indsamler, behandler og opbevarer kun de persondata, der er nødvendige i forhold til at opfylde vores fastsatte formål. Derudover kan det være bestemt ved lovgivning, hvilken type data, der er nødvendig at indsamle og opbevare for vores forretningsdrift. Typen og omfanget af de persondata, vi behandler, kan også være nødvendige for at opfylde en kontrakt eller en anden retlig forpligtelse.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Vi kontrollerer og opdaterer dine persondata</p>
							<p>Vi kontrollerer, at de persondata, vi behandler om dig, ikke er urigtige eller vildledende. Vi sørger også for at opdatere dine persondata løbende.</p>
							<p>Da vores service er afhængig af, at dine data er korrekte og opdaterede, beder vi dig oplyse os om relevante ændringer i dine data. Du kan benytte kontaktoplysningerne ovenfor til at meddele os dine ændringer.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Vi sletter dine persondata, når de ikke længere er nødvendige</p>
							<p>Vi sletter dine persondata, når de ikke længere er nødvendige i forhold til det formål, som var grunden til vores indsamling, behandling og opbevaring af dine data.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Vi indhenter dit samtykke, inden vi behandler dine persondata</p>
							<p>Vi indhenter dit samtykke, inden vi behandler dine persondata til de formål, der er beskrevet ovenfor, med mindre vi har et lovligt grundlag for at indhente dem. Vi oplyser dig om et sådant grundlag og om vores legitime interesse i et behandle dine persondata.</p>
							<p>Dit samtykke er frivilligt, og du kan til enhver tid trække det tilbage ved at henvende dig til os. Brug kontaktoplysningerne ovenfor, hvis du ønsker yderligere oplysninger.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Vi videregiver ikke dine persondata uden dit samtykke</p>
							<p>Vi videregiver ikke persondata til andre aktører.</p>
						</div>
					</div>
					
					<div class="single-object">
						<div class="object-image-container">
							<p class="object-heading"> 
								<img src="{{asset('images/icons/03.png')}}" width="45px"/>
								<span>Sikkerhed<span>
							</p>
						</div>
						<div class="object-description">
							<p class="head">Vi beskytter dine persondata og har interne regler om informationssikkerhed</p>
							<p>Vi har vedtaget interne regler om informationssikkerhed, som indeholder instrukser og foranstaltninger, der beskytter dine persondata mod at blive tilintetgjort, gå tabt eller blive ændret, mod uautoriseret offentliggørelse, og mod at uvedkommende får adgang eller kendskab til dem.</p>
						</div>
					
					</div>
					
					<div class="single-object">
						<div class="object-image-container">
							<p class="object-heading"> 
								<img src="{{asset('images/icons/04.png')}}" width="45px"/>
								<span>Brug af cookies<span>
							</p>
						
						</div>
						<div class="object-description">
							<p class="head">Cookies, formål og relevans</p>
							<p>Hvis vi placerer cookies, bliver du informeret om anvendelsen og formålet med at indsamle data via cookies.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Vi indhenter dit samtykke</p>
							<p>Før vi placerer cookies på dit udstyr, beder vi om dit samtykke. Nødvendige cookies til sikring af funktionalitet og indstillinger kan dog anvendes dog uden dit samtykke.</p>
							<p>Du kan få flere oplysninger på vores hjemmeside om vores brug af cookies, og om hvordan du kan slette eller afvise dem. Hvis du vil tilbagekalde dit samtykke, så se vejledningen under vores cookie-politik.</p>	
						</div>
					
					</div>
					
					<div class="single-object">
						<div class="object-image-container">
							<p class="object-heading"> 
								<img src="{{asset('images/icons/05.png')}}" width="45px"/>
								<span>Dine rettigheder<span>
							</p>
							
						</div>
						<div class="object-description">
							<p class="head">Du har ret til at få adgang til dine persondata</p>
							<p>Du har til en enhver tid ret til at få oplyst, hvilke data vi behandler om dig, hvor de stammer fra, og hvad vi anvender dem til. Du kan også få oplyst, hvor længe vi opbevarer dine persondata, og hvem, der modtager data om dig, i det omfang vi videregiver data i Danmark og i udlandet.</p>
							<p>Hvis du anmoder om det, kan vi oplyse dig om til de data, vi behandler om dig. Adgangen kan dog være begrænset af hensyn til andre personers privatlivsbeskyttelse, til forretningshemmeligheder og immaterielle rettigheder.</p>
							<p>Du kan gøre brug af dine rettigheder ved at henvende dig til os. Vores kontaktoplysninger finder du øverst.</p>
						</div>
						
						<div class="object-description">
							<p class="head">Du har ret til at få unøjagtige persondata rettet eller slettet.</p>
							<p>Hvis du mener, at de persondata, vi behandler om dig, er unøjagtige, har du ret til at få dem rettet. Du skal henvendedig til os og oplyse os om, hvori unøjagtighederne består, og hvordan de kan rettes.</p>
							<p>I nogle tilfælde vil vi have en forpligtelse til at slette dine persondata. Det gælder fx, hvis du trækker dit samtykke tilbage. Hvis du mener, at dine data ikke længere er nødvendige i forhold til det formål, som vi indhentede dem til, kan du bede om at få dem slettet. Du kan også kontakte os, hvis du mener, at dine persondata bliver behandlet i strid med lovgivningen eller andre retlige forpligtelser.</p>
							<p>Når du henvender dig med en anmodning om at få rettet eller slettet dine persondata, undersøger vi, om betingelserne er opfyldt, og gennemfører i så fald ændringer eller sletning så hurtigt som muligt.</p>
				
						</div>
						
						<div class="object-description">
							<p class="head">Du har ret til at gøre indsigelse mod vores behandling af dine persondata.</p>
							<p>Du har ret til at gøre indsigelse mod vores behandling af dine persondata. Du kan også gøre indsigelse mod vores videregivelse af dine data til markedsføringsformål. Du kan bruge kontaktoplysningerne øverst til at sende en indsigelse. Hvis din indsigelse er berettiget, sørger vi for at ophøre med behandli.ngen af dine persondata.<p>
							
				
						</div>
					
					</div>
					
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