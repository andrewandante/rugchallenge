<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<% if $Profile %>
		<% with $Profile %>
		<h1>$FirstName $Surname</h1>
		<div class="content">
      <img src='$Large.URL' alt="$Large.Name" class='largepic'>
			<div class="rugcontent">
				<h3>$Email</h3>
				<h3>($Username)</h3>
			</div>
		</div>
    <div class="content" style="width: 100%; clear: both; padding: 5px">
			<a href="$BaseURL">Back</a>
    </div>
    <% end_with %>
		<% else %>
		<div class="content">
      $Content
    </div>
		<% end_if %>
	</article>
</div>
