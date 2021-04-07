<template>
    <div class="page">
        <div class="topnav" id="myTopnav">
            <a href="#home" class="active"
                ><router-link :to="{ name: 'dashboard' }" class="navbar-brand"
                    >Perpustakaan</router-link
                ></a
            >
            <a href="#news">
                <router-link :to="{ name: 'petugas' }" class="navbar-link"
                    >Petugas</router-link
                ></a
            >
            <a href="javascript:void(0);" class="icon" v-on:click="myFunction">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    methods: {
        myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    }
};
</script>
