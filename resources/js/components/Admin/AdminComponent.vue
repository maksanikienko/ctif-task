<script >
export default {
    name: 'AdminComponent',
}
</script>

<template>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <RouterLink :to="{ name: 'user-list' }" class="nav-item nav-link ">Users List</RouterLink>
                    <RouterLink :to="{ name: 'create-user' }" class="nav-item nav-link">Create user</RouterLink>

                </div>
            </div>
        </nav>
        <section><router-view></router-view></section>

    </div>

</template>

<style scoped>

</style>
