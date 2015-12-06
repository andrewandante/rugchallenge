<div class="content-container unit size3of4 lastUnit">
	<article>
		<div><% include StatusMessage %></div>
		<div><% include RUGButton %></div>
		<div class="content">
			<% if $RUGUsers %>
				<% loop $RUGUsers %>
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
		<% if $RUGUsers.MoreThanOnePage %>
			<% if $RUGUsers.NotFirstPage %>
				<a class="pagtags prev" href="$RUGUsers.PrevLink">Previous</a>
			<% end_if %>
			<% loop $RUGUsers.Pages %>
				<% if $CurrentBool %>
					<a class="currentpagtag">$PageNum</a>
				<% else %>
					<% if $Link %>
						<a class="pagtags" href="$Link">$PageNum</a>
					<% else %>
						...
					<% end_if %>
				<% end_if %>
			<% end_loop %>
			<% if $RUGUsers.NotLastPage %>
				<a class="pagtags next" href="$RUGUsers.NextLink">Next</a>
			<% end_if %>
		<% end_if %>
	</article>
</div>
