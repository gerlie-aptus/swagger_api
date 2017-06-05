<!DOCTYPE html>
<html>
<head>
	<title>Api Swagger Manual</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
</head>
<body>
<div class="container">
	<h1><--Iseek Api Manual--></h1>
	<caption><b>Base Url:</b> {{env("BASE_URL")}}</caption>
	<br/>
	<caption><b>Tools</b> Guzzle v6</capti0on>

	<div class="table-responsive">
		<table class="table table-condensed" width="100px">
			<thead>
				<tr>
					<th class="text-center">Methods</th>
					<th class="text-center">Url</th>
					<th class="text-center">Parameter</th>
					<th class="text-center">Response</th>
				</tr>
			</thead>
			<tbody>

				@yield("table")

			</tbody>
			</table>
			@yield("page")
		</div>
	</div>
</body>
</html>