<template>
    <div class="container mt-3">
        <div>Login</div>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="submitLogin">
                    <div class="form-group">
                        <label htmlFor="title">Username</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            v-model="user.email"
                        />
                    </div>
                    <div class="form-group">
                        <label htmlFor="content">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="content"
                            v-model="user.password"
                       />
                    </div>
                    <button class="btn btn-primary">login</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { setUserSession } from "../config/http-common";
export default {
    data() {
        return {
            token: "",
            email: "",
            password: "",
            user: {}
        };
    },

    created() {},

    methods: {
        submitLogin: function(e) {
            const uri = this.$baseUrl + "auth/login";
            this.axios.post(uri, this.user).then(response => {
                this.$router.push({ name: "home" });
                // window.reload();
                this.$router.go()
                this.$bus.$emit('logged', 'User logged')
                setUserSession(response.data.access_token, response.data.user);
            });
            e.preventDefault();
        }
    }
};
</script>
