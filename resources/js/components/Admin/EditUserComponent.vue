<script >
import axios from 'axios';

export default {
    props: ['id'],
    data() {
        return {
            user: {}
        }
    },
    getUser() {
        axios.get(`/api/admin/users/${this.$route.params.id}`)
            .then((res) => {
                this.user = res.data;
            });
    },
    methods: {
        updateUser() {
            axios.patch(`/api/admin/users/${this.$route.params.id}`, this.user)
                .then((res) => {
                    this.$router.push({ name: 'home' });
                });
        }
    }
}
</script>

<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateUser">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name" required placeholder="Enter name" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email" required placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" v-model="user.password" required placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" v-model="user.role" required >
                            <option value="admin">Admin</option>
                            <option value="operator">Operator</option>
                            <option value="operator_raion">Operator Raion</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
