<script type="text/x-handlebars" id="index">
	<table class="table eight columns">
		<thead>
			<th><Name</th>
			<th>Track</th>
			<th>Artist</th>
			<th>Album</th>
		</thead>
		<tbody>
		{{#each item in model.data}}
			<tr>
				<td>{{item.title}}</td>
				<td>{{item.trackno}}</td>
				<td>{{item.artist.name}}</td>
				<td>{{item.album.name}}</td>
			</tr>
		{{/each}}
		</tbody>
		
	</table>
</script>