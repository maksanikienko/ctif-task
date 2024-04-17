<script >
export default {
    name: "Login",

    data() {
        return {
            email:null,
            password:null,
            currentUser:{},
        };
    },
    mounted() {
        this.checkAuthentication();
    },
    methods: {
        login()  {
            axios.post('/api/auth/login', {email: this.email, password: this.password}).then(
                response => {
                    localStorage.setItem('access_token', response.data.access_token);
                    this.currentUser = response.data.user;
                }
            )
        },
        logout() {
            localStorage.removeItem('access_token');
            this.currentUser = null;
            console.log('User logged out');
        },
        checkAuthentication() {
            const token = localStorage.getItem("access_token");
            if (token) {
                axios.post("/api/auth/userProfile", {},{
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    })
                    .then(response => {
                        this.currentUser = response.data;
                    })
                    .catch(error => {
                        console.error("Authentication failed:", error);
                        this.currentUser = null;
                    });
            } else {
                console.log("User is not authenticated");
                this.currentUser = null;
            }
        }
    }
}
</script>

<template>

    <div class="container">
        <div class="login-form">
            <div v-if="currentUser" class="user-info">
                <p>Current user: {{ currentUser.name }}</p>
                <button @click.prevent="logout" class="btn btn-primary">Logout</button>
            </div>
            <div v-else class="login-inputs">
                <input v-model="email" type="email" class="form-control mb-3" placeholder="Email">
                <input v-model="password" type="password" class="form-control mb-3" placeholder="Password">
                <button @click.prevent="login" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>

</template>

<style scoped>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-form {
    width: 300px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.user-info {
    text-align: center;
}

.login-inputs input {
    width: 100%;
    margin-bottom: 10px;
}

.login-inputs button {
    width: 100%;
}

</style>
