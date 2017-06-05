@extends("template.template")

@section("table")
<tr>
	<td>GET</td>
	<td class="text-center">ping</td>
	<td class="text-center">none</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":204,"Body":{}}
		</p>
	</td>
</tr>

<tr>
	<td>GET</td>
	<td class="text-center">accounts</td>
	<td class="text-center">none</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":200,"Body":"[{\"static_ips\":[{\"ip_group\":\"NSW\",\"available\":5},{\"ip_group\":\"QLD\",\"available\":5}],\"gardens\":[\"credit_prepaid\",\"credit\"],\"shapes\":[\"level_one\",\"level_two\"],\"name\":\"2SG DSL Test Account\",\"supplier_billing_reference_required\":false,\"id\":1,\"password_required\":true,\"network_type\":\"ppp_dsl\"},{\"static_ips\":[],\"gardens\":[],\"shapes\":[],\"name\":\"2SG NBN DHCP Test Account\",\"supplier_billing_reference_required\":true,\"id\":2,\"password_required\":false,\"network_type\":\"dhcp_nbn\"}]"}
		</p>
	</td>
</tr>

<tr>
	<td>GET</td>
	<td class="text-center">service/{service_id}</td>
	<td class="text-center">int</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":200,"Reason":"OK","Body":"{\"supplier_billing_reference\":\"2sg\",\"status\":\"Active\",\"recent_kicks\":[],\"garden\":null,\"username\":\"gerlie\",\"static_ip\":null,\"account\":1,\"password\":\"test\",\"shape\":null,\"id\":1}"}
		</p>
	</td>
</tr>

<tr>
	<td>GET</td>
	<td class="text-center">service/{service_id}/start/{start_date}/end/{end_date}/usage</td>
	<td class="text-center">/1/2017-05-22T00:00:00Z/22017-05-22T23:59:59Z</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":200,"Reason":"OK","Body":"{\"usage\":[]}"}
		</p>
	</td>
</tr>

<tr>
	<td>GET</td>
	<td class="text-center">service/{service_id}/start/{start_date}/end/{end_date}/authlog</td>
	<td class="text-center">/1/2017-05-22T00:00:00Z/22017-05-22T23:59:59Z</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":200,"Reason":"OK","Body":"{\"usage\":[]}"}
		</p>
	</td>
</tr>

<tr>
	<td>GET</td>
	<td class="text-center">service/{service_id}/history</td>
	<td class="text-center">int</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":200,"Reason":"OK","Body":"{\"entries\":[{\"action_sub_type\":null,\"additional_info\":null,\"old_value\":null,\"username\":\"2sg-customeruat\",\"id\":1,\"new_value\":null,\"timestamp\":\"2017-05-22T03:58:24.509074Z\",\"action_type\":\"Create\"}]}"}
		</p>
	</td>
</tr>

<tr>
	<td>POST</td>
	<td class="text-center">services</td>
	<td class="text-center">none</td>
	<td class="text-justify"> 
		<p>
			{"Header":["application\/json"],"StatusCode":201,"Reason":"Created","Body":"{\"supplier_billing_reference\":\"2sg\",\"status\":\"Active\",\"recent_kicks\":[],\"garden\":null,\"username\":\"Daniel\",\"static_ip\":null,\"account\":1,\"password\":\"2123123\",\"shape\":null,\"id\":7}"}
		</p>
	</td>
</tr>

<tr>
	<td>POST</td>
	<td class="text-center">services</td>
	<td class="text-center">none</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":201,"Reason":"Created","Body":"{\"supplier_billing_reference\":\"2sg\",\"status\":\"Active\",\"recent_kicks\":[],\"garden\":null,\"username\":\"Daniel\",\"static_ip\":null,\"account\":1,\"password\":\"2123123\",\"shape\":null,\"id\":7}"}
		</p>
	</td>
</tr>

<tr>
	<td>DELETE</td>
	<td class="text-center">service</td>
	<td class="text-center">int</td>
	<td class="text-justify">
		<p>
			{"Header":["application\/json"],"StatusCode":204,"Reason":"No Content","Body":""}
		</p>
	</td>
</tr>
@endsection

@section("page")<a href="page_two">Next &gt;&gt;</a> @endsection