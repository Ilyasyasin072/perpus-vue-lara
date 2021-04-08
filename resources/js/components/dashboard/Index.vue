<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <div class="search-wrapper">
                    <form>
                        <label for="">Search Books</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari Buku"
                            v-model="search"
                        />
                    </form>
                </div>
                <div class="panel-default">
                    <div class="row">
                        <div
                            class="col-sm"
                            v-for="(books, index) in filterBooks"
                            :key="books.id"
                        >
                            <div class="card mt-3" style="width: 18rem;">
                                <div class="card-header">
                                    <label for="">{{ books.judul_buku }}</label>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <img
                                            class="card-img-top"
                                            :src="
                                                'https://cdn.pixabay.com/photo/2016/09/16/09/20/books-1673578_1280.png'
                                            "
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ books.judul_buku }}&nbsp;-{{
                                                    index + 1
                                                }}
                                            </h5>
                                            <p class="card-text">
                                                {{ books.penerbit_buku }}
                                            </p>
                                            <button
                                                class="btn-book btn-sm"
                                                @click="showById(books.id)"
                                            >
                                                Go Book
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            books: [],
            search: "",
            img: ""
        };
    },
    computed: {
        filterBooks: function() {
            var self = this;
            return this.books.filter(book => {
                console.log(book.judul_buku);
                // return book.judul_buku.includes(this.search);
                return (
                    book.judul_buku.indexOf(self.search) >= 0 ||
                    book.penerbit_buku.indexOf(self.search) >= 0
                );
            });
        }
    },
    created() {
        let uri = this.$baseUrl + "buku";
        this.axios.get(uri).then(response => {
            this.books = response.data.result;
        });
    },
    methods: {
        showById: function(id) {
            console.log(id);
            this.$router.push({ name: "books.show", params: { id } });
        }
    }
};
</script>
