<script type="text/x-handlebars" data-template-name="artists">
    <div class="col-md-4">
        <div class="list-group">

            <div class="list-group-item">
                {{input type="text" class="new-artist" placeholder="New Artist" value=newName}}
                <button class="btn btn-primary btn-sm new-artist-button" {{action "createArtist"}}
              {{bind-attr disabled=disabled}}>Add</button>
            </div>

            {{#each model}}
                {{#link-to "artists.songs" }}
                    {{name}}
                    <span class="ponter glyphicon glyphicon-chevron-right"></span>
                {{/link-to}}
            {{/each}}

        </div>
    </div>
    <div class="col-md-8">
        <div class="list-group">
            {{outlet}}
        </div>
    </div>
</script>
