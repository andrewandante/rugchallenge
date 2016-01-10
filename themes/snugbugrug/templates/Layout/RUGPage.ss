<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<% if $Profile %>
		<% with $Profile %>
		<h1>$FirstName $Surname</h1>
		<div class="content">
      <h2>$Email ($Username)</h2>
      <img src='$PicL.URL' alt="">
    </div>
    <div class="content">
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
