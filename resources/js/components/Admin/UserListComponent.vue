<script>
import axios from 'axios';

export default {
    data() {
        return {
            users: []
        }
    },
    mounted() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers() {
            axios.get('/api/admin/users')
                .then(response => {
                    this.users = response.data;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error('Error fetching users:', error);
                });
        },
        deleteUser(id) {
            axios.delete(`/api/admin/users/${id}`)
                .then(response => {
                    let i = this.users.map(data => data.id).indexOf(id);
                    this.users.splice(i, 1)
                });
        }
    }
}
</script>

<template>
    <div>
        <h2 class="text-center">Users List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>

                <td>
                    <div class="btn-group" role="group">
                        <RouterLink :to="{ name: 'edit', params: {id: user.id} }" class="btn btn-secondary">Edit user</RouterLink>
                        <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<style scoped>

</style>
