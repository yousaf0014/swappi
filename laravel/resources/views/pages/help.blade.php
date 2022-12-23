@extends('layouts.app')

@section('metaTitle', $content['page_name'])
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
	.terms-of-use .link-to{
		width: 60%;
		margin: 0 auto;
		padding: 10px;
	
	}
	.terms-of-use ul.ul_style{
		width: 60%;
		margin: 0 auto;
		padding: 10px;
		font-family: 'Lato-Light';
		font-size: 18px;
		padding-left: 3em;
	}
	
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
	
	.privacy-policy p{
		text-align:left !important;
		margin-top:1em !important; 
	}
		
	.privacy-policy h2, privacy-policy h3{
		text-align:center;
	}
	.privacy-policy .object-description{
		margin-top:2em;
		margin-bottom:2em;
	}
	.privacy-policy .object-description .head{
		font-weight: 800;
		text-decoration-line: underline;
		margin-bottom: 0.6em;
	}
	.privacy-policy .object-image-container span{
		margin:0 !important;
		display:inline-block !important;
	}
	.privacy-policy .object-heading{
		font-weight: 600 !important;
		font-size: 24px !important;
	}
	.privacy-policy .logo-container{
		margin: 0 auto;
		width: 25%;
	}
	.privacy-policy .logo-container img{
		width:100%;
		margin: 0 auto;
	}
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
	@if(Request::segment(2) == 'handelsbetingelser' || Request::segment(2) == 'brugervilk%C3%A5r' ||	Request::segment(2) == 'regler-for-annoncering'  || Request::segment(2) == 'fortrolighedspolitik' || Request::segment(2) == 'cookie-politik' )
		@include('pages.menu-2')
	@else
		@include('pages.menu-1')
	@endif
    
    <div class="swapi_brancherene_img_section text-align-left" id="om-swappi">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1>{{$content['page_name']}}</h1>
					<span><a href="#"><img src="{{ asset('images/icon_merge_image.png') }}" style="width:100%;"></a></span>
					{!!$content['page_content']!!}
					
					<!--<p>Det er de færreste iværksættere, der har pungen fuld af penge, når de får en god ide og ønsker at realisere den for hele verden. Faktisk kan det ofte være svært at rejse penge til selv den mest geniale ide. "Vi vil jo lige gerne se, om der er penge og realiteter bag idéen, før vi ønsker at låne penge ud," som en mulig respons fra omverden kan lyde. </p><br>
					<p>Det frustrerede Frederik Wind Andersen, manden bag Swappi, som har set det som sin mission at hjælpe kreative iværksættere i gang med deres projekter. Han brænder nemlig for den gode idé og for at gøre det endnu mere attraktivt at være iværksætter.  </p><br>
					<p>Spørgsmålet var, hvordan man kan hjælpe en iværksætter med at realisere sine tanker på en måde, så de ikke behøver at hive pungen op ad lommen? Svaret var: Swappi. Et sted på nettet, hvor man kan bytte kompetencer, uden det koster parterne andet end udveksling af tid og arbejdskraft. Med Swappis opdeling af de 10 kategorier i de forskellige kompetencer, er det uhyre enkelt at udveksle kompetencer og få hjælp til sit projekt 'gratis'. </p><br>
					<p>At man så samtidig kan få udbygget og styrket sit professionelle netværk med meget relevante samarbejdspartnere, er endnu et plus ved Swappi. Og styrker kun Frederik Wind Andersens tanker om at hjælpe og bane vejen for iværksætteren, som kan være med til at skabe en bedre fremtid for økonomien herhjemme.  </p>-->
				</div>
			</div>
		</div>
	</div>
	
	     
@endsection