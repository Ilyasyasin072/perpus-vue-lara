<template>
    <div class="page">
        <div class="topnav container-fluid" id="myTopnav">
            <a href="" id="brand" class="navbar-brand">
                <router-link :to="{ name: 'dashboard' }" class="navbar-link"
                    >Perpustakaan</router-link
                >
            </a>
            <a href="#news" class="nav-menu">
                <router-link :to="{ name: 'petugas' }" class="navbar-link"
                    >Laporan</router-link
                ></a
            >


            <a href="#news" class="nav-menu">
                <router-link :to="{ name: 'petugas' }" class="navbar-link"
                    >Rak Buku</router-link
                ></a
            >

            <a href="#news" class="nav-menu">
                <router-link :to="{ name: 'petugas' }" class="navbar-link"
                    >Peminjaman</router-link
                ></a
            >

            <a href="#news" class="nav-menu">
                <router-link :to="{ name: 'petugas' }" class="navbar-link"
                    >Pengembalian</router-link
                ></a
            >


            <a href="#news" class="nav-menu">
                <router-link :to="{ name: 'petugas' }" class="navbar-link"
                    >Petugas</router-link
                ></a
            >

            <a href="#home" class="nav-menu"
                ><router-link :to="{ name: 'books' }" class="navbar-link"
                    >Buku</router-link
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
