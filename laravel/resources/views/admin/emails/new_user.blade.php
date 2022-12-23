<body>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>
				Hello Admin,
				
				New User "{{ $fName }} {{ $lName }}" has been registered <a href="{{ url('profile/user/' . $id) }}">click here</a> to view.
			</td>
		</tr>
	</table>
</body>