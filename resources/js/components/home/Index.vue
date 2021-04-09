<template>
    <div class="container mt-3">
        <div class="row">
            <h1>Home</h1>
            <div class="jumbotron">
                <h1 class="display-4">Hello, {{ users.email }}!</h1>
                <p class="lead">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut expedita fugit, libero atque dignissimos nobis, qui error nam, ad vero voluptates quasi magnam molestias officia quas quae accusamus. Vero, sapiente?
                </p>
                <hr class="my-4" />
                <p>
                    It uses utility classes for typography and spacing to space
                    content out within the larger container.
                </p>
                <p class="lead">
                    <a
                        class="btn btn-primary btn-lg"
                        href="#"
                        role="button"
                        @click="booksFind"
                        >Search The Books ?</a
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { getUser } from "../config/http-common";
export default {
    data() {
        return {
            users: {}
        };
    },

    created() {
        this.users = getUser();
        console.log(this.users[0]);
    },

    methods: {
        booksFind() {
            this.$router.push({ name: "dashboard" });
        }
    }
};
</script>
