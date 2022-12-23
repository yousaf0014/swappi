<body>
	<table cellpadding="10" cellspacing="0">
		<tr>
			<td>{{date('m/d/Y')}}</td>
			<td>
				<div style="float:right"><img src="{{ asset('images/logo.png') }}"></div>
				<div style="clear:both"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="margin-top:50px;">
					{{$order_id}}
				</div>
			</td>
			<td>
				&nbsp;				
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<div style="margin-top:50px;">
					<hr>
				</div>
			</td>
		</tr>
		
		<tr>
			<td>
				Pakke (<span style="text-transform:capitalize">{{$package}}</span>)				
			</td>
			<td>
				DKK {{number_format($pkg_price/100,2)}}		
			</td>
		</tr>

		<tr>
			<td>
				<div>
					Antal ekstra Billeder
				</div>
			</td>
			<td>
				DKK {{number_format($image_price/100,2)}}		
			</td>
		</tr>

		<tr style="border-top:1px solid #111111; border-bottom:1px solid #111111">
			<td>
				Total:
			</td>
			<td>
				{{number_format($amount/100,2)}}
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<a href="{{ url('ad/' . $ad_id . '/detail') }}">Din annonce er oprettet på Swappi. Se den her.</a>
			</td>
		</tr>
	</table>
</body>