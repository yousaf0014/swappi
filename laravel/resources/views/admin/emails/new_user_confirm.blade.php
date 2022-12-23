<body>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>
				Hello {{ $fName }} {{ $lName }},
				
				<a href="{{ url('profile/activate/'.$id.'/1/'.$created_timestamp) }}">GodKend oprettelsen as din profil pa swappi.</a>
			</td>
		</tr>
	</table>
</body>