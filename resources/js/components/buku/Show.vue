<template>
    <div class="container mt-3 show_book">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <a
                            @click.prevent="backDashboard()"
                            class="btn-sm btn btn-show"
                            style="background-color: #fbb114; color: white;"
                            >Dashboard</a
                        >
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img
                                :src="
                                    'https://cdn.pixabay.com/photo/2016/09/16/09/20/books-1673578_1280.png'
                                "
                                width="60%"
                                height="60%"
                                alt=""
                            />
                        </div>
                        <div class="col-sm-6">
                            <div class="list-group">
                                <a
                                    href="#"
                                    class="list-group-item list-group-item-action"
                                    aria-current="true"
                                >
                                    <div
                                        class="d-flex w-100 justify-content-between"
                                    >
                                        <h5 class="mb-1" v-if="details.buku">
                                            {{ details.buku.judul_buku }}
                                        </h5>
                                        <small v-if="details.buku">
                                            {{ details.buku.penerbit_buku }}
                                            <p class="mb-1">
                                                {{ details.buku.penulis_buku }}
                                            </p>
                                            <p class="mb-1">
                                                {{ details.buku.penerbit_buku }}
                                            </p>
                                            <p class="mb-1">
                                                {{
                                                    details.buku.tahun_penerbit
                                                }}
                                            </p>
                                        </small>
                                    <p v-else>loading.....</p>
                                    </div>
                                    <small>And some small print.</small>
                                </a>
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
            details: {}
        };
    },
    created() {
        let uri = this.$baseUrl + `rak/show/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
            this.details = response.data.result[0];
        });
    },
    methods: {
        backDashboard: function(e) {
            this.$router.push({ name: "dashboard" });
        }
    }
};
</script>
