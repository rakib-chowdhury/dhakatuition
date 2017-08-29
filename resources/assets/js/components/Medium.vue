<template ref="foo">
    <ul class="list divider-full-bleed">
        <li v-for = "Medium in Mediums" class="tile">
            <a class="tile-content ink-reaction" href="">
                <div class="tile-icon"><i class="fa fa-star"></i></div>
                <div class="tile-text text-light">{{ Medium.medium_category_name }}</div>
            </a>
            <a class="btn btn-flat ink-reaction text-primary">
                <i class="fa fa-pencil"></i>
            </a>
            <a class="btn btn-flat ink-reaction text-danger">
                <i class="fa fa-trash"></i>
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        data () {
            return {
                Mediums: []
            }
        },
        created () {
            this.fetchMedium;
        },
        computed : {
            fetchMedium : function() {
                var self = this;
                $.get('/admin/all_medium', function( data ) {
                    self.Mediums = data;
                });
            }
        }
    }
</script>
