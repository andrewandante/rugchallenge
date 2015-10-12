<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div><a href="?getuser" class="btn">New User Button</a></div>
		<div><% include RUGButton %></div>
		$RUGUserForm
		<div class="content">
			<% if $Children %>
				<% loop $Children %>
					<div>
						<h2><a href="$Link">$Name</a></h2>
						<% with $PicThumb %>
						<img src="$URL" alt="" />
						<% end_with %>
					</div>
				<% end_loop %>
			<% else %>
				<div>
					<h2>No users generated!</h2>
				</div>
			<% end_if %>
		</div>
	</article>
		$Form
		$CommentsForm
</div>
