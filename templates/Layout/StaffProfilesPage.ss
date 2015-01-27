<h1>$Title</h1>
$Content
<% if StaffProfiles %>
	<div class="staffprofiles">
		<% loop StaffProfiles %>
			<% include StaffProfile %>
		<% end_loop %>
	</div>
<% end_if %>
$Form
