<template>
    <div class="page">
        <div class="topnav container-fluid" id="myTopnav">
            <ul>
                <li>
                    <a href="" id="brand" class="navbar-brand">
                        <router-link
                            :to="{ name: 'dashboard' }"
                            class="navbar-link"
                            >Perpustakaan</router-link
                        >
                    </a>
                </li>
                <li>
                    <a href="#news" class="nav-menu">
                        <router-link
                            :to="{ name: 'report.all' }"
                            class="navbar-link"
                            >Laporan</router-link
                        ></a
                    >
                </li>

                <li>
                    <a href="#news" class="nav-menu">
                        <router-link
                            :to="{ name: 'petugas' }"
                            class="navbar-link"
                            >Rak Buku</router-link
                        ></a
                    >
                </li>
                <li>
                    <a href="#news" class="nav-menu">
                        <router-link
                            :to="{ name: 'petugas' }"
                            class="navbar-link"
                            >Peminjaman</router-link
                        ></a
                    >
                </li>
                <li>
                    <a href="#news" class="nav-menu">
                        <router-link
                            :to="{ name: 'petugas' }"
                            class="navbar-link"
                            >Pengembalian</router-link
                        ></a
                    >
                </li>
                <li>
                    <a href="#news" class="nav-menu">
                        <router-link
                            :to="{ name: 'petugas' }"
                            class="navbar-link"
                            >Petugas</router-link
                        ></a
                    >
                </li>

                <li>
                    <a href="#home" class="nav-menu"
                        ><router-link
                            :to="{ name: 'books' }"
                            class="navbar-link"
                            >Buku</router-link
                        ></a
                    >
                </li>
                <li>
                    <a
                        href="javascript:void(0);"
                        class="icon"
                        v-on:click="myFunction"
                    >
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
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
