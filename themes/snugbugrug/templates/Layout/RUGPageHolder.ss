<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div><% include StatusMessage %></div>
		<div><% include RUGButton %></div>
		<div class="content">
			<% if $RUGUsers %>
				<% loop $RUGUsers.Sort('Created').Reverse %>
					<% if $First && $Top.StatusMessage %>
						<div class="ruguserlist flash">$Thumbnail<a href="$Link">$Name</a></div>
					<% else %>
					<div class="ruguserlist">$Thumbnail<a href="$Link">$Name</a></div>
					<% end_if %>
				<% end_loop %>
			<% else %>
				<div>
					<h2>No users generated!</h2>
				</div>
			<% end_if %>
		</div>
	</article>
</div>
