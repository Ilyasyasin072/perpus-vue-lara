<template>
    <div class="page">
             <nav class="navbar text-light top-nav">
         <p class="text-center m-auto">E-Library</p>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-dark">
         <div class="container-fluid">
            <a class="navbar-brand" href="#"><router-link
                        :to="{ name: 'dashboard' }"
                        class="text-light"
                        >Perspustakaan</router-link
                    ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 ml-auto mb-lg-0" v-if="sessionToken">
                <li class="nav-item">
                   <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Buku
                   </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Upload Buku</a></li>
                      <li>
                         <hr class="dropdown-divider">
                      </li>
                      
                      <li><a class="dropdown-item" href="#">List Buku</a></li>
                   </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Anggota
                   </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Manage Anggota</a></li>
                      <li>
                         <hr class="dropdown-divider">
                      </li>
                   </ul>
                </li>
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Pengembalian
                   </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Peminjaman</a></li>
                      <li>
                         <hr class="dropdown-divider">
                      </li>
                      
                      <li><a class="dropdown-item" href="#">Pengembalian</a></li>
                   </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Laporan
                   </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li> <router-link
                        :to="{ name: 'report.all' }"
                        v-if="sessionToken"
                        class="navbar-link"
                        ><a class="dropdown-item" href="#">Laporan Harian</a></router-link
                    ></li>
                      <li>
                         <hr class="dropdown-divider">
                      </li>
                      
                      <li><a class="dropdown-item" href="#">Laporan Pertahun</a></li>
                   </ul>
                </li>
                <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Account
                   </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><a class="dropdown-item" href="#">Setting</a></li>
                      <li>
                         <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="#"  @click="logout">logout</a></li>
                   </ul>
                </li>
             </ul>
                   <ul class="navbar-nav mb-2 ml-auto mb-lg-0 text-light" v-else>
                      <li class="nav-item" style="text-decoration: none;">
                     <router-link :to="{ name: 'login' }"
                        ><a class="nav-link" href="#" tabindex="-1" >Login</a></router-link
                    >
                  </li>
                  <li class="nav-item">
                    <router-link :to="{ name: 'login' }" class="text-light"
                        ><a class="nav-link" href="#" tabindex="-1" >Register</a></router-link
                    >
                 </li>
               </ul>
            </div>
         </div>
      </nav>

        <!-- <div class="topnav container-fluid" id="myTopnav">
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
        </div> -->
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
            this.$router.go()
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
