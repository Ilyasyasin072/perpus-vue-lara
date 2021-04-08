<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm">
                <div class="pull-right">

                </div>
            </div>
            <div class="col-sm-6">
                <img :src="'https://cdn.pixabay.com/photo/2016/09/16/09/20/books-1673578_1280.png'" alt="">
            </div>
            <div class="col-sm-6">
                <div class="list-group">
                    <a
                        href="#"
                        class="list-group-item list-group-item-action active"
                        aria-current="true"
                    >
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ book.judul_buku }}</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1">
                            Some placeholder content in a paragraph.
                        </p>
                        <small>And some small print.</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            book: {}
        };
    },
    created() {
        let uri = this.$baseUrl + `buku/show/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
            console.log(response.data.result);
            this.book = response.data.result;
        });
    }
};
</script>
