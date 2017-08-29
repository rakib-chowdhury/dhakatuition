<template>
    <form @submit.prevent="submit" novalidate v-cloak>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="name">
                        Name
                    </label>

                    <input
                            v-model="student.name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Name...">

                    <span class="help-block" v-for="error of errors['name']">
                        {{ error }}
                    </span>
                </div>

                <div class="form-group">
                    <label class="control-label" for="email">
                        Email
                    </label>

                    <input
                            v-model="student.email"
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="Email...">

                    <span class="help-block" v-for="error of errors['email']">
                        {{ error }}
                    </span>
                </div>

            </div>
        </div>

        <div class="row mrg-top-1em">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                student: {
                    name: 'azim',
                    email: 'Hello@gmail.com'
                },
                errors: {}
            }
        },
        methods: {
            submit() {
                this.$http.post('/api/events', this.student)
                    .success(function (res) {

                    console.log('Event added!');
                })
                    .error(function (err) {
                    console.log(err);
                });
            }
        },
        events: {
            'formErrors'(errors) {
                this.errors = errors;
            }
        },
    }
</script>
