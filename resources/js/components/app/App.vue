<template>
    <div class="page">
        <div class="topnav container-fluid" id="myTopnav">
            <a href="" id="brand" class="navbar-brand">
                <router-link :to="{ name: 'dashboard' }" class="navbar-link"
                    >Perpustakaan</router-link
                >
            </a>

            <div v-if="sessionToken">
                <a href="" class="nav-menu"
                    ><a class="navbar-link" @click="logout">Logout</a></a
                >

                <a href="#news" class="nav-menu">
                    <router-link
                        :to="{ name: 'report.all' }"
                        v-if="sessionToken"
                        class="navbar-link"
                        >Laporan</router-link
                    ></a
                >

                <a href="#news" class="nav-menu">
                    <router-link :to="{ name: 'bookcase' }" class="navbar-link"
                        >Rak Buku</router-link
                    ></a
                >

                <a href="#news" class="nav-menu">
                    <router-link :to="{ name: 'borrowing' }" class="navbar-link"
                        >Peminjaman</router-link
                    ></a
                >

                <a href="#news" class="nav-menu">
                    <router-link :to="{ name: 'repayment' }" class="navbar-link"
                        >Pengembalian</router-link
                    ></a
                >

                <a href="#news" class="nav-menu">
                    <router-link :to="{ name: 'employee' }" class="navbar-link"
                        >Petugas</router-link
                    ></a
                >

                <a href="#home" class="nav-menu"
                    ><router-link :to="{ name: 'books' }" class="navbar-link"
                        >Buku</router-link
                    ></a
                >
                <a href="" class="nav-menu"
                    ><router-link :to="{ name: 'home' }" class="navbar-link"
                        >Home</router-link
                    ></a
                >
                <a
                    href="javascript:void(0);"
                    class="icon"
                    v-on:click="myFunction"
                >
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div v-else>
                <a href="" class="nav-menu"
                    ><router-link :to="{ name: 'login' }" class="navbar-link"
                        >Login</router-link
                    ></a
                >
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
import { token, getUser, remmoveUserSession } from "../config/http-common";
export default {
    data() {
        return {
            sessionToken: null,
            sessionUser: null,
        };
    },
    created() {
        this.sessionToken = token();
        this.sessionUser = getUser();
        this.username = (this.sessionUser != null ?  this.sessionUser[0].name : '' );
    },
    methods: {
        logout() {
            remmoveUserSession();
            this.$router.push({ name: "login" });
        },
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
