<template>
    <div class="container mt-5">
        <carousel-3d
            :autoplay="true" dir="ltr" :autoplay-timeout="5000" :display="3" :perspective=0
        >
            <template>
                <slide v-for="(book, i) in books" :key="book.id" :index="i">
                    <figure>
                        <img
                            class="card-img-top img-fluid"
                            :src="`/books/${book.images}`"
                        />
                        <figcaption>
                            The sky is the limit only for those who aren't
                            afraid to fly! The sky is the limit only for those
                            who aren't afraid to fly!
                        </figcaption>
                    </figure>
                </slide>
            </template>
        </carousel-3d>
        <div class="row">
            <div class="col-sm col-md col-sm">
                <div class="search-wrapper">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">
                            Filter
                        </legend>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xs-12">
                                <form>
                                    <label for="">Search Judul Buku</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari Buku"
                                        v-model="search"
                                    />
                                </form>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-12">
                                <form>
                                    <label for="">Search Penerbit Buku</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari Penerbit"
                                        v-model="penerbit"
                                    />
                                </form>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-12">
                                <form>
                                    <label for="">Search Penulis Buku</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari Penulis"
                                        v-model="penulis_buku"
                                    />
                                </form>
                            </div>
                            <div class="col-sm-3 col-md-3 col-xs-12">
                                <form>
                                    <label for="">Search Tahun Terbit</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Cari Tahun Terbit"
                                        v-model="tahun_penerbit"
                                    />
                                </form>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="panel-default">
                    <div class="row">
                        <div
                            class="col-md-3"
                            v-for="(books, index) in filterBooks"
                            :key="books.id"
                        >
                            <div class="card mt-3">
                                <div class="card-header">
                                    <label for=""
                                        ><h3>
                                            <span class="badge bg-secondary">{{
                                                books.judul_buku
                                            }}</span>
                                        </h3></label
                                    >
                                </div>
                                <div class="card-body">
                                    <div v-if="`${books.images}`">
                                        <img
                                            class="card-img-top img-fluid"
                                            :src="`/books/${books.images}`"
                                        />
                                    </div>
                                    <div v-else>
                                        <img
                                            class="card-img-top img-fluid"
                                            :src="
                                                `http://www.kulinerindonesia.id/assets/img/default_image.jpg`
                                            "
                                        />
                                    </div>
                                    <legend class="mt-2">
                                        <fieldset>
                                            <p>
                                                {{ books.judul_buku }}&nbsp;-{{
                                                    index + 1
                                                }}
                                            </p>
                                        </fieldset>
                                    </legend>
                                    <hr />
                                    <p>{{ books.penerbit_buku }}</p>
                                    <p>{{ books.tahun_penerbit }}</p>
                                    <hr />
                                    <div class="btn-content mt-2">
                                        <button
                                            class="btn btn-warning btn-sm w-100"
                                            @click="showById(books.id)"
                                        >
                                            Detail
                                        </button>
                                        <button
                                            class="btn btn-sm w-100 ml-2 text-light"
                                            style="background-color: #2b2d42"
                                        >
                                            Pinjam Buku
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from "vuejs-datepicker";
import { Carousel3d, Slide } from "vue-carousel-3d";
import VueContentLoading from "vue-content-loading";

export default {
    data() {
        return {
            books: [],
            search: "",
            img: "",
            penerbit: "",
            penulis_buku: "",
            tahun_penerbit: "",
            loading: null
        };
    },

    components: {
        Datepicker,
        Carousel3d,
        Slide,
        VueContentLoading
    },
    computed: {
        filterBooks: function() {
            var self = this;
            return this.books.filter(book => {
                if (self.search) {
                    return (
                        book.judul_buku.toLowerCase().indexOf(self.search) >= 0
                        //    || book.penerbit_buku.indexOf(self.search) >= 0
                    );
                } else if (self.penerbit) {
                    return (
                        book.penerbit_buku
                            .toLowerCase()
                            .indexOf(self.penerbit) >= 0
                        //    || book.penerbit_buku.indexOf(self.search) >= 0
                    );
                } else if (self.penulis_buku) {
                    return (
                        book.penulis_buku
                            .toLowerCase()
                            .indexOf(self.penulis_buku) >= 0
                        //    || book.penerbit_buku.indexOf(self.search) >= 0
                    );
                } else {
                    return (
                        book.tahun_penerbit
                            .toLowerCase()
                            .indexOf(self.tahun_penerbit) >= 0
                        //    || book.penerbit_buku.indexOf(self.search) >= 0
                    );
                }
            });
        }
    },
    mounted() {
        let uri = this.$baseUrl + "buku";
        this.axios.get(uri).then(response => {
            this.books = response.data.result;
        });
    },
    // created() {
    //     let uri = this.$baseUrl + "buku";
    //     this.axios.get(uri).then(response => {
    //         this.books = response.data.result;
    //         console.log(response.data.result);
    //     });
    // },
    methods: {
        showById: function(id) {
            console.log(id);
            this.$router.push({ name: "books.show", params: { id } });
        }
    }
};
</script>
