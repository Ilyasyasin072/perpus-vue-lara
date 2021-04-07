<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <form>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Cari Buku"
                        v-model="search"
                    />
                </form>
                <div class="panel-default">
                    <div class="row">
                        <div
                            class="col-sm"
                            v-for="(books, index) in filterBooks"
                            :key="books.id"
                        >
                            <div class="card mt-3">
                                <div class="card-header">
                                    <label for="">Lists Buku</label>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <img class="card-img-top" alt="" />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ books.judul_buku }}&nbsp;-{{
                                                    index + 1
                                                }}
                                            </h5>
                                            <p class="card-text">
                                                {{ books.penerbit_buku }}
                                                <br />
                                                {{ books.penulis_buku }}
                                                <br />
                                                {{ books.tahun_penerbit }}
                                            </p>
                                            <a href="#" class="btn btn-primary"
                                                >Go somewhere</a
                                            >
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
            search: ""
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
    }
};
</script>
