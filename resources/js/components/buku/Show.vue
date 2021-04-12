<template>
   <div class="container mt-3" v-if="details.buku">
      <div class="row">
          <div class="col-sm-12 col-md-12">
              <div class="card">
                  <div class="card-body">
                      <h1>Template</h1>
                  </div>
              </div>
          </div>
         <div class="col-sm-12 mt-2">
            <div class="card">
               <div class="card-header">
                  {{ details.buku.judul_buku }}
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-6" style="text-align: center;" v-if="details.buku.images">
                        <img
                           :src="`/books/${details.buku.images}`"
                           width="100%"
                           height="100%"
                           alt=""
                           />
                     </div>
                     <div v-else>
                                  <img
                                 class="card-img-top img-fluid"
                                 :src="`http://www.kulinerindonesia.id/assets/img/default_image.jpg`"
                                  width="100%"
                           height="100%"
                                 />
                              </div>
                     <div class="col-sm-6">
                        <div class="list-group">
                           <a
                              href="#"
                              class="list-group-item list-group-item-action flex-column align-items-start"
                              v-if="details.buku"
                              >
                              <div
                                 class="d-flex w-100 justify-content-between"
                                 >
                                 <h5 class="mb-1">
                                    {{ details.buku.judul_buku }}
                                 </h5>
                                 <small class="text-muted"><span
                                    class="badge badge-primary badge-pill"
                                    >{{ details.buku.penerbit_buku }}</span
                                    ></small>
                              </div>
                              <p class="mb-1">
                                 {{ details.buku.penulis_buku }}
                                 <span
                                    class="badge badge-primary badge-pill"
                                    >{{ details.buku.tahun_penerbit }}</span
                                    >
                              </p>
                              <hr>
                              <ul class="list-group">
                                 <li
                                    class="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                    {{ details.nama_rak }}
                                    <span
                                       class="badge badge-primary badge-pill"
                                       >{{ details.lokasi_rak }}</span
                                       >
                                 </li>
                              </ul>
                              <hr>
                              <p>
                                 {{
                                 details.buku.desc_buku
                                 }}
                              </p>
                           </a>
                           <a v-else>Detail tidak ada</a>
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn-sm btn-info" width="100%" @click="pinjamBook">
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
               console.log(response.data.result[0])
           });
       },
       methods: {
           backDashboard: function(e) {
               this.$router.push({ name: "dashboard" });
           },
           pinjamBook: function() {
               alert('pinjam books')
           }
       }
   };
</script>
