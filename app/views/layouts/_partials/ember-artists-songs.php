<script type="text/x-handlebars" data-template-name="artists/songs">

    {{#each songs}}
        <div class="list-group-item">
            {{title}}
            {{ view App.StartRating maxRating=5}}
        </div>
    {{/each}}

</script>
