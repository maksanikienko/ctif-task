<script >
import axios from 'axios';

export default {
    data() {
        return {
            user: {},
        };
    },
    methods: {
        createUser() {
            axios.post('/api/admin/users', this.user)
                .then(response => (
                    this.$router.push({ name: 'home' }),
                    console.log(response.data)
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>

<template>
    <div>
        <h3 class="text-center">Create User</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="createUser">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" v-model="user.password">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" v-model="user.role">
                            <option value="admin">Admin</option>
                            <option value="operator">Operator</option>
                            <option value="operator_raion">Operator Raion</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
