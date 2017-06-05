@extends("template.template")
@section("table")
<tr>
	<td>Delete</td>
	<td class="text-center">service</td>
	<td class="text-center">int</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":204,"Reason":"No Content","Body":""}
		</p>
	</td>
</tr>

<tr>
	<td>Delete</td>
	<td class="text-center">service/{service_id}/garden</td>
	<td class="text-center">int</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":204,"Reason":"No Content","Body":""}
		</p>
	</td>
</tr>

<tr>
	<td>PUT</td>
	<td class="text-center">service/{service_id}</td>
	<td class="text-center">{"password":"qqwertui"}</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":204,"Reason":"No Content","Body":""}
		</p>
	</td>
</tr>

<tr>
	<td>PUT</td>
	<td class="text-center">service/{service_id}/garden/{garden}</td>
	<td class="text-center">service/{service_id}/garden/{garden}</td>
	<td class="text-justify">
		<p>
			N/A
		</p>
	</td>
</tr>
@endsection

@section("page")<a href="documentation">&lt;&lt; Back</a> @endsection