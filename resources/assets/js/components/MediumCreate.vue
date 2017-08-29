<template>
    <div>

        <All v-for=" Medium in Mediums" :Medium:sync="Medium"></All>

        <form @submit.prevent="MediumCreate">
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" v-model="Medium.mediumName" class="form-control" id="Firstname1">
                    <label for="Firstname1">Medium Name</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Medium</button>
                </div>
            </div>
        </form>
        <div>
    </div>
</template>

<script>
    export default
    {
        data () {
            return {
                Medium: {
                    mediumName: ''
                },
                Mediums: []
            }
        },
        methods: {
            MediumCreate () {
                var mediumName = this.Medium;
                $.post('/admin/medium_create', mediumName, function( data ) {
                    alert('created');
                });

            },
            fetch () {
                this.fetchMedium();
            }
        },
        computed : {
            fetchMedium () {
                var self = this;
                $.get('/admin/all_medium', function( data ) {
                    self.Mediums = data;
                });
            }
        }
    }
</script>
